<?php

namespace App\Services;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(private AuthInterface $apiInterface)
    {
    }

    public function register(array $data)
    {
        $user = $this->apiInterface->register($data);
        $token = Auth::guard('api')->login($user);
        return $data = [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(array $credentials)
    {
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return [
                'status' => 'error',
                'message' => 'Invalid credentials',
            ];
        }

        $user = Auth::guard('api')->user();
        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function logout()
    {
        return $this->apiInterface->logout();
    }
}
