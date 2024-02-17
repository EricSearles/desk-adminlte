<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

use App\Models\AccessLevel;


class AccessLevelRepository
{
    protected $entity;

    /**
     * @param $entity
     */
    public function __construct()
    {
        $this->entity = new AccessLevel();
    }

    /**
     * Retorna todos os niveis de acesso de usuarios
     * @return object
     */
    public function getAllAccessLevels(): object
    {
        return $this->entity::all();
    }

    /**
     * Retorna nivel de acesso de usuario pelo id do nivel de acesso
     * @param int $id
     * @return object
     */
    public function getAccessLevelById(int $id): object
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Cria um novo nivel de acesso para usuario
     * @param array $accessLevel
     * @return object
     */
    public function createAccessLevel(array $accessLevel): object
    {
        return $this->entity->create($accessLevel);
    }

    /**
     * Atualiza dados de nivel de acesso de usuários
     * @param object $accessLevel
     * @param array $level
     * @return object
     */
    public function updateAccessLevel(object $accessLevel, array $level): object
    {
        return $accessLevel->update($level);
    }

    /**
     * Deleta nivel de acesso
     * @param object $accessLevel
     * @return mixed
     */
    public function deleteAccessLevel(object $accessLevel)
    {
        return $accessLevel->delete();
    }


}
