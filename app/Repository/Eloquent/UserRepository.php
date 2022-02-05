<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Notifications\NewUserCreatePassword;
use App\Repository\UserRepositoryInterface;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
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
         //dd($data);
        if ($data['password'] == null)
        {
            $user->company = $data['company'] ?? $user->company;
            $user->name = $data['name'] ?? $user->name;
//        $user->email = $data['email'] ?? $user->email;
            $user->phone_number = $data['phone'] ?? $user->phone_number;
        } else
        {
            $user->company = $data['company'] ?? $user->company;
            $user->name = $data['name'] ?? $user->name;
//        $user->email = $data['email'] ?? $user->email;
            $user->password = bcrypt($data['password']) ?? $user->password;
            $user->phone_number = $data['phone'] ?? $user->phone_number;
        }

        $user->save();

        Auth::login($user);
    }

    public function all(): Collection
    {
        return $this->userModel->get();
    }

    public function allActive(): Collection
    {


        if (Gate::allows('admin-level')) {
            return $this->userModel->where('status', 1)->where('id', '!=', auth()->id())->get();
        }

        if (Gate::allows('forwarder-level')) {
            return $this->userModel->where('status', 1)->where('admin', '!=', 1)->where('forwarder', '!=', 1)->get();
        }

        abort(403);
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
            $forwarder = true;
        }

        if ($accountType == 'forwarder') {
            $forwarder = true;
        }

        $user = User::create([
            'company' => $data['company'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone'],
            'password' => bcrypt(Str::random(60)),
            'admin' => $admin,
            'forwarder' => $forwarder
        ]);

        $token = Password::broker('users')->createToken($user);

        Notification::send($user, new NewUserCreatePassword($token, $data['email']));
    }

    public function filter($userRole)
    {
        $users = $this->userModel->filter($userRole);

        return $users;
    }
}
