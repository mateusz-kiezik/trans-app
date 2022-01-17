<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
//    private User $userModel;
//
//    public function __construct(User $userModel)
//    {
//        $this->userModel = $userModel;
//    }

    public function updateModel(User $user, array $data): void
    {
       // dd($data);
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        $user->phone_number = $data['phone'] ?? $user->phone_number;

        $user->save();
    }
}
