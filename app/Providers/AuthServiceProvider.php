<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\CreditCard;
use App\Policies\CreditCardPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        CreditCard::class => CreditCardPolicy::class,
    ];


    public function boot(): void
    {
        $this->registerPolicies();
    }
}
