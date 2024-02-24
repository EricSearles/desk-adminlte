<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccessLevel;
use App\Services\AccessLevelService;

class UserController extends Controller
{
    protected $accessLevelService;

    /**
     * @param $accessLevelService
     */
    public function __construct()
    {
        $this->accessLevelService = new AccessLevelService();
    }


    public function index()
    {
        $users = User::paginate();

        $usersAccessLevels = $this->accessLevelService->getUsersAccessLevel();
        $accessLevels = $this->accessLevelService->getAllAccessLevels();

        //dd($usersAccessLevels);

        return view('users.index', compact('users', 'usersAccessLevels', 'accessLevels'));
    }

    public function retornaUsuarios()
    {
        $users = user::all();

        return response()->json([
            'results' => $users
        ], 200);
    }
}
