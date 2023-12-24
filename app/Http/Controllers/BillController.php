<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{

    public function createBill(Request $request)
    {
        try {

            $request->validate([
                'userName' => 'required|string|max:255',
                'userEmail' => 'required|email|max:255',
                'userAddress' => 'required|string',
                'userPhoneNumber' => 'required|string|max:20',
                'productId' => 'required|exists:products|integer',
                'quantityPurchased' => 'required|integer',
                'DatePurchase' => 'required|date',
            ]);

            $bill = Bill::create($request->all());
            return response()->json(['message' => 'Bill created successfully', 'bill' => $bill], 201);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['message' => "Failed to create bill: $errorMessage"], 500);
        }
    }

    public function getBillByUser()
    {
        try {
            $user = Auth::user();

            $bills = Bill::where('userEmail', $user->userEmail)->get();

            return response()->json(['bills' => $bills], 200);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['message' => "Failed to get bills: $errorMessage"], 500);
        }
    }
}
