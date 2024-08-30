<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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

    public function register(RegisterRequest $request)
    {
        $productData = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ];

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = uniqid() . '.' . $extension;

        $destinationPath = storage_path('app/public/images');
        $image->move($destinationPath, $filename);

        $productData['image'] = $filename;

        $newProduct = Product::create($productData);

        $newProduct->seasons()->attach($request->input('season_ids'));

        return redirect()->route('registerView');
    }
}
