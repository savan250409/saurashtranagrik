<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    |
    | route name => label. Used by both the desktop nav and the mobile drawer,
    | so the two can never drift apart.
    |
    */

    'nav' => [
        'home' => 'Home',
        'bord-of-directors' => 'Board',
        'branches' => 'Branches',
        'loan' => 'Loans',
        'deposit' => 'Deposit',
        'manager' => 'Managers',
        'downloads' => 'Downloads',
        'contact-us' => 'Contact Us',
    ],

    'footer' => [
        'links' => [
            'home' => 'Home',
            'bord-of-directors' => 'Board of Directors',
            'branches' => 'Branches',
            'loan' => 'Loans',
            'deposit' => 'Deposit',
            'manager' => 'Managers',
        ],
        'explore' => [
            'activity' => 'Activities',
            'progress-report' => 'Progress Report',
            'paku-sarvaiyu' => 'Balance Sheet',
            'profit-loss' => 'Profit & Loss',
            'event' => 'Events',
            'downloads' => 'Downloads',
        ],
        'legal' => [
            'statement' => "Chairman's Statement",
            'privacy-policy' => 'Privacy Policy',
            'terms-and-conditions' => 'Terms and Conditions',
        ],
    ],

    'contact' => [
        'email' => 'snssml005@gmail.com',
        'phone' => '+91-9327201086',
        'social' => [
            'instagram' => 'https://www.instagram.com/saurashtra_mandali_bagasara/',
            'facebook' => 'https://www.facebook.com/SaurashtraNagarikSharafiSahkariMandali',
        ],
        // Where the "Contact Us" form is delivered. Set to a test inbox for
        // now per request - point CONTACT_FORM_RECIPIENT at the real mandali
        // address (site.contact.email above) once testing is done.
        'form_recipient' => env('CONTACT_FORM_RECIPIENT', 'savan@ngendevtech.com'),
    ],

];
