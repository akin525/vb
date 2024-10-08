<?php

namespace App\Http\Controllers\Gateway\Mollie;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use App\Models\Deposit;
use Mollie\Laravel\Facades\Mollie;

class ProcessInvoiceController extends Controller
{

    public static function process($deposit)
    {
        $basic     = gs();
        $mollieAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);

        config(['mollie.key' => trim($mollieAcc->api_key)]);

        try {
            $payment = Mollie::api()->payments()->create([
                'amount'      => [
                    'currency' => "$deposit->method_currency",
                    'value'    => '' . sprintf('%0.2f', round($deposit->final_amo, 2)) . '',
                ],
                'description' => "Payment To $basic->site_name Account",
                'redirectUrl' => route('ipn.' . $deposit->gateway->alias),
                'metadata'    => ["order_id" => $deposit->trx,],
            ]);
            $payment = Mollie::api()->payments()->get($payment->id);
        } catch (\Exception $e) {
            $send['error']   = true;
            $send['message'] = $e->getMessage();
            return json_encode($send);
        }

        session()->put('payment_id', $payment->id);
        session()->put('deposit_id', $deposit->id);

        $send['redirect']     = true;
        $send['redirect_url'] = $payment->getCheckoutUrl();

        return json_encode($send);
    }
 
}
