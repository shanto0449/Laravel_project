<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
{
    // Sanitize email and ensure lowercase
    $request->merge(['email' => strtolower($request->email)]);

    // Validate the request
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255', 'unique:users,username'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
    ]);


    // Sanitize username if needed
    $username = is_array($request->username) ? implode('', $request->username) : $request->username;

    // Create the user
    $user = User::create([
        'role_id' => 2,
        'name' => $request->name,
        'username' => $username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);



    // Trigger the Registered event and log the user in
    event(new Registered($user));

    Auth::login($user);

    return redirect()->intended(route('author.dashboard', absolute: false));
    Toastr::success('Author Successfully Registere','Success');

}

}
