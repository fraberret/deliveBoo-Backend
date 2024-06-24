<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    private $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
    }

    public function generateToken()
    {
        $token = $this->gateway->clientToken()->generate();

        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }

    public function makePayment(Request $request)
    {
        $result = $this->gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            return response()->json([
                'success' => true,
                'message' => 'Transazione eseguita con successo',
                'transaction' => $result->transaction
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Transazione fallita',
                'errors' => $result->errors->deepAll()
            ]);
        }
    }
}
