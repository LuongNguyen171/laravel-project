<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        try {
            $request->validate([
                'userName' => 'required|string',
                'userEmail' => 'required|email|unique:users,userEmail',
                'userPassword' => 'required|string',

            ]);

            $user = User::create([
                'userName' => $request->userName,
                'userEmail' => $request->userEmail,
                'userPassword' => Hash::make($request->userPassword),
                'userRole' => false,
            ]);

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'userEmail' => 'required|email',
            'userPassword' => 'required|string',
        ]);

        $user = User::where('userEmail', $credentials['userEmail'])->first();

        if ($user && Hash::check($credentials['userPassword'], $user->userPassword)) {
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
