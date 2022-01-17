<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function details(int $userId)
    {


        //$userId = $request->get('userId');
        $user = User::find($userId);

        return view('user.details', [
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {
        $userId = $request->get('userId');
        $user = User::findOrFail($userId);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $userId = $request->get('userId');

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:2'
        ]);

        if ($validator->fails()) {
            return redirect('/users/edit')->withErrors($validator)->withInput();
        }

        return redirect()->action([UserController::class, 'details'], ['id' => $userId]);
    }


}
