<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\AccessLevelService;

class UserService
{
    private $repository;
    private $accessLevelService;

    public function __construct(
        UserRepository $repository,
        AccessLevelService $accessLevelService
    )
    {
        $this->repository = $repository;
        $this->accessLevelService = $accessLevelService;
    }

    public function getUsers()
    {
        return $this->repository->getUsers();
    }

    public function getUserByType(int $type_id): object
    {
        return $this->repository->getUserByType($type_id);
    }

    public function getAllAccessLevels()
    {
        return $this->accessLevelService->getAllAccessLevel();
    }
}
