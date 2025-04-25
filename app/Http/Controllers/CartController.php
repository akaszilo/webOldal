<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

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
            $cart[$id] = [ // $id is the product's ID
                "id" => $product->id, 
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_link,
                'session_id' => session()->getId()
            ];
         }
     
         session()->put('cart', $cart);
     
         return redirect()->back()->with('success', 'Product added to cart!');
    }
         
     }

     public function remove($id)
    {
        $cart = session()->get('cart', []);

        // Ha létezik az elem, töröljük
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        // Átadjuk a cart változót a nézetnek
        return view('cart.index', compact('cart'));
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
    public function orderSuccess()
    {
        return view('cart.order-success');
    }
    
    
    public function checkout()
{
    // Kosár elemek lekérése session ID alapján
    $cartItems = Cart::where('session_id', session()->getId())->get();

    // Kosár végösszeg kiszámítása
    $total = $cartItems->sum(function ($item) {
        return $item->quantity * $item->price;
    });

    return view('checkout', [
        'cartItems' => $cartItems,
        'total' => $total,
    ]);
}

    public function update(UpdateCartRequest $request, Cart $cart, $id)
    {
       
        $cart = session()->get('cart', []);

        

        if(isset($cart[$id])) {
            $quantity = $request->input('quantity');
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated!');
        }

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
