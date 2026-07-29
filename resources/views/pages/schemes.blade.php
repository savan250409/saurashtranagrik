@extends('layouts.app')

@section('title', 'Schemes | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Savings, insurance and pension schemes offered to members of the Mandali.')

@php
    $schemes = [
        ['Sri Swami Vivekananda Sabhasad Insurance Scheme', 'images/scheme/Sri Swami Vivekananda Sabhasad Insurance Scheme.png', [
            'In this insurance plan, the Sabhasad only one time can join the scheme by paying a premium of Rs. 2000/- Maximum age is up to 50 years.',
            'After the death of the Sabhasad, the heir appointed by him shall receive Rs. 25000/- will be given in 2 installments.',
            'The designated heir has to submit the necessary documents.',
        ]],
        ['Girl Child Scheme', 'images/scheme/girl child scheme.png', [
            'Congratulations on the birth of a child',
            'Two houses, unoccupied, small, detached, unfurnished, offering a bond of Rs. 11,000.',
        ]],
        ['Samarth Pension Scheme', 'images/scheme/Samarth Pension Scheme.png', [
            'Be safe and sound by pushing your hard times away with Samarth Pension Yojana.',
            '9% per month on the given amount and fixed monthly pension melvi.',
            'The designated heir has to submit the necessary documents.',
        ]],
        ['Daily Savings Plan', 'images/scheme/Daily Savings Plan.png', [
            'From your designated place of business',
            'Daily (daily) amount by our employee',
            'will be taken.',
        ]],
        ['Quick and easy facility for loan', 'images/scheme/Quick and easy facility for loan.png', [
            'For the purpose of getting fast and easy credit for the members of Bagsara area, the credit can be directly deposited in your account through RTGS, so that the members can save time and use money quickly.',
        ]],
    ];
@endphp

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Schemes</p>
            <h1>Schemes</h1>
            <p>Plans designed around the needs of our members and their families.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="grid grid--2 reveal-group">
                @foreach ($schemes as [$title, $image, $lines])
                    <article class="card card--hover">
                        <div class="card-body">
                            <span class="tile-icon" style="margin:0 0 16px">
                                <img src="{{ asset($image) }}" alt="" loading="lazy" decoding="async">
                            </span>
                            <h3>{{ $title }}</h3>
                            @foreach ($lines as $line)
                                <p style="color:var(--text-muted);font-size:.9rem">{{ $line }}</p>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
