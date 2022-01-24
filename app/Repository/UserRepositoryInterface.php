<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function updateModel(User $user, array $data): void;

    public function all(): Collection;

    public function get(int $id): User;

    public function create(array $data);
}
