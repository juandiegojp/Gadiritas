<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->is_admin) {
            return redirect('/dashboard');
        } elseif (Auth::user()->is_guia) {
            return redirect('/indexGuia');
        }
        return redirect('/index');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // Eliminar la cookie
        Cookie::queue(Cookie::forget('Gadiritas'));
        Cookie::queue(Cookie::forget('actividad'));
        Cookie::queue(Cookie::forget('actividadID'));

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
