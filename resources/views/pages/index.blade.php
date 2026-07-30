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
        ['profit-loss', 'Profit loss account', 'chart', 'Profit and loss account, branch by branch.'],
        ['activity', 'Activities', 'sparkles', 'The deposit, savings and credit facilities we provide to members.'],
        ['progress-report', 'Progress Report', 'clipboard', 'Year on year growth of the Mandali.'],
        ['paku-sarvaiyu', 'Balance Sheet', 'bank', 'Audited balance sheet figures, branch by branch.'],
        ['event', 'Events', 'calendar', 'Moments from our work in the community.'],
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
                <div class="wrap" style="display:flex;justify-content:center;text-align:center;">
                    <div class="hero-panel hero-panel--center reveal" style="margin-left:auto;margin-right:auto;text-align:center;display:flex;flex-direction:column;align-items:center;">
                        <span class="eyebrow" style="margin-left:auto;margin-right:auto;">Bagasara &middot; Gujarat</span>
                        <h1 style="text-align:center;">Banking built on trust, sixteen years strong</h1>
                        <p style="text-align:center;margin-left:auto;margin-right:auto;">A member-first co-operative society serving deposits, loans and savings across eleven branches in Gujarat.</p>
                        <div class="btn-row btn-row--center" style="justify-content:center;margin-left:auto;margin-right:auto;">
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

    {{-- --------------------------------------- sections + branch roster --}}
    <section class="section section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow" style="white-space: nowrap !important; max-width: max-content !important; display: inline-flex !important; flex-direction: row !important; align-items: center !important;">
                    @include('partials.icon', ['name' => 'sparkles'])&nbsp;Financial&nbsp;Services
                </span>
                <h2 style="white-space: nowrap; font-size: clamp(1.6rem, 3.2vw, 2.4rem);">Sections and Information</h2>
                <p>Explore our key financial services, audited accounts, reports and community activities.</p>
            </div>

            <div class="hub-split">
                <div class="hub-grid reveal-group">
                    @php
                        $tags = [
                            'SAVINGS & RATES',
                            'FINANCIALS',
                            'ACTIVITIES',
                            'REPORTS',
                            'STATEMENTS',
                            'EVENTS'
                        ];
                    @endphp
                    @foreach ($sections as $index => [$route, $label, $icon, $blurb])
                        <a class="hub-card" href="{{ route($route) }}">
                            <div class="hub-card-top">
                                <div class="hub-icon">
                                    @include('partials.icon', ['name' => $icon])
                                </div>
                                <span class="hub-tag">{{ $tags[$index] ?? 'EXPLORE' }}</span>
                            </div>
                            <h3>{{ $label }}</h3>
                            <p>{{ $blurb }}</p>
                            <span class="hub-link">
                                Read More @include('partials.icon', ['name' => 'arrow-right'])
                            </span>
                        </a>
                    @endforeach
                </div>

                <div class="exec-assoc-card reveal">
                    <div class="exec-header">
                        <div class="exec-header-info">
                            <h3>Branch Associate</h3>
                            <p>Key Officers & Representatives</p>
                        </div>
                        <span class="exec-badge">4 BRANCHES</span>
                    </div>
                    <div class="accordion exec-accordion">
                        @foreach ($associates as $branch => $members)
                            <div class="accordion-item">
                                <button type="button" class="accordion-trigger"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="assoc-{{ $loop->index }}">
                                    <span>{{ $branch }}</span>
                                    @include('partials.icon', ['name' => 'chevron-down'])
                                </button>
                                <div class="accordion-panel @if($loop->first) is-open @endif" id="assoc-{{ $loop->index }}">
                                    <div>
                                        <ul>
                                            @foreach ($members as $member)
                                                <li>@include('partials.icon', ['name' => 'user']) {{ $member }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="btn-exec-details" href="{{ route('branches') }}">
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
                    <span class="eyebrow" style="white-space: nowrap !important; max-width: max-content !important; display: inline-flex !important; flex-direction: row !important; align-items: center !important;">
                        @include('partials.icon', ['name' => 'sparkles'])&nbsp;Media&nbsp;Gallery
                    </span>
                    <h2 style="white-space: nowrap; font-size: clamp(1.6rem, 3.2vw, 2.4rem);">Video Highlights</h2>
                    <p>Watch milestone events, annual gatherings, and member community highlights.</p>
                </div>
                <div class="video-showcase-grid reveal-group">
                    @foreach ($homeVideos as $video)
                        <div class="cinema-card">
                            <div class="cinema-top-bar">
                                <span><span class="live-dot"></span> Official Highlight #{{ $loop->iteration }}</span>
                                <span>@include('partials.icon', ['name' => 'star']) Mandali Media</span>
                            </div>
                            <div class="cinema-video-wrapper">
                                <video controls preload="metadata" playsinline>
                                    <source src="{{ asset($video->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('styles')
<style>
    /* Hub Split Layout */
    .hub-split {
        display: grid;
        grid-template-columns: minmax(0, 1.85fr) minmax(0, 1fr);
        gap: 28px;
        align-items: start;
    }

    .hub-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .hub-card {
        position: relative;
        display: flex;
        flex-direction: column;
        padding: 26px 24px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        text-decoration: none;
        color: var(--text);
        overflow: hidden;
        transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s var(--ease);
    }

    .hub-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--brand), var(--gold));
        opacity: 0;
        transition: opacity .35s var(--ease);
    }

    /* !important: beats the higher-specificity resting transform that
       .js-anim .reveal-group.is-visible > * applies once this card has
       scrolled into view (3 classes vs. this rule's 2), which would
       otherwise silently cancel the lift. */
    .hub-card:hover {
        transform: translateY(-5px) !important;
        box-shadow: var(--shadow-md);
        border-color: var(--border-strong);
        color: var(--text);
    }

    .hub-card:hover::before {
        opacity: 1;
    }

    .hub-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .hub-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, color-mix(in srgb, var(--brand) 92%, transparent), color-mix(in srgb, var(--gold) 75%, var(--brand)));
        color: #fff;
        box-shadow: 0 6px 16px -3px color-mix(in srgb, var(--brand) 30%, transparent);
        flex-shrink: 0;
        transition: transform .3s var(--ease);
    }

    .hub-card:hover .hub-icon {
        transform: scale(1.08) rotate(-3deg);
    }

    .hub-icon svg {
        width: 22px;
        height: 22px;
    }

    .hub-tag {
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--brand);
        background: var(--brand-soft);
        padding: 4px 10px;
        border-radius: var(--radius-full);
    }

    .hub-card h3 {
        margin: 0 0 8px;
        font-size: 1.12rem;
        font-weight: 700;
        font-family: var(--font-display);
        color: var(--text);
        line-height: 1.3;
    }

    .hub-card p {
        margin: 0 0 18px;
        font-size: 0.88rem;
        color: var(--text-muted);
        line-height: 1.5;
        flex: 1;
    }

    .hub-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--brand);
        transition: gap .25s var(--ease);
    }

    .hub-link svg {
        width: 15px;
        height: 15px;
        transition: transform .25s var(--ease);
    }

    .hub-card:hover .hub-link svg {
        transform: translateX(4px);
    }

    /* Executive Directory Panel */
    .exec-assoc-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        display: flex;
        flex-direction: column;
    }

    .exec-header {
        background: linear-gradient(135deg, var(--cta-1), var(--cta-2));
        padding: 20px 22px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .exec-header-info h3 {
        margin: 0 0 3px;
        color: #ffffff;
        font-size: 1.18rem;
        font-weight: 700;
        font-family: var(--font-display);
    }

    .exec-header-info p {
        margin: 0;
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.85);
    }

    .exec-badge {
        padding: 5px 12px;
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(8px);
        border-radius: var(--radius-full);
        font-size: 0.72rem;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 0.05em;
        flex-shrink: 0;
    }

    .exec-accordion {
        border: none;
        border-radius: 0;
        background: transparent;
    }

    .exec-accordion .accordion-item + .accordion-item {
        border-top: 1px solid var(--border);
    }

    .exec-accordion .accordion-trigger {
        background: var(--surface);
        color: var(--text);
        padding: 15px 20px;
        font-weight: 700;
        font-size: 0.96rem;
        transition: background-color .2s var(--ease);
    }

    .exec-accordion .accordion-trigger:hover {
        background: var(--surface-2);
    }

    .exec-accordion .accordion-trigger[aria-expanded="true"] {
        background: var(--surface-2);
        color: var(--brand);
    }

    .exec-accordion .accordion-panel {
        background: var(--bg-subtle);
    }

    .exec-accordion .accordion-panel ul {
        padding: 10px 20px 18px 20px;
    }

    .exec-accordion .accordion-panel li {
        color: var(--text-muted);
        font-size: 0.88rem;
        padding: 7px 0;
        border-bottom: 1px dashed var(--border);
    }

    .exec-accordion .accordion-panel li:last-child {
        border-bottom: none;
    }

    .exec-accordion .accordion-panel li svg {
        color: var(--brand);
        width: 15px;
        height: 15px;
    }

    .btn-exec-details, .btn-branch-details {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 12px 18px !important;
        height: 44px !important;
        max-height: 44px !important;
        background: linear-gradient(135deg, var(--brand), var(--brand-strong));
        color: var(--brand-ink) !important;
        font-weight: 700;
        font-size: 0.85rem !important;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        border-radius: 0;
        border: none;
        transition: all .25s var(--ease);
        text-decoration: none;
        margin-top: auto;
        flex-shrink: 0 !important;
    }

    .btn-exec-details svg, .btn-branch-details svg {
        width: 16px !important;
        height: 16px !important;
    }

    .btn-exec-details:hover, .btn-branch-details:hover {
        box-shadow: var(--shadow-glow);
        color: var(--brand-ink) !important;
    }

    /* Video Showcase Cinema */
    .video-showcase-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
    }

    .cinema-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s var(--ease);
    }

    .cinema-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--border-strong);
    }

    .cinema-top-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 18px;
        background: var(--bg-subtle);
        border-bottom: 1px solid var(--border);
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-muted);
    }

    .cinema-top-bar .live-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #e53935;
        box-shadow: 0 0 8px rgba(229, 57, 53, 0.6);
        display: inline-block;
        margin-right: 6px;
    }

    .cinema-top-bar svg {
        width: 15px;
        height: 15px;
        color: var(--gold);
    }

    .cinema-video-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 9;
        background: #0d0f14;
        overflow: hidden;
    }

    .cinema-video-wrapper video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    @media (max-width: 960px) {
        .hub-split {
            grid-template-columns: 1fr;
            gap: 32px;
        }
    }

    @media (max-width: 580px) {
        .hub-grid {
            grid-template-columns: 1fr;
        }
        .video-showcase-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
