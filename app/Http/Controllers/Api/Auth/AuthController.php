<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json([
                'status' => false,
                'message' => 'The given e-mail or password are incorrect',
            ], 403);
        }

        $user->tokens()->delete();
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'status' => true,
            'token' => $token,
        ], 200);
    }
    public function logout()
    {
        $user = auth()->user();
        
        if ($user) {
            $user->tokens()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Successfully logged out',
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'User not authenticated',
        ], 401);
    }
}

