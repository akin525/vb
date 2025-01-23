<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\GoogleAuthenticator;
use App\Models\Giftbills;
use App\Models\Order;
use App\Models\GeneralSetting;
 use App\Models\AdminNotification;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use DB;
use Carbon\Carbon;
class InternetController extends Controller
{


    public function __construct()
    {
        $this->middleware('kyc.status');
        $this->middleware('internet.status');
        $this->activeTemplate = activeTemplate();
    }

    public function getCountries()
    {
        if(env('MODE') == "TEST")
        {
            $baseurl = "https://topups-sandbox.reloadly.com/countries";
        }
        else
        {
            $baseurl = "https://topups.reloadly.com/countries";
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => $baseurl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/com.reloadly.topups-v1+json",
            "Authorization: Bearer ".getToken('topups')
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        // echo "cURL Error #:" . $err;
        return [];
        }
        $reply = json_decode($response,true);
        return $reply;
    }
    public function internet_operators(Request $request)
    {

        $token = getToken('topups');
        if(env('MODE') == "TEST")
        {
            $url = "https://topups-sandbox.reloadly.com";
        }
        else
        {
            $url = "https://topups.reloadly.com";
        }


       // $json = file_get_contents('php://input');
       // $input = json_decode($json, true);

        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => $url."/operators/countries/".$request->isocode,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/com.reloadly.topups-v1+json",
            "Authorization: Bearer ".$token
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['status'=>'false','message'=>'','content'=>$reply],400);
        } else {
            $resp = json_decode($response,true);
            $val = [];
            $reply = array(
            'code' => '00',
            'response' => $resp,
             );

             return response()->json(['status'=>'true','message'=>'Network Fetched','content'=>$reply],200);
        }

    }


    public function operatorsdetails($id)
    {

        $token = getToken('topups');
        if(env('MODE') == "TEST")
        {
            $url = "https://topups-sandbox.reloadly.com";
        }
        else
        {
            $url = "https://topups.reloadly.com";
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => $url."/operators/$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/com.reloadly.topups-v1+json",
            "Authorization: Bearer ".$token
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $resp = json_decode($response,true);
        return $resp;
    }

    public function operatorsInternetdetails(Request $request)
    {

        $token = getToken('topups');
        if(env('MODE') == "TEST")
        {
            $url = "https://topups-sandbox.reloadly.com";
        }
        else
        {
            $url = "https://topups.reloadly.com";
        }



            $json = file_get_contents('php://input');
            $input = json_decode($json, true);
            $id = @$input['operatorId'];


        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => $url."/operators/$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/com.reloadly.topups-v1+json",
            "Authorization: Bearer ".$token
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $f = json_decode($response) ;
        $ff = json_decode(json_encode($f->fixedAmountsDescriptions), true);
        return $ff ;
    }


    public function internet(Request $request)
    {
        $pageTitle       = 'Internet Subscription';
        $user = auth()->user();
        $log = Order::whereUserId($user->id)->whereType('internet')->searchable(['trx'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.bills.internet.index', compact('pageTitle', 'log'));
    }

    public function buy_internet(Request $request)
    {
        $pageTitle = 'Buy Internet';
        $countries = $this->getCountries();
        return view($this->activeTemplate . 'user.bills.internet.internet_buy', compact('pageTitle','countries'));
    }
    public function buy_internet_post(Request $request)
    {

        $request->validate([
            'id'=>'required',
            'number'=>'required',
            'refid'=>'required',
        ]);
            $url = "https://giftbills.com/api/v1/internet/data";

//        $token = getToken('topups');
        $user = auth()->user();
//        $json = file_get_contents('php://input');
//        $input = json_decode($json, true);
//        $password = $input['password'];
//        $arr = explode("|", $input['amount'], 2);

//        $amount =  $arr[0];
//        $plan = $arr[1];
//        $phone = $input['phone'];
//        $wallet = "main";
//        $operatorId = @$input['operator'];


        $auth = env('GIFTBILLS');

       $plan=Giftbills::where('id', $request->productid)->first();

       if (!$plan){
           return response()->json("invalid dataplan", Response::HTTP_BAD_REQUEST);

       }
       $amount=$plan->amount;

        if($amount < 0)
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> 'Minimum amount you can purchase is '.getAmount($min)],400);
        }


            $balance = $user->balance;
        $payment = $amount;

        if($payment > $balance)
        {
            $mg='Insufficient wallet balance';
            return response()->json($mg, Response::HTTP_BAD_REQUEST);

//            return response()->json(['ok'=>false,'status'=>'danger','message'=> 'Insufficient wallet balance'],400);
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>'{
        "provider": "'.$plan->code.'",
        "number": "'.$request->number.'",
        "plan_id": "'.$plan->plan_id.'",
        "reference": "'.$request->refid.'"
        }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$auth,
                'MerchantId: '.env('GIFTBILLS_MID'),
                'Content-Type: application/json',
            ),
        ));

        $resp = curl_exec($curl);
        $response = $resp;
        $reply = json_decode($resp, true);
        // return $response;
        curl_close($curl);
        $response = json_decode($resp,true);
