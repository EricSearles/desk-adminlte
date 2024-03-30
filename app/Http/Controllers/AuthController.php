<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public $loginAfterSignup = true;

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token =auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credencials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }else{
            return response()->json(['msg' => 'Sucesso']); 
        }

        return $this->respondWithToken($token);
    }

    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth->logout();
        return response()->json(['message'=> 'Successfuly logged out']);
    }

    protected function respodWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' auth()->factory->getTTL() * 60
        ])
    }
    //
}
