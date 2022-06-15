<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //! OBTIENE TODA LA INFORMACIÓN DE LA BASE DE DATOS
    public function index()
    {
        try
        {
            $products = Product::all();

            return view('products.index', compact('products'));
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
    //! MUESTRA UNA VISTA PARA RECOLECTAR LOS DATOS DE UN NUEVO PRODUCTO
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('products.create',compact('categories'));
    }
    //! GUARDA EN BASE DE DATOS EL PRODUCTO
    public function store(ProductRequest $request)
    {
        try
        {
            Product::create($request->all());
            Alert::toast('Producto creado de manera correcta','success');
            return redirect()->route('products.index');
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
    //!MUESTRA UNA VISTA PARA ACTUALIZAR PRODUCTO
    public function edit(Product $product)
    {
        $categories = Category::pluck('name','id');
        return view('products.edit',compact('product','categories'));
    }
    //!ACTUALIZA PRODUCTO EN BASE DE DATOS
    public function update(Product $product, ProductRequest $request)
    {
        try
        {
            $product->update($request->all());
            Alert::toast('Producto actualizado correctamente','success');
            return redirect()->route('products.index');
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
    //!ELIMINA PRODUCTO DE LA BASE DE DATOS
    public function destroy(Product $product)
    {
        try
        {
            $product->delete();
            Alert::toast('Producto eliminado correctamente','success');
            return redirect()->route('products.index')->with('eliminar','ok');
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
}
