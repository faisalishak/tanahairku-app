<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StoreController extends Controller
{
    public function show() {
      $products = Product::orderBy('id_product', 'desc')->get();

      return view('store', ['products' => $products]);
    }
}
