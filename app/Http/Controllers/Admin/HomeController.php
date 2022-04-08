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
        $orders_date = Order::join('dish_order', 'dish_order.order_id', '=', 'orders.id')
            ->select('orders.date')
            ->orderBy('orders.date')
            ->distinct()
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('users', 'dishes.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->pluck('orders.date');
        $orders_price = Order::join('dish_order', 'dish_order.order_id', '=', 'orders.id')
            ->select(Order::raw('dishes.price * dish_order.quantity as total_price'))
            ->distinct()
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('users', 'dishes.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->pluck('total_price');

        $chart = new OrderChart;
        $chart->labels($orders_date->values());
        $chart->dataset('Riepilogo Ordini', 'bar', $orders_price->values());

        return view('admin.home', ['chart' => $chart]);
    }

    public function stats()
    {
        $orders_date = Order::join('dish_order', 'dish_order.order_id', '=', 'orders.id')
            ->select('orders.date')
            ->orderBy('orders.date')
            ->distinct()
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('users', 'dishes.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->pluck('orders.date');
        $orders_price = Order::join('dish_order', 'dish_order.order_id', '=', 'orders.id')
            ->select(Order::raw('dishes.price * dish_order.quantity as total_price'))
            ->distinct()
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('users', 'dishes.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->pluck('total_price');

        // SELECT SUM(orders.price_total)
        // FROM `orders`
        // JOIN dish_order ON dish_order.order_id = orders.id
        // JOIN dishes ON dish_order.dish_id = dishes.id
        // JOIN users ON users.id = dishes.user_id
        // WHERE users.id = 2
        // GROUP BY date
        // dd($orders_date, $orders_price);
        $chart = new OrderChart;
        $chart->labels($orders_date->values());
        $chart->dataset('Riepilogo Ordini', 'bar', $orders_price->values())
        ->backgroundColor('#2871cc');

        return view('admin.stats', ['chart' => $chart]);
    }
}
