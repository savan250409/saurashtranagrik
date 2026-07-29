@extends('layouts.app')

@section('title', 'Activity | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Deposit, savings and loan activities offered by the Mandali.')

@php
    $activities = [
        ['Share Member', 'images/Activity/member.png'],
        ['Fixes Deposit', 'images/Activity/Fixes Deposit.png'],
        ['Special Fixed Deposit', 'images/Activity/Special Fixed Deposit.png'],
        ['Monthly Deposit', 'images/Activity/Monthly Deposit.png'],
        ['Reccuring Deposit', 'images/Activity/Reccuring Deposit.png'],
        ['Running Saving', 'images/Activity/Running Saving.png'],
        ['Daily Saving', 'images/Activity/Daily Saving.png'],
        ['Mortgage Loan', 'images/Activity/Mortgage Loan.png'],
        ['Gold Loan', 'images/Activity/Gold Loan.png'],
        ['Jat-Jamingiri Loan', 'images/Activity/Jat-Jamingiri Loan.png'],
        ['Mortgage CC', 'images/Activity/Mortgage CC.png'],
        ['Gold CC', 'images/Activity/Gold CC.png'],
        ['Plaz Loan', 'images/Activity/Plaz Loan.png'],
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
                @foreach ($activities as [$title, $image])
                    <article class="card card--hover tile">
                        <span class="tile-icon">
                            <img src="{{ asset($image) }}" alt="" loading="lazy" decoding="async">
                        </span>
                        <h3>{{ $title }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
