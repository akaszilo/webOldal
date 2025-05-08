<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Order;


class OrderController extends Controller
{
    public function destroy(Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'You can only delete order with pending');
        }
        $order->delete();
        return redirect()->route('profile', ['#tab-orders'])->with('success', 'Order deleted successfully!');
    }

    public function checkout(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }
        $cartItems = [];
        $total = 0;
        foreach ($cart as $item) {
            $cartItems[] = (object) $item;
            $total += $item['price'] * $item['quantity'];
        }
        return view('order.checkout', compact('cartItems', 'total'));
    }

    public function process_order(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'credit_card_id' => 'required|exists:credit_cards,id',
        ]);
        $addressId = $request->input('address_id');
        $creditCardId = $request->input('credit_card_id');
        session([
            'checkout_data' => [
                'address_id' => $addressId,
                'credit_card_id' => $creditCardId,
            ]
        ]);
        return view('order.cvv_verification');
    }

    public function show_cvv_form()
    {
        return view('order.cvv_verification');
    }

    public function place_order(Request $request)
    {
        $cart = session('cart', []);
        $selected = session('checkout_selected_products', []);
        $user = Auth::user();
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = 0;
        $order->status = 'pending';
        $order->save();
        $total = 0;
        foreach ($selected as $productId) {
            if (isset($cart[$productId])) {
                $item = $cart[$productId];
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
                $total += $item['price'] * $item['quantity'];
                unset($cart[$productId]);
            }
        }
        $order->total = $total;
        $order->save();
        session(['cart' => $cart]);
        session()->forget('checkout_selected_products');
        return redirect()->route('order.success')->with('success', 'Successfull order');
    }

    public function order_success()
    {
        return view('order.success');
    }

    public function process_checkout(Request $request)
    {
        $cart = session('cart', []);
        $selected = $request->input('selected_products', []);

        if (empty($selected)) {
            return redirect()->back()->with('error', 'You didn\'t choose any product!');
        }
        $order = new Order();
        $order->user_id = auth()->id();
        $order->total = 0;
        $order->status = 'pending';
        $order->save();

        $total = 0;
        foreach ($selected as $productId) {
            if (!isset($cart[$productId]))
                continue;
            $item = $cart[$productId];
            $order->items()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            $total += $item['price'] * $item['quantity'];
            unset($cart[$productId]);
        }
        $order->total = $total;
        $order->save();
        session(['cart' => $cart]);
        return redirect()->route('order.success')->with('success', 'Successfull order');
    }

    public function select_payment()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        $creditCards = $user->creditCards;
        return view('order.select_payment', compact('addresses', 'creditCards'));
    }
}
