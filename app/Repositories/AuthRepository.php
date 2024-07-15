<?php

namespace App\Repositories;


use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository implements AuthInterface
{
    public function __construct(private User $model)
    {
    }

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->model->create($data);
    }

    public function login(array $data)
    {
        $credentials = ['email' => $data['email'], 'password' => $data['password']];

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'token' => $token,
        ], 200);
    }


    public function logout()
    {
        try {
            $forever = true;
            JWTAuth::getToken();
            JWTAuth::invalidate($forever);
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to logout, please try again',
            ], 500);
        }
    }
}
