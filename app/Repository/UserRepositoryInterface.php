<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function updateModel(User $user, array $data): void;

    public function updateStatus(User $user, bool $status): void;

    public function all(): Collection;

    public function allActive(): Collection;

    public function allDisabled(): Collection;

    public function get(int $id): User;

    public function create(array $data);

    public function filter($userRole);
}
