<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Dish;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\Order;

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

    public function makePayment(PaymentRequest $request)
    {
        $val_data = $request->validated();

        $result = $this->gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // Order::create($val_data);
            // $transaction = $result->transaction;
            $newOrder = Order::create([
                'restaurant_id' => $request->restaurant_id,
                'customer_name' => $request->customer_name,
                'customer_lastname' => $request->customer_lastname,
                'customer_address' => $request->customer_address,
                'customer_telephone' => $request->customer_telephone,
                'customer_email' => $request->customer_email,
                'total' => $request->amount,
            ]);

            if ($request->has('dishes')) {
                foreach ($request->dishes as $dishData) {
                    $dish = Dish::find($dishData['dishID']);
                    if ($dish) {
                        $newOrder->dishes()->attach($dish->id, [
                            'quantity' => $dishData['quantity'],
                            'total' => $dishData['price'] * $dishData['quantity'],
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Transazione eseguita con successo',
                'transaction' => $result->transaction,
                'data' => $val_data
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
