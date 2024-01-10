<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function getProductsWithoutRedis()
    {
        $products = \DB::table('products')->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'id' => $product->id,
                'nama' => $product->name,
                'keterangan' => $product->desc
            ];
        }

        return response()->json([
            'message' => 'succeed!',
            'data' => $data,
            'code' => 200
        ]);
    }

    public function getProductsWithRedis()
    {
        $cache = Cache::remember('products', 10 * 60, function () {
            $products = \DB::table('products')->get();

            $data = [];
            foreach ($products as $product) {
                $data[] = [
                    'id' => $product->id,
                    'nama' => $product->name,
                    'keterangan' => $product->desc
                ];
            }

            return $data;
        });

        return response()->json([
            'message' => 'succeed!',
            'data' => $cache,
            'code' => 200
        ]);
    }
}
