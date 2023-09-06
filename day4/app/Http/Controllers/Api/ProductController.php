<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return  response()->json(['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'price' => 'required',
            'availability' => 'required',
            'picture' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);


        try {
            $data = $request->all();
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);

            unset($data['picture']);
            unset($data['_method']);
            unset($data['_token']);

            $data['picture'] = $imageName;
            $product = Product::create($data);
            return response()->json(['message' => $product]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server errors']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return  response()->json(['product' => $product]);
        } else {
            return response()->json(['message' => 'not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    function update($id, Request $request)
    {
        $product = Product::find($id);
        $request->validate([
            'name' => 'string|max:20|min:3',

        ]);
        if ($product) {
            $product->update($request->all());
            return response()->json(['message' => "Updated Successfully"]);
        } else {
            return response()->json(['message' => 'not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'deleted successfully']);
        } else {
            return response()->json(['message' => 'not found']);
        }
    }
}
