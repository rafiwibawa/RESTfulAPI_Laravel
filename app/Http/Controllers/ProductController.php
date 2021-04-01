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

    function put($id)
    {
        return response()->json(
            [
                "message" => "PUT Method Success ". $id
            ]
        );
    }

    function delete($id)
    {
        return response()->json(
            [
                "message" => "DELETE Method Success ". $id
            ]
        );
    }
}
