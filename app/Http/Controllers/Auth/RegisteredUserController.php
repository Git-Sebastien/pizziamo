<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Http\Traits\Utilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    use Utilities;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'identifiant' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $generate_hash = $this->generateHash();

        $user = User::create([
            'identifiant' => $request->identifiant,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'personal_token' => Hash::make($generate_hash)
        ]);


        Mail::to($request->email)->send(new Contact($generate_hash));

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('register', 'Vous venez de recevoir un mail a l\'adresse suivante ' . $request->email . ' avec votre clé secréte');
    }
}