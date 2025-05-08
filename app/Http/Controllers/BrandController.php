<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand, Request $request)
    {
        $sort = $request->query('sort', 'newest');
        $products = Product::where('brand_id', $brand->id);
        $products = $this->applySort($products, $sort)->get();

        return view('brand.show', compact('brand', 'products', 'sort'));
    }

    // Ugyanaz az applySort, mint a többi controllerben:
    private function applySort($query, $sort)
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
