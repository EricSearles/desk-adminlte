<?php

namespace App\Services;

use App\Repositories\ClientRepository;

class ClientService
{

    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function addEnderecoToClient($clientId, $enderecoData)
    {
        $client = $this->clientRepository->find($clientId);

        if (!$client) {
            throw new \Exception('CLiente não encontrado');
        }

        return $this->clientRepository->saveEndereco($client, $enderecoData);
    }

    public function getClientWithEnderecos($clientId)
    {
        return $this->clientRepository->getClientWithEnderecos($clientId);
    }

    //verifica se o usuario possui endereco cadastrado
    public function clientHasEndereco($clientId)
    {
        return $this->clientRepository->hasEndereco($clientId);
    }

    //Busca dados de clientes com endereço
    public function getCLientsWithEnderecoStatusPaginated($perPage = 10)
    {
        $paginatedClients = $this->clientRepository->paginateClients($perPage);

        foreach ($paginatedClients as $client) {
            $client->hasEndereco = $this->clientRepository->hasEndereco($client->id);
        }

        return $paginatedClients;
    }


}
