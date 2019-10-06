<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::paginate(5);
        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {

//      $orderProducts=$order->product()->get();
//        dd($orderProducts);
        return view('admin.order.show',
            [
                'order' => $order
            ]);
    }

    /**
     * @param Order $order
     */
    public function edit(Order $order)
    {
        $orderStatus = \App\StatusOrder::all('id', 'name');
        return view('admin.order.edit',
            [
                'order' => $order,
                'orderStatus' => $orderStatus
            ]);
    }

    /**
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        $idOrderStatus = \App\StatusOrder::where(
            'name',
            '=',
            $request['status']
        )->first('id');

        $order->status_id = $idOrderStatus['id'];
        $order->save();
        return redirect()->route('admin.orders');
    }

    /**
     * @param Order $order
     */
    public function delete(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders');
    }
}
