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
                {{-- Bagasara Head Office always appears first --}}
                <article class="branch-row" style="--accent: var(--c1)">
                    <span class="branch-row__num" aria-hidden="true">01</span>
                    <div class="branch-row__body">
                        <h2 class="branch-row__name">
                            <a href="{{ route('branches.bagasara-head-office') }}">Bagasara Head Office</a>
                        </h2>
                        <p class="branch-row__addr">Samarth Saurashtra Building, Amarpara, Bagasara, Dist. - Amreli</p>
                        <a class="branch-row__more" href="{{ route('branches.bagasara-head-office') }}">
                            View branch details @include('partials.icon', ['name' => 'arrow-right'])
                        </a>
                    </div>
                    <div class="branch-row__contacts">
                        <a class="branch-chip" href="tel:02796220525" target="_blank" rel="noopener">
                            @include('partials.icon', ['name' => 'phone'])
                            (02796) 220 525
                        </a>
                        <a class="branch-chip" href="tel:9484529400" target="_blank" rel="noopener">
                            @include('partials.icon', ['name' => 'mobile'])
                            94845 29400
                        </a>
                    </div>
                </article>

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
                        <span class="branch-row__num" aria-hidden="true">{{ str_pad((string) ($loop->iteration + 1), 2, '0', STR_PAD_LEFT) }}</span>

                        <div class="branch-row__body">
                            <h2 class="branch-row__name">
                                @if ($branch->signboard)
                                    <a href="{{ route('branches.show', $branch) }}">{{ $branch->name }}</a>
                                @else
                                    {{ $branch->name }}
                                @endif
                            </h2>
                            @if ($address !== '')
                                <p class="branch-row__addr">{{ $address }}</p>
                            @endif
                            @if ($branch->signboard)
                                <a class="branch-row__more" href="{{ route('branches.show', $branch) }}">
                                    View branch details @include('partials.icon', ['name' => 'arrow-right'])
                                </a>
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
