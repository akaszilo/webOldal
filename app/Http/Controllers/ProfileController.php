<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $status = $request->query('orders', 'all');
        $ordersQuery = $user->orders()->latest();
        if ($status !== 'all') {
            $ordersQuery->where('status', $status);
        }
        $orders = $ordersQuery->get();
        $creditCards = $user->creditCards;
        $addresses = $user->addresses;
        $cart = session('cart', []);
        $total = 0;
        foreach ($cart as $product) {
            $total += $product['price'] * $product['quantity'];
        }
        return view('user_pages.profile', compact(
            'user',
            'orders',
            'creditCards',
            'addresses',
            'cart',
            'total',
            'status' 
        ));
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('profile', ['#tab-profile'])->with('success', 'Profile updated successfully!');
    }

    public function show_order_details(Order $order)
    {
        $order->load('items.product');
        return view('user_pages.order_details', compact('order'));
    }
}
