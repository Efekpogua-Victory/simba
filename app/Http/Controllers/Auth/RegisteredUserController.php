<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usd_balance' => 1000,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Save initial Transaction record
        $newtran = new Transaction();
        $newtran->user_id = $user->id;
        $newtran->transation_id = rand(123123,787926);
        $newtran->description = 'Initial Transaction';
        $newtran->value = 1000;
        $newtran->quote_currency = 'USD';
        $newtran->status = 'success';
        $newtran->save();
        
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
