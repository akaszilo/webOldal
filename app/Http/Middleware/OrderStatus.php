<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('orders')) {
            $status = $request->input('orders');
            $validStatuses = ['all', 'pending', 'shipped', 'delivered'];
            if (!in_array($status, $validStatuses)) {
                return redirect()->route('profile');
            }
        }
        return $next($request);
    }
}
