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
            <div class="grid grid--3 reveal-group">
                @foreach ($branches as $branch)
                    <article class="card card--hover accent-card" style="--accent: var(--{{ $branch->color_class }})">
                        <div class="accent-head">
                            <span class="dot">@include('partials.icon', ['name' => 'pin'])</span>
                            <h3>{{ $branch->name }}</h3>
                        </div>
                        <div class="card-body">
                            @if ($branch->address)
                                <p class="info-line">
                                    @include('partials.icon', ['name' => 'building'])
                                    <span>{!! nl2br(e($branch->address)) !!}</span>
                                </p>
                            @endif

                            @if ($branch->phone || $branch->mobile)
                                <hr class="info-divider">
                                @if ($branch->phone)
                                    <p class="info-line">
                                        @include('partials.icon', ['name' => 'phone'])
                                        <a href="tel:{{ preg_replace('/\D+/', '', $branch->phone) }}">{{ $branch->phone }}</a>
                                    </p>
                                @endif
                                @if ($branch->mobile)
                                    <p class="info-line">
                                        @include('partials.icon', ['name' => 'mobile'])
                                        <a href="tel:{{ preg_replace('/\D+/', '', $branch->mobile) }}">{{ $branch->mobile }}</a>
                                    </p>
                                @endif
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
