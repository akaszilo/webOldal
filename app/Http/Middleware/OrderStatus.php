<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('orders')) {
            $status = $request->input('orders');

            // Check if the provided status is valid
            $validStatuses = ['all', 'pending', 'shipped', 'delivered'];
            if (!in_array($status, $validStatuses)) {
                // Redirect back to the profile without the invalid status
                return redirect()->route('profile');
            }
        }
        return $next($request);
    }
}
