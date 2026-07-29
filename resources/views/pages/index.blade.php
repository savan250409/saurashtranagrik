@extends('layouts.app')

@section('title', 'Shree Saurashtra Nagrik Sharafi Mandali Ltd.')

@push('head')
    @if ($heroSlides->isNotEmpty())
        <link rel="preload" as="image" href="{{ asset($heroSlides->first()->image) }}" fetchpriority="high">
    @endif
@endpush

@php
    // Branch associate rosters - static content carried over from the original page.
    $associates = [
        'Amreli' => ['Shri Divyeshbhai Vekariya - Branch MD', 'Shri Sanjaybhai Malaviya', 'Shri Jaysukhbhai Sorathiya', 'Shri Dipakbhai Dhanani', 'Shri Mukeshbhai Korat', 'Shri Arunbhai Der', 'Shri Hiteshbhai Khaneshar', 'Shri Dharmeshbhai Visavaliya'],
        'Chuda' => ['Shri Arunaben Barariya -Branch MD', 'Shri Jaysukhbhai Vaghasiya', 'Shri Sonalben Gajipara', 'Shri Sangitaben Dobariya', 'Shri Bharatbhai Korat', 'Shri Ghanshyambhai Patoliya', 'Shri Dalsukhbhai Asodariya', 'Shri Kishanbhai Kathiriya', 'Shri Gordhanbhai Bhut'],
        'Visavadar' => ['Shri Prakashbhai Savaliya - Branch MD', 'Shri Hasubhai Rabadiya', 'Shri Mohitbhai Malaviya', 'Shri Rinaben Bhaliya', 'Shri Chimanbhai Rafaliya', 'Shri Hirenbhai Sojitra', 'Shri Manishaben Lakhani'],
        'Bhalgam' => ['Shri Dipakbhai Ambaliya - Branch MD', 'Shri Nitinbhai Kotadiya', 'Shri Bhupatbhai Lokadiya', 'Shri Manishbhai Pansuriya', 'Shri Jyotsanaben Godhani', 'Shri Dayaben Vaghasiya'],
    ];

    $sections = [
        ['loan', 'Interest rate and savings plan', 'coins', 'Compare every deposit and loan rate we offer, in one place.'],
        ['profit-loss', 'Profit loss account', 'chart', 'Read More'],
        ['activity', 'Activities', 'sparkles', 'Read More'],
        ['progress-report', 'Progress Report', 'clipboard', 'Read More'],
        ['paku-sarvaiyu', 'Balance Sheet', 'bank', 'Read More'],
        ['event', 'Events', 'calendar', 'Read More'],
    ];

    $districts = ['Bagasara', 'Kunkavav', 'Bhesan', 'Chuda', 'Visavadar', 'Bhalgam', 'Amreli', 'Dhari', 'Ahmedabad', 'Junagadh', 'Mendarda'];
@endphp

