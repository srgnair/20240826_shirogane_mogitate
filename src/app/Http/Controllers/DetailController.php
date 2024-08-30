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

        // 古い画像のパスを取得
        $oldImage = $product->image;

        // 新しい画像の処理
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;

            // 新しい画像を保存
            $destinationPath = storage_path('app/public/images');
            $image->move($destinationPath, $filename);

            // 古い画像の削除
            if ($oldImage) {
                $oldImagePath = storage_path('app/public/images/' . $oldImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $productData['image'] = $filename;
        }

        // 商品データを更新
        $product->update($productData);

        // 季節の関連付けを更新
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
