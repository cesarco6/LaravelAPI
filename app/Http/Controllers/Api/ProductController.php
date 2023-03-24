<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

// Con base en el modelo Product se realizan las consultas y actualizaciones



class ProductController extends Controller
{
    
    public function index()
    {
        $productos = Product::all();
        return $productos;
    }

    
    public function store(Request $request)
    {
        $producto = new Product();
        $producto->descrip = $request->descrip;
        $producto->stock = $request->stock;
        $producto->avail = $request->avail;
        $producto->price = $request->price;

        $producto->save();
        return $producto;
    }

    
    public function show($id)
    {
        $producto = Product::find($id);
        if($producto)
        return $producto;
    }

    
    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $producto->descrip = $request->descrip;
        $producto->stock = $request->stock;
        $producto->avail = $request->avail;
        $producto->price = $request->price;

        $producto->save();
        return $producto;
    }

    
    public function destroy($id)
    {
        $producto = Product::destroy($id);
        return $producto;
    }
}
