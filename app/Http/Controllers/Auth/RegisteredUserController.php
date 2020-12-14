<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'string|nullable',
            'gender' => 'required',
            'doctor' => 'required|boolean',
            'type' => 'required',
            'titles' => 'string|nullable',
            'cedulas' => 'string|nullable',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'full_name' => $request->name.' '.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'titles' => $request->titles,
            'cedulas' => $request->cedulas,
            'doctor' => $request->doctor,
            'type' => $request->type,
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}