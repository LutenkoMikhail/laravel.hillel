<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::paginate(5);
        return view('admin.customer.index',[
            'customers'=>$customers
        ]);
    }
    public function show(User $user)
    {
       return view('admin.customer.show',
       [
           'customer'=>$user
       ]);
    }
    public function edit(User $user)
    {
        dd($user);
    }

    public function delete(User $user)
    {
        dd($user);
    }
}
