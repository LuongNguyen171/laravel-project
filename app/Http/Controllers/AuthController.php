<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ]);

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 201);
        } catch (ValidationException $e) {
            // Xử lý lỗi xác thực (ValidationException)
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Xử lý lỗi khác (Exception)
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'userEmail' => 'required|email',
            'userPassword' => 'required|string',
        ]);

        // Tìm người dùng với email
        $user = User::where('userEmail', $credentials['userEmail'])->first();

        // Kiểm tra nếu tài khoản tồn tại và mật khẩu hợp lệ
        if ($user && Hash::check($credentials['userPassword'], $user->userPassword)) {
            // Đăng nhập thành công, tạo mã thông báo
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);
        } else {
            // Đăng nhập không thành công
            return response()->json(['message' => 'Mật khẩu không đúng'], 401);
        }
    }
}
