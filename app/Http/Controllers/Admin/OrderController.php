<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(5);
        return view('admin.order.index',[
            'orders'=>$orders
        ]);
    }
    public function show(Order $order)
    {
        return view('admin.order.show',
            [
                'order'=>$order
            ]);
    }
    public function edit(Order $order)
    {
        dd($order);
    }

    public function delete(Order $order)
    {
        dd($order);
    }
}
