<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\GoogleAuthenticator;
use App\Models\Order;
use App\Models\GeneralSetting;
 use App\Models\AdminNotification;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use DB;
use Carbon\Carbon;
class InternetSmeController extends Controller
{


    public function __construct()
    {
        $this->middleware('kyc.status');
        $this->middleware('internetsme.status');
        $this->activeTemplate = activeTemplate();
    }

    public function internet_operators(Request $request)
    {
        $networks =  '[
            {
                "name": "MTN"
            },
            {
                "name": "Airtel"
            },
            {
                "name": "Glo"
            },
            {
                "name": "9Mobile"
            }
            ]';
        $networks = json_decode($networks,true);

            $val = [];
            $reply = array(
            'code' => '00',
            'response' => $networks,
             );

             return response()->json(['status'=>'true','message'=>'Network Fetched','content'=>$reply],200);

    }


    public function operatorsInternetdetailsN3TDATA(Request $request)
    {
        $plans = json_decode(file_get_contents(resource_path('views/partials/n3tdata.json')));
        return $plans ;
    }

    public function operatorsInternetdetailsGSUBZ(Request $request)
    {
        $plans = json_decode(file_get_contents(resource_path('views/partials/gsubzdata.json')));
        return $plans ;
    }

    public function internet(Request $request)
    {
        $pageTitle       = 'SME Internet Subscription';
        $user = auth()->user();
        $log = Order::whereUserId($user->id)->whereType('smeinternet')->searchable(['trx'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.bills.internetsme.index', compact('pageTitle', 'log'));
    }

    public function buy_internet(Request $request)
    {
        $pageTitle = 'Buy Internet';
        $countries = [];
        $networks =  '[
            {
                "name": "MTN",
                "logo": "mtn.png",
                "networkid": "1"
            },
            {
                "name": "AIRTEL",
                "logo": "airtel.jpeg",
                "networkid": "2"
            },
            {
                "name": "GLO",
                "logo": "glo.jpeg",
                "networkid": "3"
            },
            {
                "name": "9MOBILE",
                "logo": "9mobile.jpeg",
                "networkid": "4"
            }
            ]';

        $plans = [];
        if(gs()->internetsme_provider == 'N3TDATA')
        {
            return view($this->activeTemplate . 'user.bills.internetsme.internet_buy_N3TDATA', compact('pageTitle','countries','networks','plans'));
        }
        if(gs()->internetsme_provider == 'GSUBZ')
        {
            return view($this->activeTemplate . 'user.bills.internetsme.internet_buy_GSUBZ', compact('pageTitle','countries','networks','plans'));
        }
    }

    public function buy_internet_post_n3tdata()
    {
        try {
        $user = auth()->user();
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $password = $input['password'];
        $arr = explode("|", $input['amount'], 3);

        $amount =  $arr[1];
        $data_plan = $input['data_plan'];
        $networkname = $input['networkname'];
        $plan = $arr[0];
        $network = $arr[2];
        $phone = $input['phone'];
        $wallet = @$input['wallet'];
        $operatorId = @$input['networkid'];

        if (Hash::check($password, $user->trx_password)) {
            $passcheck = true;
            } else {
            $passcheck = false;
                return response()->json(['ok'=>false,'status'=>'danger','message'=> 'The password doesn\'t match!'],400);
            }

        $payment = $amount;
        if($wallet == 'main')
        {
            $balance = $user->balance;
        }
        else
        {
            $balance = $user->ref_balance;
        }
        if($payment > $balance)
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> 'Insufficient wallet balance'],400);
        }

        $token = getN3TToken();
        $url = 'https://n3tdata.com/api/data';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        $headers = array(
        "Authorization: Token ".$token."",
        "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $code = getTrx();
        $data = <<<DATA
        {
            "data_plan": "$data_plan",
            "network": "$operatorId",
            "request-id": "$code",
            "phone": "$phone"
        }
        DATA;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        //var_dump($resp);
        $response = json_decode($resp,true);
        if(!isset($response['status']) && !isset($response['newbal']))
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> 'Sorry we cant process this request at the moment'],400);
        }
        // END AIRTIME VENDING \\
        if($response['status'] == 'success')
        {
            if($wallet == 'main')
            {
                $user->balance -= $payment;
                $balance_after = $user->balance;
            }
            else
            {
                $user->ref_balance -= $payment;
                $balance_after = $user->ref_balance;
            }
            $user->save();
            $order               = new Order();
            $order->user_id      = $user->id;
            $order->type         =  'smedata';
            $order->val_1   = $phone;
            $order->val_2   = $plan;
            $order->deposit_code   = @$response['plan_type'];
            $order->product_name = @$networkname;
            $order->product_logo = null;
            $order->details      = json_encode($response,true);
            $order->quantity     = 1;
            $order->price        = $amount;
            $order->currency     = 'NGN';
            $order->status       = @$response['status'];
            $order->payment      = @$payment;
            $order->trx          = $code;
            $order->source       = $wallet;
            $order->balance_before  = $balance;
            $order->balance_after   = $balance_after;
            $order->transaction_id  = $response['request-id'];
            $order->save();


            $transaction               = new Transaction();
            $transaction->user_id      = $order->user_id;
            $transaction->amount       = $order->payment;
            $transaction->post_balance = $order->balance_after;
            $transaction->charge       = 0;
            $transaction->trx_type     = '-';
            $transaction->details      = 'Purchased SME internet data via ' . strToUpper($wallet).' Wallet';
            $transaction->trx          = $order->trx;
            $transaction->remark       = 'internet';
            $transaction->save();

            notify($user,'INTERNET_BUY', [
                'provider'        => @$networkname,
                'currency'        => @gs()->cur_text,
                'amount'          => @showAmount($amount),
                'product'         => @$plan,
                'beneficiary'     => @$phone,
                'rate'           => @showAmount($payment),
                'purchase_at'     => @Carbon::now(),
                'trx'             => @$code,
            ]);

            return response()->json(['ok'=>true,'status'=>'success','message'=> @$response['message'],'orderid'=> $response['request-id'],'order'=> json_encode($response)],200);
        }
        else
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> @$response['message']. 'API ERROR'],400);
        }
        } catch (\Exception $e) {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> $e->getMessage()],400);
        }
        //return json_decode($resp,true);
    }


    public function buy_internet_post_gsubz()
    {
        try {
        $user = auth()->user();
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $password = $input['password'];
        $arr = explode("|", $input['amount'], 3);

        $amount =  $arr[1];
        $data_plan = $input['data_plan'];
        $networkname = $input['networkname'];
        $plan = $arr[0];
        $network = $arr[2];
        $phone = $input['phone'];
        $data_type = $input['data_type'];
        $wallet = @$input['wallet'];
        $operatorId = @$input['networkid'];

        if (Hash::check($password, $user->trx_password)) {
            $passcheck = true;
            } else {
            $passcheck = false;
                return response()->json(['ok'=>false,'status'=>'danger','message'=> 'The password doesn\'t match!'],400);
            }

        $payment = $amount;
        if($wallet == 'main')
        {
            $balance = $user->balance;
        }
        else
        {
            $balance = $user->ref_balance;
        }
        if($payment > $balance)
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> 'Insufficient wallet balance'],400);
        }


        $url = 'https://gsubz.com/api/pay/';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        $headers = array(
        "Authorization: Bearer ".env('GSUBZAPI')."",
        "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $code = getTrx();
        $data = <<<DATA
        {
            "serviceID": "$data_type",
            "plan": "$plan",
            "api": "env('GSUBZAPI')",
            "phone": "$phone",
            "requestID": "$code"
        }
        DATA;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        //var_dump($resp);
        $response = json_decode($resp,true);
        if(!isset($response['status']) && !isset($response['content']))
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> 'Sorry we cant process this request at the moment'],400);
        }
        // END AIRTIME VENDING \\
        if($response['status'] == 'TRANSACTION_SUCCESSFUL' && $response['content']['code'] == 200)
        {
            if($wallet == 'main')
            {
                $user->balance -= $payment;
                $balance_after = $user->balance;
            }
            else
            {
                $user->ref_balance -= $payment;
                $balance_after = $user->ref_balance;
            }
            $user->save();
            $order               = new Order();
            $order->user_id      = $user->id;
            $order->type         =  $data_type;
            $order->val_1   = $phone;
            $order->val_2   = $plan;
            $order->deposit_code   = @$response['content']['transactionID'];
            $order->product_name = @$networkname;
            $order->product_logo = null;
            $order->details      = json_encode($response,true);
            $order->quantity     = 1;
            $order->price        = $amount;
            $order->currency     = 'NGN';
            $order->status       = @$response['status'];
            $order->payment      = @$payment;
            $order->trx          = $code;
            $order->source       = $wallet;
            $order->balance_before  = $balance;
            $order->balance_after   = $balance_after;
            $order->transaction_id  = $response['content']['transactionID'];
            $order->save();


            $transaction               = new Transaction();
            $transaction->user_id      = $order->user_id;
            $transaction->amount       = $order->payment;
            $transaction->post_balance = $order->balance_after;
            $transaction->charge       = 0;
            $transaction->trx_type     = '-';
            $transaction->details      = 'Purchased SME internet data via ' . strToUpper($wallet).' Wallet';
            $transaction->trx          = $order->trx;
            $transaction->remark       = 'internet';
            $transaction->save();

            notify($user,'INTERNET_BUY', [
                'provider'        => @$networkname,
                'currency'        => @gs()->cur_text,
                'amount'          => @showAmount($amount),
                'product'         => @$plan,
                'beneficiary'     => @$phone,
                'rate'            => @showAmount($payment),
                'purchase_at'     => @Carbon::now(),
                'trx'             => @$code,
            ]);

            return response()->json(['ok'=>true,'status'=>'success','message'=> @$response['description'],'orderid'=> @$response['content']['transactionID'],'order'=> json_encode($response)],200);
        }
        else
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> @$response['description']. '. API ERROR!!'],400);
        }
        } catch (\Exception $e) {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> $e->getMessage()],400);
        }
        //return json_decode($resp,true);
    }


    public function history(Request $request)
    {
        $pageTitle    = 'SME Internet Data';
        $user = auth()->user();
        $log = Order::whereUserId($user->id)->whereType('smedata')->searchable(['trx'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.bills.internetsme.internet_log', compact('pageTitle', 'log'));
    }

    function listdata()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.giftbills.com/api/v1/internet/data_types',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.env('GIFTBILLS'),
                'MerchantId: '.env('GIFTBILLS_MID'),
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
}
