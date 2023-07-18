<?php

namespace App\Http\Controllers;

use App\Models\MpesaDb;
use Illuminate\Http\Request;
use Safaricom\Mpesa\Facade\Mpesa;

class MpesaController extends Controller
{
    private $request_id;

    private function getAccessToken()
    {
        $url = env('MPESA_ENV') == 'live'
            ? 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
            : 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($url);
        curl_setopt_array($curl, array(
            CURLOPT_HTTPHEADER => ['content-type:application/json; charset=utf8'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
        ));

        $response = (object)curl_exec($curl);
        curl_close($curl);

        return $response->access_token;
    }

    /**
     * stk push
     */
    public function stkPush(Request $request)
    {

        $request->validate([
            'phone' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        //check if the phone number is valid if not replace the first 0 with 254
        $phone = $request->phone;
        if (strlen($phone) == 10) {
            $phone = '254' . substr($phone, 1);
        }




        $mpesa = new \Safaricom\Mpesa\Mpesa();

        $BusinessShortCode = '174379';
        $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType = 'CustomerPayBillOnline';
        $Amount = $request->amount;
        $PartyA = $phone;
        $PartyB = '174379';
        $PhoneNumber = $phone;
        $CallBackURL = 'https://f3bc-102-68-76-233.ngrok-free.app/mpesa/callback';
        $AccountReference = 'test';
        $TransactionDesc = 'test';
        $remarks = 'test';


        $stkPushSimulation = $mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaPasskey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $remarks
        );
    }

    public function handlePostCallback(Request $request)
    {
        $mpesa = new \Safaricom\Mpesa\Mpesa();

        $callbackData = $mpesa->getDataFromCallback();

        $data = json_decode($callbackData);
        // Access the correct property "ResultDesc" instead of "ResultDec"
        $metadata = $data->Body->StkCallback->CallbackMetadata;
        $resultCode = $data->Body->StkCallback->ResultCode;
        $amountPaid = $metadata->Item[0]->Value;
        $mpesaReceiptNumber = $metadata->Item[1]->Value;
        $transactionDate = $metadata->Item[2]->Value;
        $PhoneNumber = $metadata->Item[3]->Value;

        // Save the data to the database
        MpesaDb::create([
            'phone_number' => $PhoneNumber,
            'amount' => $amountPaid,
            'transaction_code' => $mpesaReceiptNumber,
            'transaction_time' => $transactionDate,
        ]);
    }
}
