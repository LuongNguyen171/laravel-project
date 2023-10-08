<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        try {
            $products = Product::all();

            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đã xảy ra lỗi: ' . $e->getMessage()], 500);
        }
    }
}
