<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\shared\BaseService;

class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
