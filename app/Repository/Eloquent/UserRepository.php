<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

class UserRepository implements UserRepositoryInterface
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function updateModel(User $user, array $data): void
    {
        // dd($data);
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        $user->phone_number = $data['phone'] ?? $user->phone_number;

        $user->save();
    }

    public function all(): Collection
    {
        return $this->userModel->get();
    }

    public function allActive(): Collection
    {
        return $this->userModel->where('status', 1)->get();
    }

    public function allDisabled(): Collection
    {
        return $this->userModel->where('status', 0)->get();
    }

    public function updateStatus(User $user, bool $status): void
    {
        $user->status = $status;
        $user->save();
    }


    public function get(int $id): User
    {
        return $this->userModel->find($id);
    }

    public function create(array $data)
    {
        $accountType = $data['accountType'];
        $admin = false;
        $forwarder = false;

        if ($accountType == 'admin') {
            $admin = true;
        }

        if ($accountType == 'forwarder') {
            $forwarder = true;
        }

        User::create([
            'company' => $data['company'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone'],
            'password' => bcrypt($data['password']),
            'admin' => $admin,
            'forwarder' => $forwarder
        ]);
    }
}
