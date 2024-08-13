<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\AdminNotification;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Savings;
use App\Models\SavingPay;
use App\Models\User;
use App\Models\CronJob;
use App\Models\CronJobLog;
use App\Models\Fdr;
use App\Models\Admin;
use App\Models\Installment;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ApiController extends Controller
{

    public function strowalletwebhook(Request $request)
	{
        $json = file_get_contents('php://input');
        $input = json_decode($json, true); 
        if(!isset($input['sessionId']) || !isset($input['sourceAccountNumber'])) {
			return response()->json(["error" => "Invalid Input"]);
		}
        $fee = env('DEDICATEDACCOUNTFEE');
        $nuban = User::whereNubanRef($input['accountNumber'])->firstOrFail();
        $exist = Transaction::whereUserId($nuban->id)->whereTrx($input['sessionId'])->first();
        if($exist)
        {
            return response()->json(["error" => "Duplicate Transaction"]);
        }
        
        $commission = (@$input['transactionAmount'] / 100) * @$fee;
        $credit = $input['transactionAmount'] - $commission;
        $nuban->balance += $credit; // $input['transactionAmount'];
        $nuban->save();
        $nuban = User::whereNubanRef($input['accountNumber'])->firstOrFail();
        
        $transaction               = new Transaction();
        $transaction->user_id      = $nuban->id;
        $transaction->amount       = round($credit);
        $transaction->val_1        = json_encode($input);
        $transaction->post_balance = $nuban->balance;
        $transaction->charge       = round($commission);
        $transaction->trx_type     = '+';
        $transaction->details      = 'Wallet funding via dedicated account number';
        $transaction->trx          = $input['sessionId'];
        $transaction->remark       = 'Funding via dedicated account number';
        $transaction->save();
        return response()->json(["success" => "Wallet Updated"]);

	} 

    public function paylonywebhook(Request $request)
	{
        $json = file_get_contents('php://input');
        $input = json_decode($json, true); 
        if(!isset($input['reference']) || !isset($input['customer_reference'])) {
			return response()->json(["error" => "Invalid Input"]);
		}
        $fee = env('DEDICATEDACCOUNTFEE');
        $nuban = User::whereNubanRef($input['customer_reference'])->firstOrFail();
        
        $exist = Transaction::whereUserId($nuban->id)->whereTrx($input['trx'])->first();
        if($exist)
        {
            return response()->json(["error" => "Duplicate Transaction"]);
        }
        
        if($input['type'] == 'reserved_account')
        { 
        //VALIDATE TRANSACTIONS
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.paylony.com/api/v1/transaction_verify/'.$input['trx'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS =>'',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.env('PAYLONYSK')
        ),
        ));
        $response = curl_exec($curl);
        $reply = json_decode($response,true);
        curl_close($curl);
        if(!isset($reply['data']['status']))
        {
            return response()->json(["error" => "OOPS!".json_encode($reply['message'])]); 
        }
        if($reply['data']['status'] != 'success')
        {
            return response()->json(["error" => "OOPS!!".json_encode($reply['message'])]); 
        }
        
        // END VALIDATE TRANSACTION
        $nuban = User::whereNubanRef($input['customer_reference'])->firstOrFail();
        $accountnumber = json_decode($nuban->nuban)->account_number;
        if($accountnumber != $input['receiving_account'])
        {
            return response()->json(["error" => "OOPS!! Intruition detected"]); 
        }
        $commission = (@$input['amount'] / 100) * @$fee;
        $credit = $input['amount'] - $commission;
        $nuban->balance += $credit; // $input['transactionAmount'];
        $nuban->save();
        
        $transaction               = new Transaction();
        $transaction->user_id      = $nuban->id;
        $transaction->amount       = round($credit);
        $transaction->val_1        = json_encode($input);
        $transaction->post_balance = $nuban->balance;
        $transaction->charge       = round($commission);
        $transaction->trx_type     = '+';
        $transaction->details      = 'Wallet funding via dedicated account number';
        $transaction->trx          = $input['trx'];
        $transaction->val_1          = json_encode($input);
        $transaction->remark       = 'Funding via dedicated account number';
        $transaction->save();
        return response()->json(["success" => "Wallet Updated"]); 
        }
        return response()->json(["error" => "TRX Not Dedicated Account Number Funding"]); 


	} 

    public function monnifywebhook()
    {
        $json = file_get_contents('php://input');
        $input = json_decode($json, true); 
        $account_ref = $input['eventData']['product']['reference'];
        $transaction_type = $input['eventData']['product']['type'];
        $transaction_ref = $input['eventData']['transactionReference'];
        $payment_ref = $input['eventData']['paymentReference'];
        $payment_from = $input['eventData']['paymentSourceInformation'];
        $amount = $input['eventData']['amountPaid'];
        $transaction = Transaction::whereTrx($transaction_ref)->first();
        $fee = env('DEDICATEDACCOUNTFEE');

        if($transaction)
        {
            return 'Transaction already processed';
        }
        $user = User::whereAccountRef($account_ref)->firstOrFail();
        $user->balance += $amount;
        $user->save();
        $user = User::whereAccountRef($account_ref)->firstOrFail();

        $commission = (@$amount / 100) * @$fee;
        $credit = $amount - $commission;
        
        $transaction               = new Transaction();
        $transaction->user_id      = $user->id;
        $transaction->amount       = round($credit);
        $transaction->val_1        = json_encode($input);
        $transaction->post_balance = $user->balance;
        $transaction->charge       = round($commission);
        $transaction->trx_type     = '+';
        $transaction->details      = 'Wallet funding via dedicated account number';
        $transaction->trx          = $transaction_ref;
        $transaction->remark       = 'Funding via dedicated account number';
        $transaction->save(); 
        return 'Transaction Successful';
    }  


    public function savings(){

        try{
        $general = GeneralSetting::first();
        $target = Savings::where('status', 1)->where('mature', '<=', Carbon::now())->get();
        $recurrent = Savings::where('status', 1)->where('next_recurrent', '<=', Carbon::now())->get();
        //return $recurrent;
        foreach($target as $data)
        {
        $user = User::where('id', $data->user_id)->first();
        $user->balance += $data->balance ? $data->balance : 0;
        $user->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount =  $data->balance ? $data->balance : 0;
        $transaction->post_balance = $user->balance;
        $transaction->charge = 0;
        $transaction->trx_type = '+';
        $transaction->remark = 'savings';
        $transaction->details = 'Savings Credited To Wallet On Due Date';
        $transaction->trx = getTrx();
        $transaction->save();

        $data->status = 0;
        $data->balance = 0;
        $data->save();
        }

        foreach($recurrent as $recdata)
        {
        //return $recdata;

        $user = User::where('id', $recdata->user_id)->first();
        if($recdata->recurrent > $recdata->recurrent_count)
        {

             if($user->balance >= $recdata->amount)
             {
             $user->balance -= $recdata->amount;
             $user->save();

             $recdata->balance += $recdata->amount;
             $recdata->recurrent_count += 1;
             $recdata->next_recurrent = Carbon::parse(Carbon::now())->addDays($recdata->cycle);
             $recdata->save();

             $code = getTrx();
             $pay = new SavingPay();
             $pay->user_id = $user->id;
             $pay->saving_id = $recdata->reference;
             $pay->plan_id = $recdata->type;
             $pay->amount =  $recdata->amount;
             $pay->balance = $recdata->balance;
             $pay->trx = $code;
             $pay->status = 1;
             $pay->save();

             $transaction = new Transaction();
             $transaction->user_id = $user->id;
             $transaction->amount = $recdata->amount;
             $transaction->post_balance = $user->balance;
             $transaction->charge = 0;
             $transaction->trx_type = '-';
             $transaction->remark = 'savings';
             $transaction->details = 'Fund Debited From Wallet To Service Recurrent Savings';
             $transaction->trx = $code;
             $transaction->save();

             }

        }
             if($recdata->recurrent <= $recdata->recurrent_count)
             {
             $user->balance += $recdata->balance;
             $user->save();

             $recdata->status = 0;
             $recdata->balance = 0;
             $recdata->save();
             }


        }

    }
    catch(\Exception $ex){
        $admin = Admin::first();
        sendGeneralEmail($admin->email, $ex->getMessage(), $ex->getMessage(), '');
        \Log::error('CronController -> investment() line '. __LINE__ .': '.$ex->getMessage() ."\n");
    }
    return 'Savings Cron Successful';

     return 'Savings Cron Successful';

}


    public function fixed()
    {
        try {
            $allFdr = Fdr::running()->whereDate('next_installment_date', '<=', now()->format('y-m-d'))->with('user:id,username,balance')->get();

            foreach ($allFdr as $fdr) {
                self::payFdrInstallment($fdr);
            }
            return 'Fixed Cron Successful';

        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public static function payFdrInstallment($fdr)
    {
        $amount                     = $fdr->per_installment;
        $user                       = $fdr->user;
        $fdr->next_installment_date = $fdr->next_installment_date->addDays($fdr->installment_interval);
        $fdr->profit += $amount;
        $fdr->save();

        $user->balance += $amount;
        $user->save();

        $installment                   = new Installment();
        $installment->installment_date = $fdr->next_installment_date->subDays($fdr->installment_interval);
        $installment->given_at         = now();
        $installment->user_id         = $user->id;
        $installment->amount         = $amount;
        $fdr->installments()->save($installment);

        $transaction               = new Transaction();
        $transaction->user_id      = $user->id;
        $transaction->amount       = $amount;
        $transaction->post_balance = $user->balance;
        $transaction->charge       = 0;
        $transaction->trx_type     = '+';
        $transaction->details      = 'Fixed Deposit Interest Received';
        $transaction->remark       = 'fixed_deposit_interest';
        $transaction->trx          = $fdr->fdr_number;
        $transaction->save();
    }

	 
}