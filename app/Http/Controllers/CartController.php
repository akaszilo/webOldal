<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function add($id)
     {
        
    if (!Auth::check()) {
        return redirect()->route('register');
    }
    else{
        $product = Product::findOrFail($id);
     
         $cart = session()->get('cart', []);
     
         if(isset($cart[$id])) {
             $cart[$id]['quantity']++;
         } else {
             $cart[$id] = [
                 "name" => $product->name,
                 "quantity" => 1,
                 "price" => $product->price,
                 "image" => $product->image
             ];
         }
     
         session()->put('cart', $cart);
     
         return redirect()->back()->with('success', 'Product added to cart!');
    }
         
     }

    public function index()
    {
        //
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
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
