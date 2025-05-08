<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\CreditCard;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('cart.index', compact('cart'));
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
        return redirect()->back()->with('success', 'Product quantity updated successfully!');
    }

    public function destroy(Request $request, $productId)
    {
        $cart = session('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }
        return redirect()->route('user.cart')->with('success', 'Product deleted successfully from the cart!');
    }

    public function process_order(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'The cart is empty!');
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

    public function confirm_order(Request $request)
    {
        $request->validate([
            'cvv' => 'required|string|size:3',
        ]);
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'The cart is empty!');
        }
        $user = Auth::user();
        $creditCardId = session('checkout_data.credit_card_id') ?? null;
        if (!$creditCardId) {
            return redirect()->route('cart.index')->with('error', 'Missing paying datas!');
        }
        $creditCard = CreditCard::find($creditCardId);
        if (!$creditCard || $creditCard->cvv !== $request->input('cvv')) {
            return redirect()->route('order.confirm_order')->with('error', 'Wrong cvv code');
        }
        $totalPrice = 0;
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = 0;
        $order->status = 'pending';
        $order->save();
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if (!$product)
                continue;
            $product->instock = max(0, $product->instock - $item['quantity']);
            $product->sold_quantity += $item['quantity'];
            $product->save();

            $order->items()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $order->total = $totalPrice;
        $order->save();
        session()->forget('cart');
        session()->forget('checkout_data');
        return redirect()->route('order.success')->with('success', 'Successful order!');
    }
    public function add(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        } else {
            $product = Product::findOrFail($id);
            $cart = session()->get('cart', []);
            $quantity = max(1, (int) $request->input('quantity', 1)); 
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

    public function place_order(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'The cart is empty!');
        }
        $user = Auth::user();
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = 0;
        $order->status = 'pending';
        $order->save();
        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if ($product) {
                $product->instock = max(0, $product->instock - $item['quantity']);
                $product->sold_quantity += $item['quantity'];
                $product->save();
            }
            $order->items()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $order->total = $totalPrice;
        $order->save();
        session()->forget('cart');
        return redirect()->route('order.success')->with('success', 'Successful order!');
    }

    public function show_user_cart()
    {
        $cart = session('cart', []);
        return view('user_pages.cart', compact('cart'));
    }

    public function order_success()
    {
        return view('order.success');
    }
}
