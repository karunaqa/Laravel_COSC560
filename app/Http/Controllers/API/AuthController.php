<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request, Post $post)
    {
        $data = $request->validate([
            // 'email' => ['required','email',',exists:users'],
            // 'password' => ['required','min:6'],
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
  
            
       
        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            return response()->json([
                'data' => null,
                'message' => 'Wrong Credentislas',

            ],401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);

    }
}
