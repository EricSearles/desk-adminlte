<?php

namespace App\Services;

use App\Repositories\AccessLevelRepository;

class AccessLevelService
{
    protected $repository;

    /**
     * @param $repository
     */
    public function __construct()
    {
        $this->repository = new AccessLevelRepository();
    }


    public function getAllAccessLevels(): object
    {
        return $this->repository->getAllAccessLevels();
    }

    public function getUsersAccessLevel()
    {
        return $this->repository->getUserAccessLevel();
    }


}
