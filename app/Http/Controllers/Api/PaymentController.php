<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PaymentRequest;
use Braintree\Gateway;
use App\Model\Dish;
use Carbon\Carbon;
use App\Model\Order;
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

    public function order(Request $request) {

        $request->validate([
            'name' => 'required | max:100',
            'lastname' => 'required | max:100',
            'address' => 'required | max:100',
            'email' => 'required | email | max:100',
            'cart' => 'required'
        ]);

        $data = $request->all();
        
        // dd(json_decode(request('cart')));
        // $cart = (array)json_decode($data['cart']);
        // var_dump($data['cart']);

        $newOrder = new Order();
        $newOrder->payment_id = 2;
        $newOrder->name = $data['name'];
        $newOrder->lastname = $data['lastname'];
        $newOrder->email = $data['email'];
        $newOrder->address = $data['address'];
        $newOrder->date = Carbon::now()
            ->format('Y-m-d');
        $newOrder->time = Carbon::now()
            ->format('H:m');
        $newOrder->price_total = 100;

        foreach ($data['cart'] as $dish) {
            $newOrder->dishes()->attach($dish, ['quantity' => $dish->quantity]);
            // $newOrder->dishes()->order_id = $newOrder->id;
            // $newOrder->dishes()->quantity = $dish->quantity;
        }
        
        $newOrder->save();
        
        

    }
}
