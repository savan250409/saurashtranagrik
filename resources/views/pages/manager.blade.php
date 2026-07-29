@extends('layouts.app')

@section('title', 'Managers | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Head office and branch managers of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Managers</p>
            <h1>Managers</h1>
            <p>The people running our head office and branches day to day.</p>
        </div>
    </div>

    @if ($headOfficeManagers->isNotEmpty())
        <section class="section">
            <div class="wrap">
                <div class="grid grid--2 reveal-group">
                    @foreach ($headOfficeManagers as $manager)
                        <article class="card card--hover accent-card" style="--accent: var(--{{ $manager->color_class }})">
                            <div class="accent-head">
                                <span class="dot">@include('partials.icon', ['name' => 'user-tie'])</span>
                                <h3>{{ $manager->designation }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="info-line">
                                    @include('partials.icon', ['name' => 'user'])
                                    <span>{{ $manager->name }}</span>
                                </p>
                                @if ($manager->phone)
                                    <p class="info-line">
                                        @include('partials.icon', ['name' => 'phone'])
                                        <a href="tel:{{ preg_replace('/\D+/', '', $manager->phone) }}">{{ $manager->phone }}</a>
                                    </p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($branchManagers->isNotEmpty())
        <section class="section section--subtle">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Branches</span>
                    <h2>Branch Managers</h2>
                </div>
                <div class="grid grid--3 reveal-group">
                    @foreach ($branchManagers as $manager)
                        <article class="card card--hover accent-card" style="--accent: var(--{{ $manager->color_class }})">
                            <div class="accent-head">
                                <span class="dot">@include('partials.icon', ['name' => 'pin'])</span>
                                <h3>{{ $manager->designation }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="info-line">
                                    @include('partials.icon', ['name' => 'user'])
                                    <span>{{ $manager->name }}</span>
                                </p>
                                @if ($manager->phone)
                                    <p class="info-line">
                                        @include('partials.icon', ['name' => 'phone'])
                                        <a href="tel:{{ preg_replace('/\D+/', '', $manager->phone) }}">{{ $manager->phone }}</a>
                                    </p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
