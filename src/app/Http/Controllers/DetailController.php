<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\DetailRequest;

class DetailController extends Controller
{
    public function detailView($productId)
    {
        $product = Product::find($productId);
        $seasons = Season::all();

        return view('detail', compact('product', 'seasons'));
    }

    public function update($productId, DetailRequest $request)
    {
        $productData = $request->except('_token');
        $seasonIds = $request->input('season_ids', []);

        $product = Product::findOrFail($productId);
        $product->update($productData);
        $product->seasons()->sync($seasonIds);

        return redirect()->route('detailView', compact('productId'));
    }

    public function delete(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        return redirect()->route('listView');
    }
}
