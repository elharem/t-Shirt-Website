<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'postal_code' => 'required|string|max:20',
        'city' => 'required|string|max:100',
        'email' => 'required|email|max:255|unique:users',
        'password' => ['required', 'confirmed', Password::defaults()],
    ], [
        // Messages d'erreur personnalisés
        'email.unique' => 'Cet email est déjà utilisé. As-tu déjà un compte ?',
        'password.confirmed' => 'Les deux mots de passe ne correspondent pas.',
    ]);

    // Sauvegarde session id avant login pour fusionner le panier
    session(['merge_cart_pending' => session()->getId()]);

    $user = User::create([
        'first_name' => $data['first_name'],
        'name' => $data['name'],
        'address' => $data['address'],
        'postal_code' => $data['postal_code'],
        'city' => $data['city'],
        'country' => 'Belgique',
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => 'customer',
    ]);

    event(new Registered($user));
    Auth::login($user);

    return redirect()->route('home')
        ->with('success', 'Bienvenue ' . $user->first_name . ' ! Ton compte a bien été créé.');
}
}
