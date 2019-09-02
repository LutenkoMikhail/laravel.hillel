<?php

namespace App\Http\Controllers\Account;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('account.index');
    }

    public function edit(User $user)
    {
        return view('account.edit',
            [
                'user' => $user
            ]);

    }

    public function update(Request $request, User $user)
    {
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->telefon = $request['telefon'];
        $user->birthday = $request['birthday'];
        $user->email = $request['email'];
        $user->save();
        return redirect()->route('account.main');
    }
}
