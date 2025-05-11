<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;

class BrandController extends Controller
{
    public function show(Brand $brand, Request $request)
    {
        $sort = $request->query('sort', 'newest');
        $products = Product::where('brand_id', $brand->id);
        $products = $this->apply_sort($products, $sort)->get();
        return view('brand.show', compact('brand', 'products', 'sort'));
    }

    private function apply_sort($query, $sort)
    {
        if ($sort == 'oldest') {
            return $query->orderBy('created_at', 'asc');
        } elseif ($sort == 'newest') {
            return $query->orderBy('created_at', 'desc');
        } elseif ($sort == 'cheapest') {
            return $query->orderBy('price', 'asc');
        } elseif ($sort == 'most_expensive') {
            return $query->orderBy('price', 'desc');
        } elseif ($sort == 'popular') {
            return $query->orderBy('sold_quantity', 'desc');
        } elseif ($sort == 'abc') {
            return $query->orderBy('name', 'asc');
        }
        return $query;
    }
}
