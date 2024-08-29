<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ListController extends Controller
{
    public function listView()
    {
        $products = Product::Paginate(6);

        return view('list', compact('products'));
    }
}
