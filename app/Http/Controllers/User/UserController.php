<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfile;
use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepositoryInterface;


class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
        $users = User::all();

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function details(int $userId)
    {
        $user = User::find($userId);

        return view('user.details', [
            'user' => $user
        ]);
    }

    public function edit(int $userId)
    {
        $user = User::findOrFail($userId);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserProfile $request)
    {

        $userId = $request->get('userId');
        $user = User::findOrFail($userId);

        $this->userRepository->updateModel(
            $user, $request->all()
        );


        return redirect()->action([UserController::class, 'details'], ['id' => $userId])->with('status', 'Profile updated');
    }


}
