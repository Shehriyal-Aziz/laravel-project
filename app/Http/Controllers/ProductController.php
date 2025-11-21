<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function menuProductPage()
    {
        $products = Product::all();
        return view('menu', compact('products'));
    }
    public function menuProductAdd()
    {
        $products = Product::all();
        return view('admin.menu_product', compact('products'));
    }
 

}


