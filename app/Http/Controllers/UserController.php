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
        $users = User::with('accessLevels')->paginate();
        $accessLevels = $this->accessLevelService->getAllAccessLevels();

        return view('users.index', compact('users', 'accessLevels'));
    }

    public function retornaUsuarios()
    {
        $users = User::with('accessLevels')->paginate();

        return response()->json([
            'results' => $users
        ], 200);
    }
}
