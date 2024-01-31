<?php

namespace App\Http\Controllers\Auth;

use App\Models\Access;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    public readonly Access $access;

    public function __construct()
    {
        $this->access = new Access();
    }
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $access = Access::all();

        return view('auth.login', compact('access'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        if ($user->is_admin == 1) {
            return redirect('/200ceb26807d6bf99fd6f4f0d1ca54d4');  
        } else {
            return redirect('/dashboard');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
