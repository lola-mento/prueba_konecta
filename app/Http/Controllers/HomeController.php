<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sell;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //! OBTENER EL PRODUCTO CON MAYOR STOCK
        $higerQuantity = 0;
        $ProdhigerQuantity = '';
        $products = Product::all();
        foreach($products as $product)
        {
            if($product->stock > $higerQuantity)
            {
                $higerQuantity = $product->stock;
                $ProdhigerQuantity = $product->name;
            }
        }

        //! OBTENER EL PRODUCTO MAS VENDIDO
        $sells = Sell::all();
        $count = 0;
        $most_seller = '';

        foreach ($sells as $sell)
        {
            if($sell->product_id === $sell->product_id)
            {
                $count = $count+1;
                $most_seller_id = $sell->product_id;
            }
        }
        $result = Product::find($most_seller_id);
        $most_seller = $result->name;

        return view('index', compact('higerQuantity','ProdhigerQuantity','most_seller'));
    }
}
