<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Lūdzu, piesakieties.');
        }

        if (auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Jums nav administrācijas tiesību.');
        }

        return $next($request);
    }
}