<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function register(Request $request) {      //Create new user

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ], 422);
        }

       $user =  User::create($request->all());
    
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json(['token' => $token, 'user' => $user]);
    }
    
    // Login
    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }
    
        $user = User::where('email', $request['email'])->first();
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json(['token' => $token, 'user' => $user]);
    }
}
