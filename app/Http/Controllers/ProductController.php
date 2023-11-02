<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductStyle;


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

    public function getProductInfo(Request $request)
    {
        $productId = $request->input('productId');
    
        if ($productId) {
            $product = Product::with('productImage')->find($productId);
    
            if (is_object($product)) {
                return response()->json($product, 200);
            } else {
                return response()->json(['message' => 'Khong tim thay san pham'], 404);
            }
        } else {
            return response()->json(['message' => 'Thieu thong tin productId trong phan than yeu cau'], 400);
        }
    }
    
    //lấy thông tin sản phẩm theo ID
    /*public function getProductInfo(Request $request, $productId)
    {
        $product = Product::find($productId);

        if ($product) {
            return response()->json($product, 200);
        } else {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }
    }*/
    //lấy ảnh theo ID sản phẩm
    public function getProductImage($productId)
{
    $product = Product::with('productImage')->find($productId);

    if (is_object($product)) {
        $productImage = $product->productImage;
        if (is_object($productImage)) {
            return response()->json(['productImage' => $productImage->productImage]);
        } else {
            return response()->json(['message' => 'Không tìm thấy productImage cho productId này'], 404);
        }
    } else {
        return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
    }
}

public function getProductsByStyle($styleId)
{
    $style = ProductStyle::find($styleId);

    if (is_object($style)) {
        $products = Product::where('styleId', $styleId)->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm cho styleId này'], 404);
        }

        return response()->json($products);
    } else {
        return response()->json(['message' => 'Không tìm thấy style'], 404);
    }
}
   

    //top 10 sản phẩm bán chạy
    public function getTopProducts()
    {
        $topProducts = Product::orderBy('productSoldQt', 'desc')
            ->take(10) // Lấy top 10 sản phẩm
            ->get();

        return response()->json($topProducts);
    }
}
