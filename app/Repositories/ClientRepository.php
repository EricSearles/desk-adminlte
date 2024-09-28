<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    protected $model;

    /**
     * @param $entity
     */
    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function paginateClients($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function saveEndereco($client, $enderecoData)
    {
        return $client->enderecos()->create($enderecoData);
    }

    public function getClientWithEnderecos($id)
    {
        return $this->model->with('enderecos')->find($id);
    }

    //verifica se o usuario possui endereco cadastrado
    public function hasEndereco($id)
    {
        $client = $this->model->find($id);
        return $client && $client->enderecos()->exists();
    }

}
