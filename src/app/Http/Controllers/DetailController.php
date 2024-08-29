<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DetailController extends Controller
{
    public function detailView($productId)
    {
        $product = Product::find($productId);

        return view('detail', compact('product'));
    }
}
