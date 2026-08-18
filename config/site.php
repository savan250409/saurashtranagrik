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

    /*
    |--------------------------------------------------------------------------
    | Branch advisory boards
    |--------------------------------------------------------------------------
    |
    | Shared by the Board of Directors page (all branches, tabbed) and each
    | branch's own detail page (its group only, matched on 'branch'). Static
    | content carried over from the original site - not yet admin-editable,
    | unlike the branch/manager/rate records these pages also draw from.
    |
    */

    'board_groups' => [
        ['branch' => 'Bagasara', 'heading' => 'Ad. Board Member ( Bagasara Branch )', 'members' => [
            ['Shri Himmarbhai Khetani', 'Board Member'],
            ['Shri Piyushbhai Bharakhada', 'Board Member'],
            ['Shri Keyurbhai Dholariya', 'Board Member'],
            ['Shri Ketanbhai Dixit', 'Board Member'],
            ['Shri Jentibhai Makvana', 'Board Member'],
            ['Shri Dr. Sanjaybhai Sorathiya', 'Board Member'],
            ['Shri Dineshbhai Kateshiya', 'Board Member'],
        ]],
        ['branch' => 'Kunkavav', 'heading' => 'Ad. Board Member ( Kunkavav Branch )', 'members' => [
            ['Shri Bharatbhai Dhirubhai Kanani', 'Branch MD'],
            ['Shri Babubhai Kotadiya', 'Board Member'],
            ['Shri Viththalbhai Korat', 'Board Member'],
            ['Shri Dr. Hiteshbhai Bodar', 'Board Member'],
            ['Shri Priteshbhai Dobariya', 'Board Member'],
            ['Shri Parshotambhai Rakholiya', 'Board Member'],
            ['Shri Ritaben Bhuva', 'Board Member'],
        ]],
        ['branch' => 'Bhesan', 'heading' => 'Ad. Board Member ( Bhesan Branch )', 'members' => [
            ['Shri Jaysukhbhai Gondaliya', 'Branch MD'],
            ['Shri Bhaveshbhai Trapasiya', 'Board Member'],
            ['Shri Prakashbhai Savaliya', 'Board Member'],
            ['Shri Ramjibhai Dobariya', 'Board Member'],
            ['Shri Sonalben Sojitra', 'Board Member'],
            ['Shri Pradipbhai Kanpariya', 'Board Member'],
            ['Shri Bharatbhai Sarkhareliya', 'Board Member'],
        ]],
        ['branch' => 'Amreli', 'heading' => 'Ad. Board Member ( Amreli Branch )', 'members' => [
            ['Shri Divyeshbhai M. Vekariya', 'Branch MD'],
            ['Shri Sanjaybhai Malaviya', 'Board Member'],
            ['Shri Jaysukhbhai Sorathiya', 'Board Member'],
            ['Shri Dipakbhai Dhanani', 'Board Member'],
            ['Shri Mukeshbhai Korat', 'Board Member'],
            ['Shri Arunbhai Der', 'Board Member'],
            ['Shri Hiteshbhai Khanesha', 'Board Member'],
            ['Shri Dharmeshbhai Visavaliya', 'Board Member'],
        ]],
        ['branch' => 'Visavadar', 'heading' => 'Ad. Board Member ( Visavadar Branch )', 'members' => [
            ['Shri Prakashbhai Savaliya', 'Branch MD'],
            ['Shri Hasubhai Rabadiya', 'Board Member'],
            ['Shri Mohitbhai Malaviya', 'Board Member'],
            ['Shri Rinaben Bhaliya', 'Board Member'],
            ['Shri Chimanbhai Rafaliya', 'Board Member'],
            ['Shri Hirenbhai Sojitra', 'Board Member'],
            ['Shri Manishaben Lakhani', 'Board Member'],
        ]],
        ['branch' => 'Bhalgam', 'heading' => 'Ad. Board Member ( Bhalgam Branch )', 'members' => [
            ['Shri Dipakbhai Ambaliya', 'Branch MD'],
            ['Shri Nitinbhai Kotadiya', 'Board Member'],
            ['Shri Bhupatbhai Lokadiya', 'Board Member'],
            ['Shri Manishbhai Pansuriya', 'Board Member'],
            ['Shri Jyotsanaben Godhani', 'Board Member'],
            ['Shri Dayaben Vaghasiya', 'Board Member'],
        ]],
        ['branch' => 'Chuda', 'heading' => 'Ad. Board Member ( Chuda Branch )', 'members' => [
            ['Shri Arunaben Barariya', 'Branch MD'],
            ['Shri Jaysukhbhai Vaghasiya', 'Board Member'],
            ['Shri Sonalben Gajipara', 'Board Member'],
            ['Shri Sangitaben Dobariya', 'Board Member'],
            ['Shri Bharatbhai Korat', 'Board Member'],
            ['Shri Ghanshyambhai Patoliya', 'Board Member'],
            ['Shri Dalsukhbhai Ansodariya', 'Board Member'],
            ['Shri Kishanbhai Kathiriya', 'Board Member'],
            ['Shri Gordhanbhai Bhut', 'Board Member'],
        ]],
        ['branch' => 'Dhari', 'heading' => 'Ad. Board Member ( Dhari Branch )', 'members' => [
            ['Shri Pravinbhai Kasvala', 'Branch MD'],
            ['Shri Vinubhai Katharotiya', 'Board Member'],
            ['Shri Bhavsukhbhai Vaghela', 'Board Member'],
            ['Shri Sureshbhai Antala', 'Board Member'],
            ['Shri Hemalbhai Jaysval', 'Board Member'],
            ['Shri Mansukhbhai Vastani', 'Board Member'],
            ['Shri Anitaben Shiroya', 'Board Member'],
        ]],
        ['branch' => 'Ahmedabad', 'heading' => 'Ad. Board Member ( Ahmedabad Branch )', 'members' => [
            ['Shri Sajanbhai Pethani', 'Board Member'],
            ['Shri Vipulbhai Sangani', 'Board Member'],
            ['Shri Manojbhai Savaliya', 'Board Member'],
            ['Shri Jigneshbhai Savaliya', 'Board Member'],
            ['Shri Prakashbhai Gevariya', 'Board Member'],
            ['Shri Bhaveshbhai Tanti', 'Board Member'],
            ['Shri Sagarbhai Hirpara', 'Board Member'],
        ]],
    ],

    'contact' => [
        'email' => 'snssml005@gmail.com',
        'phone' => '+91-9327201086',
        'social' => [
            'instagram' => 'https://www.instagram.com/saurashtra_mandali_bagasara/',
            'facebook' => 'https://www.facebook.com/SaurashtraNagarikSharafiSahkariMandali',
        ],
    ],

];
