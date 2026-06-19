<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Shift;

class CheckShiftMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if (Auth::check() && Auth::user()->role === 'kasir') {
            
            $activeShift = Shift::where('user_id', Auth::id())
                ->where('status', 'open')
                ->first();
            
            if (!$activeShift) {
                return redirect('/kasir/shift/open')
                    ->with('error', 'Silakan buka shift terlebih dahulu!');
            }
        }
        return $next($request);
    }
}
