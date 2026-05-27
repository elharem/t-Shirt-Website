<?php

namespace App\Http\Controllers;

use App\Models\CookieConsent;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    /**
     * Enregistre le choix de l'utilisateur (accepter ou refuser).
     * Stocke un cookie côté navigateur + log en BDD pour audit RGPD.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'choice' => 'required|in:accepted,rejected',
        ]);

        // Log RGPD : preuve du consentement
        CookieConsent::create([
            'user_id' => auth()->id(),
            'session_id' => session()->getId(),
            'choice' => $data['choice'],
            'ip_address' => $request->ip(),
            'user_agent' => substr($request->userAgent() ?? '', 0, 255),
        ]);

        // Cookie de 13 mois (recommandation CNIL/RGPD)
        $minutes = 60 * 24 * 30 * 13;

        return back()->withCookie(cookie('cookie_consent', $data['choice'], $minutes));
    }

    /**
     * Réinitialise le consentement (réaffiche la bannière)
     */
    public function reset()
    {
        return back()->withCookie(cookie()->forget('cookie_consent'));
    }

    /**
     * Page d'information sur l'utilisation des cookies (obligation légale)
     */
    public function show()
    {
        return view('cookies.policy');
    }
}
