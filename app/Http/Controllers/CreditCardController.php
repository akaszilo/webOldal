<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Http\Requests\StoreCreditCardRequest;
use App\Http\Requests\UpdateCreditCardRequest;
use App\Models\CreditCard;

class CreditCardController extends Controller
{
    public function index(): View
    {
        $creditCards = Auth::user()->creditCards;
        return view('credit_cards.index', compact('creditCards'));
    }

    public function create(): View
    {
        return view('credit_cards.create');
    }

    public function store(StoreCreditCardRequest $request): RedirectResponse
    {
        Auth::user()->creditCards()->create($request->validated());
        return redirect()->to(route('profile') . '#tab-cards')->with('success', 'Card saved successfully!');
    }
    
    public function edit(CreditCard $creditCard): View
    {
        $this->authorize('update', $creditCard);
        return view('credit_cards.edit', compact('creditCard'));
    }

    public function update(UpdateCreditCardRequest $request, CreditCard $creditCard): RedirectResponse
    {
        $this->authorize('update', $creditCard);
        $creditCard->update($request->validated());
        return redirect()->to(route('profile') . '#tab-cards')->with('success', 'Card updated sucessfully');
    }

    public function destroy(CreditCard $creditCard): RedirectResponse
    {
        $this->authorize('delete', $creditCard);
        $creditCard->delete();
        return redirect()->to(route('profile') . '#tab-cards')->with('success', 'Card deleted successfully!');
    }
}