@section('content')

    {{-- ------------------------------------------------------------ hero --}}
    @if ($heroSlides->isNotEmpty())
        <section class="hero" aria-label="Highlights">
            <div class="hero-slider">
                {{-- Only the first slide carries a src. The rest are held in
                     data-src and fetched by site.js one slide ahead, so opening
                     the home page downloads one image instead of all of them. --}}
                @foreach ($heroSlides as $slide)
                    <div @class(['hero-slide', 'is-active' => $loop->first]) aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
                        @if ($loop->first)
                            <img src="{{ asset($slide->image) }}" alt="" width="1920" height="840"
                                 fetchpriority="high" decoding="async">
                        @else
                            <img data-src="{{ asset($slide->image) }}" alt="" width="1920" height="840"
                                 decoding="async">
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="hero-scrim" aria-hidden="true"></div>
            <div class="hero-mesh" aria-hidden="true"></div>

            <div class="hero-content">
                <div class="wrap">
                    <div class="hero-panel reveal">
                        <span class="eyebrow">Bagasara &middot; Gujarat</span>
                        <h1>Banking built on trust, sixteen years strong</h1>
                        <p>A member-first co-operative society serving deposits, loans and savings across eleven branches in Gujarat.</p>
                        <div class="btn-row">
                            <a class="btn btn-primary btn-magnetic" href="{{ route('deposit') }}">
                                Explore deposits @include('partials.icon', ['name' => 'arrow-right'])
                            </a>
                            <a class="btn btn-ghost--dark" href="{{ route('statement') }}">Chairman's statement</a>
                        </div>
                    </div>
                </div>
            </div>

            @if ($heroSlides->count() > 1)
                <button type="button" class="hero-arrow hero-arrow--prev" aria-label="Previous slide">
                    @include('partials.icon', ['name' => 'chevron-left'])
                </button>
                <button type="button" class="hero-arrow hero-arrow--next" aria-label="Next slide">
                    @include('partials.icon', ['name' => 'chevron-right'])
                </button>
                <div class="hero-dots" role="tablist" aria-label="Choose slide">
                    @foreach ($heroSlides as $slide)
                        <button type="button" role="tab"
                                aria-current="{{ $loop->first ? 'true' : 'false' }}"
                                aria-label="Slide {{ $loop->iteration }}"></button>
                    @endforeach
                </div>
            @endif
        </section>

        <div class="wrap stats-strip">
            <div class="card reveal-group">
                @foreach ($stats as $stat)
                    <div class="stat">
                        <span class="stat-number" data-target="{{ $stat['target'] }}" data-suffix="{{ $stat['suffix'] }}">{{ $stat['target'] }}{{ $stat['suffix'] }}</span>
                        <span class="stat-label">{{ $stat['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- ------------------------------------------------- chairman intro --}}
    <section class="section">
        <div class="wrap">
            <div class="statement reveal">
                <div class="statement-photo">
                    <img src="{{ asset('images/mayer2.png') }}" alt="Chairman" loading="lazy" decoding="async">
                </div>
                <div class="statement-body">
                    <span class="eyebrow">Chairman's statement</span>
                    <h2>Sixteen years of trusted co-operative banking</h2>
                    <p>Celebrating 16 successful years today, our Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd., Bagasara, has achieved remarkable growth. Operating across various districts of Gujarat State, we proudly serve communities in Bagasara, Kunkavav, Bhesan, Chuda, Visavadar, Bhalgam, Amreli, Dhari, Ahmedabad, Junagadh, and Mendarda.</p>
                    <a class="btn btn-primary" href="{{ route('statement') }}">
                        Read More @include('partials.icon', ['name' => 'arrow-right'])
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ---------------------------------------------------- district ticker --}}
    <div class="section--tight">
        <div class="marquee reveal">
            <div class="marquee__track" aria-hidden="true">
                @foreach ([1, 2] as $pass)
                    @foreach ($districts as $district)
                        <span>@include('partials.icon', ['name' => 'pin']) {{ $district }}</span>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    {{-- --------------------------------------- sections + branch roster --}}
    <section class="section section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow">Explore</span>
                <h2>Sections and information</h2>
                <p>Everything you need to know about our schemes, accounts and activities.</p>
            </div>

            <div class="home-split">
                <div class="grid grid--bento reveal-group">
                    @foreach ($sections as [$route, $label, $icon, $blurb])
                        <a class="card card--hover tile" href="{{ route($route) }}">
                            <span class="tile-icon">@include('partials.icon', ['name' => $icon])</span>
                            <h3>{{ $label }}</h3>
                            <p>{{ $blurb }}</p>
                        </a>
                    @endforeach
                </div>

                <div class="reveal">
                    <h3 style="font-size:1.05rem;margin-bottom:14px">Branch Associate</h3>
                    <div class="accordion">
                        @foreach ($associates as $branch => $members)
                            <div class="accordion-item">
                                <button type="button" class="accordion-trigger"
                                        aria-expanded="false" aria-controls="assoc-{{ $loop->index }}">
                                    {{ $branch }}
                                    @include('partials.icon', ['name' => 'chevron-down'])
                                </button>
                                <div class="accordion-panel" id="assoc-{{ $loop->index }}">
                                    <div>
                                        <ul>
                                            @foreach ($members as $member)
                                                <li>@include('partials.icon', ['name' => 'user-tie']) {{ $member }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="btn btn-ghost" style="margin-top:16px" href="{{ route('branches') }}">
                        Branch Details @include('partials.icon', ['name' => 'arrow-right'])
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- --------------------------------------------------- video gallery --}}
    @if ($homeVideos->isNotEmpty())
        <section class="section">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Media</span>
                    <h2>Video Gallery</h2>
                </div>
                <div class="grid grid--3 reveal-group">
                    @foreach ($homeVideos as $video)
                        <div class="card video-card">
                            <video controls preload="metadata" playsinline>
                                <source src="{{ asset($video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('styles')
<style>
    .home-split { display: grid; grid-template-columns: minmax(0, 2.1fr) minmax(0, 1fr); gap: 26px; align-items: start; }
    @media (max-width: 900px) {
        .home-split { grid-template-columns: 1fr; }
    }
</style>
@endpush
