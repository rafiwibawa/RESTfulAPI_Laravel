<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function post(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return response()->json(
            [
                "message" => "Success",
                "data" => $product
            ]
        );
    }

    function get()
    {
        $data = Product::all();

        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }

    function getById($id)
    {
        $data = Product::where('id',$id)->first();

        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }

    function put($id, Request $request)
    {
        $product = Product::where('id',$id)->first();
        if($product){
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;

            $product->save();
            return response()->json(
                [
                    "message" => "PUT Method Success ",
                    "data" => $product
                ]
            );
        }
        return response()->json(
            [
                "message" => "PUT Method Failed ". $id
            ],
            400
        );
    }

    function delete($id)
    {
        $product = Product::where('id',$id)->first();
        if($product){
            $product->delete();
            return response()->json(
                [
                    "message" => "DELETE Method Success ". $id
                ]
            );
        }
        return response()->json(
            [
                "message" => "Delete Method Failed ". $id
            ],
            400
        );
    }
}
