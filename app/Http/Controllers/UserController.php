<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccessLevel;
use App\Services\AccessLevelService;
use App\Services\UserService;


class UserController extends Controller
{
    protected $userService;
    protected $accessLevelService;

    /**
     * @param $accessLevelService
     */
    public function __construct(UserService $userService, AccessLevelService $accessLevelService)
    {
        $this->userService = $userService;
        $this->accessLevelService = $accessLevelService;
    }


    public function index()
    {
        $users = $this->userService->getUsers();
        $accessLevels = $this->userService->getAllAccessLevels();

        return view('users.index', compact('users', 'accessLevels'));
    }

    public function getUserByType($type_id)
    {
//        $users = User::whereHas('userTypes', function ($query) use ($type_id)  {
//                $query->where('type_of_user_id', $type_id); // Ajuste o ID do tipo conforme necessário
//                })->paginate(10); // Ajuste o número de itens por página conforme necessário
        $users = $this->userService->getUserByType($type_id);
        $accessLevels = $this->userService->getAllAccessLevels();

        return view('users.index', compact('users', 'accessLevels'));
    }

    public function retornaUsuarios()
    {
        $users = User::with('accessLevels')->paginate();

        return response()->json([
            'results' => $users
        ], 200);
    }

    public function show(){
        return "OI";
    }

    public function editarDados(){
        //
    }

    public function deletarDados(){
        //
    }
}
