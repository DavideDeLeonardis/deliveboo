<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PaymentRequest;
use Braintree\Gateway;
use App\Model\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use App\Model\Order;

class PaymentController extends Controller
{
    public function generate(PaymentRequest $request, Gateway $gateway) {

        dd($gateway);
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        //dd($gateway->clientToken()->generate());

        return response()->json($data, 200);
    }

    public function makePayment(PaymentRequest $request, Gateway $gateway, Request $my_request) {

        $data = $my_request->all();

        $my_request->validate([
            'name' => 'required | max:100',
            'surname' => 'required | max:100',
            'address' => 'required | max:100',
            'email' => 'required | email | max:100',
        ]);
        // dd($data);

        // dd($request->amount);
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            // 'options' => [
            //     'submitForSettlment' => true
            // ]
        ]);

        

        if($result->success){
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!',
            ];

            return response()->json($data, 200);
        }
        else {
            $data = [
                'success' => false,
                'message' => 'Transazione Fallita'
            ];
            return response()->json($data, 404);
        }
    }
}
