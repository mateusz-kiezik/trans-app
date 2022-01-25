<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserProfile;
use App\Http\Requests\UpdateUserProfile;
use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
//        $users = User::all();

//        if (!Gate::allows('forwarder-level')) {
//            abort(403);
//        }
        $users = $this->userRepository->allActive();

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function disableList()
    {
        $users = $this->userRepository->allDisabled();

        return view('user.disabled', [
            'users' => $users
        ]);
    }

    public function disableUser(Request $request)
    {
        $userId = $request->get('userId');
        $user = $this->userRepository->get($userId);

        $this->userRepository->updateStatus($user, false);

        return redirect()->action([UserController::class, 'list'])->with('status', 'User disabled');
    }

    public function enableUser(Request $request)
    {
        $userId = $request->get('userId');
        $user = $this->userRepository->get($userId);

        $this->userRepository->updateStatus($user, true);

        return redirect()->action([UserController::class, 'disableList'])->with('status', 'User enabled');
    }

    public function details(int $userId)
    {
//        $user = User::find($userId);

        $user = $this->userRepository->get($userId);

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

    public function new()
    {
        return view('user.new');
    }

    public function save(CreateUserProfile $request)
    {
        $this->userRepository->create($request->all());

        return redirect()->action([UserController::class, 'list'])->with('status', 'New user created');
    }

}
