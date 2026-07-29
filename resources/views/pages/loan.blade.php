@extends('layouts.app')

@section('title', 'Loans | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Loan schemes and interest rates offered to members of the Mandali.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Loans</p>
            <h1>Loan</h1>
            <p>Following are the attractive loans offered by our association to our dear members with interest rate</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="grid grid--2 reveal-group">
                @foreach ($loans as $loan)
                    <div class="rate-row">
                        <span class="rate-icon">
                            @if ($loan->icon)
                                <img src="{{ asset($loan->icon) }}" alt="" loading="lazy" decoding="async">
                            @else
                                @include('partials.icon', ['name' => 'coins'])
                            @endif
                        </span>
                        <span class="rate-name">{{ $loan->title }}</span>
                        @if ($loan->rate)
                            <span class="rate-value">{{ $loan->rate }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
