<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function addProduct(Request $request) {
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

//            return response()->json(['message' => 'Sản phẩm đã được thêm thành công'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Lỗi cơ sở dữ liệu: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi: ' . $e->getMessage()], 500);
        }
    }

    public function updateProduct(Request $request, $id) {
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

    public function deleteProduct(Request $request, $id) {
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
}
