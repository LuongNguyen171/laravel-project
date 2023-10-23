<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function updateUserInfo(Request $request) {
//        $email = $request->input('userEmail');
//        $newAddress = $request->input('userAddress');
//        $newPhone = $request->input('userPhoneNumber');
//
//        $user = User::where('userEmail', $email)->first();
//        if (!$user) {
//            return response()->json(['message' => 'Người dùng không tồn tại'], 404);
//        }
//        $user->update([
//            'userAddress' => $newAddress,
//            'userPhoneNumber' => $newPhone,
//        ]);
//        return response()->json(['message' => 'Thông tin đã được cập nhật'], 200);

        $user = $request->user();

        $user->userAddress = $request->input('userAddress');
        $user->userPhoneNumber = $request->input('userPhoneNumber');
        $user->save();

        return response()->json(['message' => 'Thông tin người dùng đã được cập nhật'], 200);
    }

    public function changeUserPassword(Request $request) {
        $user = auth()->user();
        $currentPassword = $request->input('currentPassword');
        $newPassword = $request->input('newPassword');
        $confirmPassword = $request->input('confirmPassword');

        if (!Hash::check($currentPassword, $user->userPassword)) {
            return response()->json(['message' => 'Mật khẩu cũ không đúng'], 401);
        }

        if ($newPassword !== $confirmPassword) {
            return response()->json(['message' => 'Mật khẩu mới không khớp'], 400);
        }

        $user->userPassword = Hash::make($newPassword);
        $user->save();

        return response()->json(['message' => 'Mật khẩu đã được cập nhật'], 200);
    }

    public function getUserBills(Request $request) {
        $email = $request->user()->userEmail;

        $bills = Bill::where('userEmail', $email)->get();

        if ($bills->isEmpty()) {
            return response()->json(['message' => 'Người dùng chưa có đơn hàng nào'], 200);
        } else {
            return response()->json(['bills' => $bills], 200);
        }
    }
}
