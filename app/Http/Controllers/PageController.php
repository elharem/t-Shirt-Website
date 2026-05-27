<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function show(string $page)
    {
        // Liste blanche des pages autorisées (sécurité)
        $allowed = [
            'livraison',
            'paiement',
            'retours',
            'rse',
            'contact',
            'faq',
            'guide-tailles',
            'about',
            'cgv',
            'mentions-legales',
            'confidentialite',
        ];

        abort_unless(in_array($page, $allowed), 404);

        return view("pages.{$page}");
    }
}