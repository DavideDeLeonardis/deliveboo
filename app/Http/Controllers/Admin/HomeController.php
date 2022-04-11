<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Order;
use Carbon\Carbon;
use App\Charts\OrderChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('users', 'dishes.user_id', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->groupBy('orders.date')
            ->select(DB::raw('SUM(DISTINCT orders.price_total) as total_price'), 'orders.date')
            ->get();

        // $chart = new OrderChart;
        // $chart->labels($orders_date->values());
        // $chart->dataset('Riepilogo Ordini', 'bar', $orders_price->values())
        // ->backgroundColor('#2871cc');
        // ['chart' => $chart]

        return view('admin.stats', ['orders_date' => $orders_date, 'orders_price' => $orders_price]);
    }
}
