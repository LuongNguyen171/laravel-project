<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Mail\ResetPasswordMail;
use App\Mail\BillConfirm;
use App\Mail\testMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    //


    public function requestResetPasswordEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userEmail' => 'required|email|exists:users,userEmail',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('userEmail', $request->userEmail)->first();
        $host = env('CLIENT_URL');
        $token = $user->createToken('authToken')->plainTextToken;
        $resetLink = env('CLIENT_URL') . 'user/reset-password/?token=' . $token;

        try {
            $this->sendResetPasswordEmail($user, $host, $resetLink);

            return response()->json(['message' => 'Reset password email sent successfully', 'token' => $token], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send reset password email'], 500);
        }
    }
    public function requestConfirmBillEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userEmail' => 'required|email',
            'userName' => 'required|string',
            'products' => 'required|array',
            'products.*.productId' => 'required|exists:products,productId',
            'products.*.quantityPurchased' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {

            $userEmail = $request->input('userEmail');
            $userName = $request->input('userName');
            $products = $request->input('products');

            $this->sendBillConfirmEmail($userEmail, $userName, $products);
            return response()->json(['message' => 'Request for bill confirmation sent successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send reset password email'], 500);
        }
    }



    public function sendResetPasswordEmail($user, $host, $resetLink)
    {
        try {
            Mail::to($user->userEmail)
                ->send(new ResetPasswordMail($user, $host, $resetLink));

            return response()->json(['message' => 'Reset password email sent successfully'], 200);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['message' => "Failed to send reset password email. Error: $errorMessage"], 500);
        }
    }

    public function sendBillConfirmEmail($userEmail, $userName, $products)
    {
        try {
            Mail::to($userEmail)
                ->send(new BillConfirm($userEmail, $userName, $products));

            return response()->json(['message' => 'Bill confirm email sent successfully'], 200);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['message' => "Failed to send bill confirm email. Error: $errorMessage"], 500);
        }
    }

    // public function test()
    // {
    //     try {
    //         Mail::to("20521589@gm.uit.edu.vn")->send(new testMail());
    //         return response()->json(['message' => 'Reset password email sent successfully'], 200);
    //     } catch (\Exception $e) {
    //         $errorMessage = $e->getMessage();
    //         return response()->json(['message' => "Failed to send reset password email. Error: $errorMessage"], 500);
    //     }
    // }
}
