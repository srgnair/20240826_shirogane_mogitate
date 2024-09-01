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

        $oldImage = $product->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;

            $destinationPath = storage_path('app/public/images');
            $image->move($destinationPath, $filename);

            if ($oldImage) {
                $oldImagePath = storage_path('app/public/images/' . $oldImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $productData['image'] = $filename;
        }

        $product->update($productData);

        $product->seasons()->sync($seasonIds);

        return redirect()->route('listView', compact('productId'));
    }

    public function delete(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        return redirect()->route('listView');
    }
}
