<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\ProductStyle;
use App\Models\ProductImage;



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

    public function addProduct(Request $request)
    {
        try {
            $request->validate([
                'productName' => 'required|string',
                'productPrice' => 'required|numeric',
                'styleId' => 'integer',
                'productImage' => 'string',
                'productStatus' => 'boolean',
                'productQuantity' => 'integer',
                'productSoldQt' => 'integer',
                'productInfor' => 'string',
                'productIntro' => 'string',
                'productDiscount' => 'numeric',
                'productTmName' => 'string'
            ]);

            $product = new Product([
                'productName' => $request->input('productName'),
                'productPrice' => $request->input('productPrice'),
                'styleId' => $request->input('styleId'),
                'productImage' => $request->input('productImage'),
                'productStatus' => $request->input('productStatus'),
                'productQuantity' => $request->input('productQuantity'),
                'productSoldQt' => $request->input('productSoldQt'),
                'productInfor' => $request->input('productInfor'),
                'productIntro' => $request->input('productIntro'),
                'productDiscount' => $request->input('productDiscount'),
                'productTmName' => $request->input('productTmName')
            ]);

            $product->save();

            return response()->json(['message' => 'Sản phẩm đã được thêm thành công'], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Lỗi cơ sở dữ liệu: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi: ' . $e->getMessage()], 500);
        }
    }

    public function updateProduct(Request $request, $id)
    {
        try {
            //            $id = $request->input('id');
            $product = Product::find($id);

            if (!$product) {
                return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
            }

            $validator = Validator::make($request->all(), [
                'productName' => 'string',
                'productPrice' => 'numeric',
                'styleId' => 'integer',
                'productImage' => 'string',
                'productStatus' => 'boolean',
                'productQuantity' => 'integer',
                'productSoldQt' => 'integer',
                'productInfor' => 'string',
                'productIntro' => 'string',
                'productDiscount' => 'numeric',
                'productTmName' => 'string'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            $product->update($request->all());

            return response()->json(['message' => 'Sản phẩm đã được cập nhật'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Lỗi cơ sở dữ liệu: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi: ' . $e->getMessage()], 500);
        }
    }

    public function deleteProduct(Request $request, $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
            }

            $product->delete();

            return response()->json(['message' => 'Xóa sản phẩm thành công'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Lỗi cơ sở dữ liệu: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi: ' . $e->getMessage()], 500);
        }
    }


    // public function getProductInfo(Request $request, $productId)
    // {
    //     try {
    //         // Tìm sản phẩm theo productId và kèm theo thông tin hình ảnh nếu có
    //         $product = Product::with('productImage')->find($productId);

    //         if ($product) {
    //             return response()->json($product, 200);
    //         } else {
    //             return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
    //     }
    // }
    public function getProductInfo($productId)
    {
        try {

            if (!$productId) {
                return response()->json(['message' => 'Thiếu thông tin productId'], 400);
            }

            $product = Product::find($productId);

            if ($product) {
                return response()->json($product, 200);
            } else {
                return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }


    public function getProductImage($productId)
    {
        try {
            if (!$productId) {
                return response()->json(['message' => 'Thiếu thông tin productId trong đường dẫn'], 400);
            }

            $productImages = ProductImage::where('productId', $productId)->get();

            if ($productImages->isNotEmpty()) {
                return response()->json($productImages, 200);
            } else {
                return response()->json(['message' => 'Không tìm thấy hình ảnh cho sản phẩm'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }

    public function getProductsByStyle($styleId)
    {
        try {
            if (!$styleId) {
                return response()->json(['message' => 'Thiếu thông tin styleId trong đường dẫn'], 400);
            }

            $products = Product::where('styleId', $styleId)->get();

            if ($products->isNotEmpty()) {
                return response()->json($products, 200);
            } else {
                return response()->json(['message' => 'Không tìm thấy sản phẩm có id này'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }



    // public function getProductsByStyle($styleId)
    // {
    //     $style = ProductStyle::find($styleId);

    //     if (is_object($style)) {
    //         $products = Product::where('styleId', $styleId)->get();

    //         if ($products->isEmpty()) {
    //             return response()->json(['message' => 'Không tìm thấy sản phẩm cho styleId này'], 404);
    //         }

    //         return response()->json($products);
    //     } else {
    //         return response()->json(['message' => 'Không tìm thấy style'], 404);
    //     }
    // }


    //top 10 sản phẩm bán chạy
    public function getTopProducts()
    {
        $topProducts = Product::orderBy('productSoldQt', 'desc')
            ->take(10) // Lấy top 10 sản phẩm
            ->get();

        return response()->json($topProducts);
    }
    //top 10 HighestPrice
    public function getTopProductsHighestPrice()
    {
        $topProducts = Product::orderBy('productPrice', 'asc')
            ->take(10) // Lấy top 10 sản phẩm
            ->get();

        return response()->json($topProducts);
    }
}
