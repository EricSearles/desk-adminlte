<?php

namespace App\Services\Settings;

use App\Repositories\Settings\MenuRepository;

class MenuService
{
    protected $repository;

    /**
     * @param $repository
     */
    public function __construct()
    {
        $this->repository = new MenuRepository();
    }

    public function getAllMenus()
    {
        return $this->repository->getAllMenus();
    }

}
