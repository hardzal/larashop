<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;


class ProductController extends Controller
{
    //

    public function index() {

    }

    public function show($id) {

    }

    public function showAll() {
        $result = Product::all();
        return view('product.display', ["products" => $result]);
    }

    public function saveNew(Request $request) {

    }

    public function list() {
        
    }
}
