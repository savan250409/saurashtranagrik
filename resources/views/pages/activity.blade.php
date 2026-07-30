@extends('layouts.app')

@section('title', 'Activity | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Deposit, savings and loan activities offered by the Mandali.')

@php
    // Icons are simple single-colour pictograms (matching the homepage
    // "Sections and Information" cards) rather than full-colour illustrations,
    // so all 13 tiles read as one consistent set instead of a rainbow of
    // unrelated stock-icon colours.
    $activities = [
        ['Share Member', 'user'],
        ['Fixes Deposit', 'bank'],
        ['Special Fixed Deposit', 'star'],
        ['Monthly Deposit', 'calendar'],
        ['Reccuring Deposit', 'repeat'],
        ['Running Saving', 'coins'],
        ['Daily Saving', 'clipboard'],
        ['Mortgage Loan', 'building'],
        ['Gold Loan', 'coins'],
        ['Jat-Jamingiri Loan', 'file'],
        ['Mortgage CC', 'building'],
        ['Gold CC', 'coins'],
        ['Plaz Loan', 'shield'],
    ];
@endphp

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Activity</p>
            <h1>Activity</h1>
            <p>The deposit, savings and credit facilities we provide to members.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="grid grid--4 reveal-group">
                @foreach ($activities as [$title, $icon])
                    <article class="card card--hover tile">
                        <span class="tile-icon">
                            @include('partials.icon', ['name' => $icon])
                        </span>
                        <h3>{{ $title }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
