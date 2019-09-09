<?php

namespace App\Http\Controllers\account;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(User $user)
    {
        $orders = Order::where('user_id', $user->id)->paginate(3);
        return view('account.order.index', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order)
    {
//        dd($order);
        return view('account.order.showe', [
                'order' => $order
            ]
        );
    }


}
