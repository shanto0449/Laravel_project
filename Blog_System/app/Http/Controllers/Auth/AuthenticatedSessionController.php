<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::check() && Auth::user()->role->id==1){
            return redirect('admin/dashboard');
        }elseif(Auth::check() && Auth::user()->role->id == 2){
            return redirect('author/dashboard');
        }
        $redirectUrl = match ($request) {
                    1 => 'admin/dashboard',
                   2 => 'author/dashboard',
                   default => route('dashboard', absolute: false),
                };


        return redirect($request);
        // ->intended(route('dashboard', absolute: false));
    }

//     public function store(LoginRequest $request): RedirectResponse
// {
//     $request->authenticate();

//     $request->session()->regenerate();

//     $roleId = Auth::user()->role->id;

//     $redirectUrl = match ($roleId) {
//         1 => 'admin/dashboard',
//         2 => 'author/dashboard',
//         default => route('dashboard', absolute: false),
//     };

//     return redirect($redirectUrl);
// }


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
