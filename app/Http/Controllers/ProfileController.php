<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $ordersQuery = $user->orders()->latest();
        if ($request->has('orders')) {
            $status = $request->input('orders');
            if ($status !== 'all') {
                $ordersQuery->where('status', $status);
            }
        }
        $orders = $ordersQuery->get();
        $creditCards = $user->creditCards;
        $addresses = $user->addresses;
        $cart = session('cart', []);

        $total = 0;
        foreach ($cart as $product) {
            $total += $product['price'] * $product['quantity'];
        }

        return view('user_pages.profile', compact('user', 'orders', 'creditCards', 'addresses', 'cart', 'total'));
    }

    public function updateProfile(Request $request)
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

        return redirect()->route('profile', ['#tab-profile'])->with('success', 'Profil frissítve!');
    }

    public function showOrderDetails(Order $order)
    {
        // Eager load the items relationship to prevent N+1 queries
        $order->load('items.product');

        return view('user_pages.order_details', compact('order'));
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
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
