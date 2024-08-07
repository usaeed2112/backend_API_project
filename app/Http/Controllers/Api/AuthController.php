<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(private AuthService $authService)
    {
    }

    public function register(UserRegisterRequest $request)
    {
        $data = $request->all();
        $response =   $this->authService->register($data);

        return response()->json(['status' => 'success', 'message' => 'User registered successfully', 'data' => $response], 201);
    }

    public function login(UserLoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        $authData = $this->authService->login($credentials);

        // Check if authentication failed
        if (isset($authData['status']) && $authData['status'] === 'error') {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Return the success response with the user data and token
        return response()->json(['status' => 'success', 'message' => 'Login successful', 'data' => $authData,], 201);
    }


    public function logout()
    {
        $this->authService->logout();
        return response()->json(['status' => 'success', 'message' => 'Successfully logged out'], 201);
    }
}
