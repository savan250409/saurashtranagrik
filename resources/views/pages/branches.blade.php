@extends('layouts.app')

@section('title', 'Branches | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Branch addresses and contact numbers for Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Branches</p>
            <h1>Branches</h1>
            <p>Visit us at any of our branches across Gujarat.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="branch-index reveal-group">
                @foreach ($branches as $branch)
                    @php
                        // The Privacy Policy names the head office as
                        // "Samarth Saurashtra Building, Amarpara, Bagasara" - only
                        // one branch sits at that address, so the label is derived
                        // from the data rather than hard-coded to a position.
                        $isHeadOffice = str_contains((string) $branch->address, 'Samarth Saurashtra Building');
                        // the stored address breaks before "Dist. -"; one line reads
                        // better in a wide row and no wording changes
                        $address = preg_replace('/\s*\R\s*/', ' ', (string) $branch->address);
                    @endphp

                    <article class="branch-row" style="--accent: var(--{{ $branch->color_class }})">
                        <span class="branch-row__num" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>

                        <div class="branch-row__body">
                            <h2 class="branch-row__name">
                                {{ $branch->name }}
                                @if ($isHeadOffice)
                                    <span class="branch-badge">Head Office</span>
                                @endif
                            </h2>
                            @if ($address !== '')
                                <p class="branch-row__addr">{{ $address }}</p>
                            @endif
                        </div>

                        @if ($branch->phone || $branch->mobile)
                            <div class="branch-row__contacts">
                                @if ($branch->phone)
                                    <a class="branch-chip" href="tel:{{ preg_replace('/\D+/', '', $branch->phone) }}" target="_blank" rel="noopener">
                                        @include('partials.icon', ['name' => 'phone'])
                                        {{ $branch->phone }}
                                    </a>
                                @endif
                                @if ($branch->mobile)
                                    <a class="branch-chip" href="tel:{{ preg_replace('/\D+/', '', $branch->mobile) }}" target="_blank" rel="noopener">
                                        @include('partials.icon', ['name' => 'mobile'])
                                        {{ $branch->mobile }}
                                    </a>
                                @endif
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
