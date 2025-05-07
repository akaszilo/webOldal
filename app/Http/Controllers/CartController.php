<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Models\Order;
use App\Models\CreditCard;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        } else {
            $product = Product::findOrFail($id);
            $cart = session()->get('cart', []);
            $quantity = max(1, (int) $request->input('quantity', 1)); // Mindig legalább 1

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
            } else {
                $cart[$id] = [
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "image" => $product->image_link,
                    'session_id' => session()->getId()
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart!');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function create()
    {
        //
    }

    public function store(StoreCartRequest $request)
    {
        //
    }

    public function show(Cart $cart)
    {
        //
    }

    public function edit(Cart $cart)
    {
        //
    }

    public function orderSuccess()
    {
        return view('order.success');
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $cart = session('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }
        return redirect()->route('user.cart')->with('success', 'Termék mennyisége sikeresen frissítve!');
    }
    
    public function showUserCart()
    {
        $cart = session('cart', []);
        return view('user_pages.cart', compact('cart'));
    }
    
    public function destroy(Request $request, $productId)
    {
        $cart = session('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }
        return redirect()->route('user.cart')->with('success', 'Termék sikeresen törölve a kosárból!');
    }

    public function processOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'A kosár üres.');
        }
        $user = Auth::user();
        $cartItems = [];
        $total = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if (!$product)
                continue;
            $quantity = $item['quantity'];
            $price = $product->price;
            $cartItems[] = (object) [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'quantity' => $quantity,
            ];
            $total += $price * $quantity;
        }
        return view('order.checkout', compact('cartItems', 'total'));
    }

    public function confirmOrder(Request $request)
    {
        $request->validate([
            'cvv' => 'required|string|size:3',
        ]);
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'A kosár üres.');
        }
        $user = Auth::user();
        $creditCardId = session('checkout_data.credit_card_id') ?? null;
        if (!$creditCardId) {
            return redirect()->route('cart.index')->with('error', 'Hiányzó fizetési adatok.');
        }
        $creditCard = CreditCard::find($creditCardId);
        if (!$creditCard || $creditCard->cvv !== $request->input('cvv')) {
            return redirect()->route('order.confirm_order')->with('error', 'Hibás CVV kód.');
        }
        
        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if (!$product)
                continue;
            $quantity = $item['quantity'];
            $price = $product->price;
            $totalPrice += $price * $quantity;
        }
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = $totalPrice;
        $order->status = 'pending';
        $order->save();
        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if (!$product)
                continue;
            $quantity = $item['quantity'];
            $price = $product->price;
            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
            ]);
            $totalPrice += $price * $quantity;
        }
        $order->total = $totalPrice;
        $order->save();
        session()->forget('cart');
        session()->forget('checkout_data');
        return redirect()->route('order.success')->with('success', 'Sikeres rendelés!');
    }

    public function placeOrder(Request $request)
{
    $cart = session('cart', []);
    $selectedProductIds = $request->input('selected_products', []);
    if (empty($selectedProductIds)) {
        return redirect()->back()->with('error', 'Nem választottál terméket a rendeléshez.');
    }
    $user = Auth::user();
    $order = new Order();
    $order->user_id = $user->id;
    $order->total = 0;
    $order->status = 'pending';
    $order->save();

    $totalPrice = 0;
    foreach ($selectedProductIds as $productId) {
        if (!isset($cart[$productId])) {
            continue;
        }
        $item = $cart[$productId];
        $order->items()->create([
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
        $totalPrice += $item['price'] * $item['quantity'];
        unset($cart[$productId]); // csak a megrendelt törlődik!
    }
    $order->total = $totalPrice;
    $order->save();

    session(['cart' => $cart]); // a többi bent marad!
    return redirect()->route('order.success')->with('success', 'Sikeres rendelés!');
}



}
