<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();

        return view('user.list', [
            'users'=> $users
        ]);
    }

    public function details(int $UserId)
    {
        $user = User::find($UserId);

        return view('user.details', [
           'user' => $user
        ]);
    }
}
