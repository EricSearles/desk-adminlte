<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ClientService;

class ClientController extends Controller
{

    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientService->getClientsWithEnderecoStatusPaginated(10);

        return view('clients.index', compact('clients'));
    }

    public function buscaDadosCliente()
    {
        $dados = $this->clientService->getClientWithEnderecos();
    }

    public function showAddEnderecoForm($id)
    {
        $client = $this->clientService->getClientWithEnderecos($id);

        if (!$client) {
            return redirect()->back()->with('error', 'Usuário não encontrado');
        }

        return view('clients.add-endereco', compact('client'));
    }

    public function addEndereco(Request $request, $id)
    {
        $request->validate([
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'cep' => 'required|string|max:10',
            'pais' => 'required|string|max:255',
        ]);

        try {
            $this->clientService->addEnderecoToClient($id, $request->all());

            return redirect()->route('clients', $id)->with('success', 'Endereço adicionado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
