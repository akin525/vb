<?php

namespace App\Http\Controllers\Gateway\CoinbaseCommerce;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use App\Models\Deposit;
use Illuminate\Http\Request;

class ProcessInvoiceController extends Controller
{
    public static function process($deposit)
    {
        $basic       = gs();
        $coinbaseAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);

        $url   = 'https://api.commerce.coinbase.com/charges';
        $array = [
            'name'         => explode("|", $deposit->val_1)[1],
            'description'  => "Pay to " . $basic->site_name,
            'local_price'  => [
                'amount'   => $deposit->final_amo,
                'currency' => $deposit->method_currency,
            ],
            'metadata'     => [
                'trx' => $deposit->trx,
            ],
            'pricing_type' => "fixed_price",
            'redirect_url' => route(gatewayRedirectUrl(true)),
            'cancel_url'   => route(gatewayRedirectUrl()),
        ];

        $jsonData = json_encode($array);
        $ch       = curl_init();
        $apiKey   = $coinbaseAcc->api_key;
        $header   = [];
        $header[] = 'Content-Type: application/json';
        $header[] = 'X-CC-Api-Key: ' . "$apiKey";
        $header[] = 'X-CC-Version: 2018-03-22';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result);

        if (@$result->error == '') {

            $send['redirect']     = true;
            $send['redirect_url'] = $result->data->hosted_url;
        } else {

            $send['error']   = true;
            $send['message'] = 'Some problem ocurred with api.';
        }

        $send['view'] = '';
        return json_encode($send);
    } 
}
