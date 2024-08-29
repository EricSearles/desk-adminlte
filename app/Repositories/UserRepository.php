<?php

namespace App\Repositories;

use App\Models\TypesOfUsers;
use App\Models\User;

class UserRepository
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUsers()
    {
        return User::with('accessLevels')->paginate();
    }

    public function getUserByType(int $type_id): object
    {
        return User::whereHas('userTypes', function ($query) use ($type_id)
        {$query->where('type_of_user_id', $type_id); // Ajuste o ID do tipo conforme necessário
        })->paginate(10); // Ajuste o número de itens por página conforme necessário
    }




}
