<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\shared\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
