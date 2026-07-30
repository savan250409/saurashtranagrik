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

    @php
        // Smallest numeric rate on the page, so the cheapest borrowing option is
        // marked from the data rather than hard-coded. Non-numeric values (if any
        // are ever added) are simply ignored.
        $numericRates = $loans->pluck('rate')
            ->filter(fn ($r) => is_numeric(str_replace('%', '', (string) $r)))
            ->map(fn ($r) => (float) str_replace('%', '', (string) $r));
        $lowestRate = $numericRates->isNotEmpty() ? $numericRates->min() : null;
    @endphp

    <section class="section">
        <div class="wrap">
            <div class="rate-grid reveal-group">
                @foreach ($loans as $loan)
                    @php
                        $clean = str_replace('%', '', (string) $loan->rate);
                        $isLowest = $lowestRate !== null && is_numeric($clean) && (float) $clean === $lowestRate;
                    @endphp

                    <article @class(['rate-card', 'rate-card--badged' => $isLowest])>
                        @if ($loan->icon)
                            <span class="rate-card__mark" aria-hidden="true">
                                <img src="{{ asset($loan->icon) }}" alt="" loading="lazy" decoding="async">
                            </span>
                        @endif

                        @if ($isLowest)
                            <span class="rate-card__badge">Lowest rate</span>
                        @endif

                        <div class="rate-card__head">
                            <span class="rate-card__icon">
                                @if ($loan->icon)
                                    <img src="{{ asset($loan->icon) }}" alt="" loading="lazy" decoding="async">
                                @else
                                    @include('partials.icon', ['name' => 'coins'])
                                @endif
                            </span>
                            <span class="rate-card__name">{{ $loan->title }}</span>
                        </div>

                        @if ($loan->rate)
                            <div class="rate-card__foot">
                                <span @class(['rate-card__value', 'rate-card__value--long' => mb_strlen((string) $loan->rate) > 5])>{{ $loan->rate }}</span>
                                <span class="rate-card__label">Interest rate</span>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
