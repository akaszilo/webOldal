<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Http\Requests\StoreCreditCardRequest;
use App\Http\Requests\UpdateCreditCardRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $creditCards = Auth::user()->creditCards;
        return view('credit_cards.index', compact('creditCards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('credit_cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditCardRequest $request): RedirectResponse
    {
        Auth::user()->creditCards()->create($request->validated());
        return redirect()->to(route('profile') . '#tab-cards')->with('success', 'Card saved successfully!');
    }
    
    
    
    /**

     * Show the form for editing the specified resource.
     */
    public function edit(CreditCard $creditCard): View
    {
        $this->authorize('update', $creditCard);
        return view('credit_cards.edit', compact('creditCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditCardRequest $request, CreditCard $creditCard): RedirectResponse
    {
        $this->authorize('update', $creditCard);
        $creditCard->update($request->validated());
        return redirect()->to(route('profile') . '#tab-cards')->with('success', 'Card updates sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditCard $creditCard): RedirectResponse
    {
        $this->authorize('delete', $creditCard);
        $creditCard->delete();
        return redirect()->to(route('profile') . '#tab-cards')->with('success', 'Card deleted successfully!');
    }
}
