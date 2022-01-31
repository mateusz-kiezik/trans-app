<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserCreatePassword;
use App\Http\Requests\UpdateUserProfile;
use App\Models\User;

use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;


class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
//        if (!Gate::allows('forwarder-level')) {
//            abort(403);
//        }

        $users = $this->userRepository->allActive();

        return view('user.list', [
            'users' => $users
        ]);
    }

//    public function disableList()
//    {
//        $users = $this->userRepository->allDisabled();
//
//        return view('user.disabled', [
//            'users' => $users
//        ]);
//    }

    public function disableUser(Request $request)
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }

        $userId = $request->get('userId');
        $user = $this->userRepository->get($userId);

        $this->userRepository->updateStatus($user, false);

        return redirect()->action([UserController::class, 'list'])->with('status', 'User disabled');
    }
//
//    public function enableUser(Request $request)
//    {
//        $userId = $request->get('userId');
//        $user = $this->userRepository->get($userId);
//
//        $this->userRepository->updateStatus($user, true);
//
//        return redirect()->action([UserController::class, 'disableList'])->with('status', 'User enabled');
//    }

    public function details(int $userId)
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }

        $user = $this->userRepository->get($userId);

        return view('user.details', [
            'user' => $user
        ]);
    }

    public function edit(int $userId)
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }

        $user = User::findOrFail($userId);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserProfile $request)
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }

        $userId = $request->get('userId');
        $user = User::findOrFail($userId);

        $this->userRepository->updateModel(
            $user, $request->all()
        );

        return redirect()->action([UserController::class, 'details'], ['id' => $userId])->with('status', 'Profile updated');
    }

    public function new()
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }

        return view('user.new');
    }

    public function save(NewUserCreatePassword $request)
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }

        $this->userRepository->create($request->all());

        return redirect()->action([UserController::class, 'list'])->with('status', 'New user created');
    }





    public function showProfile()
    {
        $user = $this->userRepository->get(Auth::id());

        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(UpdateUserProfile $request)
    {
        $user = $this->userRepository->get(Auth::id());

        $this->userRepository->updateModel(
            $user, $request->all()
        );

        return redirect()->action([UserController::class, 'showProfile'])->with('status', 'Profile updated');
    }

    public function createPassword($token)
    {

        return view('auth.passwords.create', [
            'token' => $token,
            'email' => request()->get('email')
        ]);
    }


}
