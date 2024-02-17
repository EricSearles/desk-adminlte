<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\AccessLevelService;

class AccessLevelController extends Controller
{

    protected $acessLevelService;

    public function __construct()
    {
        $this->accessLevelService = new AccessLevelService();
    }

    public function getAllAccessLevels()
    {

        $accesLevels = $this->accessLevelService->getAllAccessLevels();

        return view('access_levels.index', compact('accesLevels'));
    }
}
