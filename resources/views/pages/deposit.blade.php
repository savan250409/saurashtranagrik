@extends('layouts.app')

@section('title', 'Deposit | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Deposit schemes, interest rates and recurring deposit maturity values.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Deposit</p>
            <h1>DEPOSIT</h1>
            <p>Deposit rates are effective from 1st february 2022</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="grid grid--2 reveal-group">
                @foreach ($depositRates as $rate)
                    <div class="rate-row">
                        <span class="rate-icon">
                            @if ($rate->icon)
                                <img src="{{ asset($rate->icon) }}" alt="" loading="lazy" decoding="async">
                            @else
                                @include('partials.icon', ['name' => 'coins'])
                            @endif
                        </span>
                        <span class="rate-name">{{ $rate->title }}</span>
                        @if ($rate->rate)
                            <span class="rate-value">{{ $rate->rate }}</span>
                        @endif
                    </div>
                @endforeach
            </div>

            @if ($depositRateFeatured)
                {{-- The grid is two columns wide; an odd last card is centred
                     on its own row rather than left dangling. --}}
                <div class="grid grid--2 reveal" style="max-width:calc(50% - 11px);margin-inline:auto;margin-top:22px">
                    <div class="rate-row">
                        <span class="rate-icon">
                            @if ($depositRateFeatured->icon)
                                <img src="{{ asset($depositRateFeatured->icon) }}" alt="" loading="lazy" decoding="async">
                            @else
                                @include('partials.icon', ['name' => 'coins'])
                            @endif
                        </span>
                        <span class="rate-name">{{ $depositRateFeatured->title }}</span>
                        @if ($depositRateFeatured->rate)
                            <span class="rate-value">{{ $depositRateFeatured->rate }}</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>

    @if ($recurringDeposits->isNotEmpty())
        <section class="section section--subtle">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Plan ahead</span>
                    <h2>Recurring Deposit</h2>
                    <p>Monthly deposit amounts and what they mature to.</p>
                </div>
                <div class="grid grid--3 reveal-group">
                    @foreach ($recurringDeposits as $rd)
                        <article class="card card--hover rd-card">
                            <div class="rd-head">
                                <h3>{{ $rd->term }}</h3>
                                @if ($rd->rate)
                                    <span class="rate-value">{{ $rd->rate }}</span>
                                @endif
                            </div>
                            <div class="rd-list">
                                @foreach ($rd->lines() as $line)
                                    <div class="rd-line">
                                        <span>{{ $line['amount'] }}</span>
                                        @include('partials.icon', ['name' => 'arrow-right'])
                                        <b>{{ $line['maturity'] }}</b>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('styles')
<style>
    @media (max-width: 700px) {
        .grid--2.reveal[style] { max-width: 100% !important; }
    }
</style>
@endpush
