<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function registerView()
    {
        $seasons = Season::all();

        return view('register', compact('seasons'));
    }

    public function register(registerRequest $request)
    {
        // $productData = [
        //     'name' => $request->input('name'),
        //     'price' => $request->input('price'),
        //     'description' => $request->input('description'),
        // ];

        // $image = $request->file('image');
        // $extension = $image->getClientOriginalExtension();
        // $filename = uniqid() . '.' . $extension;
        // $path = Storage::putFileAs('public/images/', $image, $filename);

        // dd($path);

        // $productData['image'] = 'public/images/' . $filename;

        // $newProduct = Product::create($productData);

        // $newProduct->seasons()->attach($request->input('season_ids'));

        // return redirect()->route('registerView');

        $productData = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ];

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = uniqid() . '.' . $extension;

        // 直接public/imagesディレクトリに保存
        $destinationPath = public_path('images');
        $image->move($destinationPath, $filename);

        $productData['image'] = 'images/' . $filename;

        $newProduct = Product::create($productData);

        $newProduct->seasons()->attach($request->input('season_ids'));

        return redirect()->route('registerView');
    }
}
