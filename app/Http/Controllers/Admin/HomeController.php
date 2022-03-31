<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Order;
use App\Charts\OrderChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $orders = Order::join('dish_order', 'dish_order.order_id', '=', 'orders.id')
            ->select('orders.date', Order::raw('dishes.price * dish_order.quantity'))
            ->distinct()
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('users', 'dishes.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->get();

        $chart = new OrderChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);

        return view('admin.home', ['orders' => $orders, 'chart' => $chart]);
    }
}
