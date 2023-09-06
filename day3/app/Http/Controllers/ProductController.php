<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::get();
        return view('product.index', ['products' => $products]);
    }

    function show($id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }


    function destroy($id)
    {
        $product = Product::find($id);
        File::delete(public_path('images/' . $product->picture));
        $product->delete();
        return redirect()->route('product.index');
    }


    function update($id)
    {
        $product = Product::find($id);
        return view('product.update', compact('product'));
    }


    function edit($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'price' => 'required',
            'availability' => 'required',
            'picture' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        
        $data = $request->all();

        if (isset($request->picture)) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
            dd($data['picture']);
            unset($data['picture']);
            $data['picture'] = $imageName;
        }

        unset($data['_method']);
        unset($data['_token']);



        $product = Product::find($id);
        $product->update($data);

        return redirect()->route('product.index');
    }


    function create()
    {
        return view('product.create');
    }


    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'price' => 'required',
            'availability' => 'required',
            'picture' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = $request->all();

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $imageName);

        unset($data['picture']);
        unset($data['_method']);
        unset($data['_token']);

        $data['picture'] = $imageName;
        Product::create($data);

        return redirect()->route('product.index');
    }
}
