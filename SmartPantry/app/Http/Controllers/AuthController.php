<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users|email:rfc,dns|regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$',
            'password' => 'required|string|min:4|max:255|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/"',
        ]);

        $user = User::where('email', $request['email'])->first();

        if (! $user || ! Hash::check($request['password'], $user->password)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required',

        ]);

        $user = User::create([
            'Name' => $validatedData['Name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out',
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function UpdatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        $user = User::where('email', $request['email'])->firstOrFail();

        $user->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json([
            'message' => 'Password updated',
        ]);
    }

    public function UpdateEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users|email:rfc,dns|regex:/^.+@.+$/i',
        ]);

        $user = User::where('email', $request['email'])->firstOrFail();

        $user->update([
            'email' => $validatedData['email'],
        ]);

        return response()->json([
            'message' => 'Email updated',
        ]);
    }

    public function UpdateName(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
        ]);

        $user = User::where('email', $request['email'])->firstOrFail();

        $user->update([
            'Name' => $validatedData['Name'],
        ]);

        return response()->json([
            'message' => 'Name updated',
        ]);
    }
}
