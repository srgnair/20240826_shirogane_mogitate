<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ListController extends Controller
{
    public function listView(Request $request)
    {
        $products = Product::paginate(6);

        return view('list', compact('products'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort_by = $request->input('sort_by', 'id');

        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        if ($sort_by == 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($sort_by == 'low') {
            $query->orderBy('price', 'asc');
        } else {
            $query->orderBy('id', 'asc');
        }

        $products = $query->paginate(6);

        return view('list', compact('products'));
    }

    public function resetKeyword(Request $request)
    {
        $query = $request->query();

        unset($query['keyword']);

        return redirect()->route('search', $query);
    }

    public function resetSort(Request $request)
    {
        $query = $request->query();

        unset($query['sort_by']);

        return redirect()->route('search', $query);
    }
}
