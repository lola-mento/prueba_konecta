<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellRequest;
use App\Models\Product;
use App\Models\Sell;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class SellController extends Controller
{

    //! MUESTRA UNA VISTA PARA RECOLECTAR LOS DATOS DE UN NUEVO PRODUCTO
    public function create()
    {
        $products = Product::pluck('name','id');
        return view('sells.create',compact('products'));
    }
    //! GUARDA EN BASE DE DATOS EL PRODUCTO
    public function store(SellRequest $request)
    {
        if($this->validate_stocks($request))
        {
            try
            {
                Sell::create($request->all());
                $this->seller($request);
                Alert::toast('venta creada de manera correcta','success');
                return redirect()->route('sells.create');
            }
            catch(Exception $e)
            {
                return "Ha ocurrido un error. Codigo: ".$e;
            }
        }
        else
        {
            Alert::error('Ocurre un error', 'No hay existencias suficientes para esta venta');
            return redirect()->route('sells.create');
        }

    }
    public function validate_stocks($request)
    {
        $product = Product::find($request->product_id);
        if($request->quantity <= $product->stock)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public function seller($request)
    {
        $product = Product::find($request->product_id);
        $product->stock = ($product->stock - $request->quantity);
        $product->save();
    }
}
