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
            @php
                // Highest numeric rate: for a depositor the best return, the
                // mirror of the loan page marking the lowest. "Double" and any
                // other non-numeric value is skipped rather than guessed at.
                $numericRates = $depositRates->pluck('rate')
                    ->filter(fn ($r) => is_numeric(str_replace('%', '', (string) $r)))
                    ->map(fn ($r) => (float) str_replace('%', '', (string) $r));
                $bestRate = $numericRates->isNotEmpty() ? $numericRates->max() : null;
            @endphp

            <div class="rate-grid reveal-group">
                @foreach ($depositRates as $rate)
                    @php
                        $clean = str_replace('%', '', (string) $rate->rate);
                        $isBest = $bestRate !== null && is_numeric($clean) && (float) $clean === $bestRate;
                    @endphp

                    <article @class(['rate-card', 'rate-card--badged' => $isBest])>
                        @if ($rate->icon)
                            <span class="rate-card__mark" aria-hidden="true">
                                <img src="{{ asset($rate->icon) }}" alt="" loading="lazy" decoding="async">
                            </span>
                        @endif

                        @if ($isBest)
                            <span class="rate-card__badge">Highest rate</span>
                        @endif

                        <div class="rate-card__head">
                            <span class="rate-card__icon">
                                @if ($rate->icon)
                                    <img src="{{ asset($rate->icon) }}" alt="" loading="lazy" decoding="async">
                                @else
                                    @include('partials.icon', ['name' => 'coins'])
                                @endif
                            </span>
                            <span class="rate-card__name">{{ $rate->title }}</span>
                        </div>

                        @if ($rate->rate)
                            <div class="rate-card__foot">
                                <span @class(['rate-card__value', 'rate-card__value--long' => mb_strlen((string) $rate->rate) > 5])>{{ $rate->rate }}</span>
                                <span class="rate-card__label">Interest rate</span>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
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
                @php
                    // Every term uses the same ladder of monthly amounts, so the
                    // picker is the union of whatever amounts exist, in the order
                    // they first appear - derived, not hard-coded.
                    $amounts = collect($recurringDeposits)
                        ->flatMap(fn ($rd) => collect($rd->lines())->pluck('amount'))
                        ->filter(fn ($a) => filled($a))
                        ->unique()
                        ->values();
                @endphp

                @if ($amounts->isNotEmpty())
                    <div class="maturity-picker reveal">
                        <span class="maturity-picker__label" id="maturity-picker-label">Monthly deposit</span>
                        <div class="maturity-chips" role="radiogroup" aria-labelledby="maturity-picker-label">
                            @foreach ($amounts as $amount)
                                <button type="button" class="maturity-chip" role="radio"
                                        data-amount="{{ $amount }}"
                                        aria-checked="{{ $loop->first ? 'true' : 'false' }}"
                                        tabindex="{{ $loop->first ? '0' : '-1' }}">{{ $amount }}</button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="maturity-grid reveal-group">
                    @foreach ($recurringDeposits as $rd)
                        <article class="maturity-card">
                            <div class="maturity-card__head">
                                <h3 class="maturity-card__term">{{ $rd->term }}</h3>
                                @if ($rd->rate)
                                    <span class="maturity-card__rate">{{ $rd->rate }}</span>
                                @endif
                            </div>

                            <div class="maturity-values">
                                @foreach ($rd->lines() as $line)
                                    <div @class(['maturity-value', 'is-active' => $loop->first])
                                         data-amount="{{ $line['amount'] }}">
                                        <span class="maturity-value__num">{{ $line['maturity'] }}</span>
                                        <span class="maturity-value__label">on {{ $line['amount'] }} / month</span>
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

