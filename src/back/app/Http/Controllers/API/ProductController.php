<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::whereNull('product_id')->with('childProducts')->get();
        return ProductResource::collection($products);
    }

    public function changePosition(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:products,id',
            'direction' => 'required|in:up,down'
        ]);

        $product = Product::findOrFail($data['id']);
        $currentPosition = $product->position;

        if ($data['direction'] === 'up') {
            $swapProduct = Product::where('position', $currentPosition - 1)->first();
        } else {
            $swapProduct = Product::where('position', $currentPosition + 1)->first();
        }

        if ($swapProduct) {
            $product->position = $swapProduct->position;
            $swapProduct->position = $currentPosition;

            $product->save();
            $swapProduct->save();

            return response()->json(['message' => 'Product position updated successfully']);
        }

        return response()->json(['message' => 'Product cannot be moved'], 400);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
