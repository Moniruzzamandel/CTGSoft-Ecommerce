<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('front.index', ['products' => Product::paginate(6)]);
    }

    public function singleProduct($id)
    {
        return view('front.single', ['product' => Product::find($id)]);
    }
}
