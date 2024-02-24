<?php

namespace App\Repositories\Settings;

use App\Models\Menu;

class MenuRepository
{
    protected $entity;

    /**
     * @param $entity
     */
    public function __construct()
    {
        $this->entity = new Menu();
    }

    public function getAllMenus()
    {
        return $this->entity::orderBy('order')->get();
    }


}