//        return response()->json($response, Response::HTTP_BAD_REQUEST);

        // END AIRTIME VENDING \\
        if($response['success']==true)
        {

                $user->balance -= $payment;
                $balance_after = $user->balance;

            $user->save();
            $order               = new Order();
            $order->user_id      = $user->id;
            $order->type         =  'internet';
            $order->val_1   = $request->number;
            $order->val_2   = $plan->network;
            $order->product_id   = $plan->id;
            $order->product_name = $plan->network;
            $order->product_logo = $plan->plan;
            $order->details      = json_encode($response,true);
            $order->quantity     = 1;
            $order->price        = $amount;
            $order->currency     = 'NGN';
            $order->status       = @$response['success'];
            $order->payment      = @$payment;
            $order->trx          = $request->refid;
            $order->source       = 'wallet';
            $order->balance_before  = $balance;
            $order->balance_after   = $balance_after;
            $order->transaction_id  = $response['transactionId'];
            $order->save();


            $transaction               = new Transaction();
            $transaction->user_id      = $order->user_id;
            $transaction->amount       = $order->payment;
            $transaction->post_balance = $order->balance_after;
            $transaction->charge       = 0;
            $transaction->trx_type     = '-';
            $transaction->details      = 'Purchased internet subscription via  Wallet';
            $transaction->trx          = $order->trx;
            $transaction->remark       = 'internet';
            $transaction->save();



            return response()->json(['ok'=>true,'status'=>'success','message'=> 'Transaction Was Successful','orderid'=> $response['transactionId']],200);
        }
        else
        {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> "Transaction Error". 'API ERROR'],400);
        }
        //return json_decode($resp,true);
    }


    public function trxpass(Request $request)
    {
        $user = auth()->user();
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $password = $input['password'];
        if (Hash::check($password, $user->trx_password)) {
            return response()->json(['ok'=>true,'status'=>'success','message'=>'The password Correct!'],200);
        } else {
            return response()->json(['ok'=>false,'status'=>'danger','message'=> 'The password doesn\'t match!'],400);
        }

    }


    public function history(Request $request)
    {
        $pageTitle       = 'Internet';
        $user = auth()->user();
        $log = Order::whereUserId($user->id)->whereType('internet')->searchable(['trx'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.bills.internet.internet_log', compact('pageTitle', 'log'));
    }


    function fecthdata(Request $request, $selectedValue)
    {
        $data = Giftbills::where(['status' => 1])->where('network', $selectedValue)->get();

        return response()->json($data);

    }


    public function list(Request $request)
    {

        $request->validate([
            'pro'=>'required',
            'provider'=>'required',
        ]);
        $auth = env('GIFTBILLS');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://giftbills.com/api/v1/ /internet/plans/'.$request->provider,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$auth,
                'MerchantId: '.env('GIFTBILLS_MID'),
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

        $data1 = json_decode($response, true);
        $data=$data1['data'];

//return $success;
        foreach ($data as $plan){
            $success =$request->provider;
            $planid = $plan["id"];
            $price= $plan['amount'];
            $catid=$request->pro;
            $validity =$plan['name'];
            $code=$plan['data_type_id'];
            $insert= Giftbills::create([
                'plan_id' =>$planid,
                'network' =>$success,
                'plan' =>$validity,
                'code' =>$code,
                'amount'=>$price,
                'tamount'=>$price,
                'ramount'=>$price,
                'cat_id'=>$planid,
            ]);
        }

        return $data1;

//    return view('pam', compact('product'));


    }

}
