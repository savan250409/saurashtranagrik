@extends('layouts.app')

@section('title', $branch->name.' Branch | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', $branch->name.' branch of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd. - address, contact number, management and current rates.')

@php
    $address = preg_replace('/\s*\R\s*/', ' ', (string) $branch->address);
    $allManagers = $headOfficeManagers->concat($branchManagers);

    /** Same avatar-initials logic as the Board of Directors page. */
    $initials = function (string $name): string {
        $clean = $name;
        for ($i = 0; $i < 2; $i++) {
            $clean = preg_replace('/^\s*(shri|smt|dr|ad|mr|mrs)\.?\s*/i', '', $clean);
        }

        $parts = preg_split('/\s+/', trim($clean), -1, PREG_SPLIT_NO_EMPTY) ?: [];
        if (! $parts) {
            return '?';
        }

        $first = $parts[0];
        $last = count($parts) > 1 ? $parts[count($parts) - 1] : '';

        return mb_strtoupper(mb_substr($first, 0, 1).mb_substr($last, 0, 1));
    };
@endphp

@section('content')
    @if ($signboard)
        <div class="signboard-hero">
            <div class="wrap">
                <p class="crumb crumb--on-brand">
                    <a href="{{ route('home') }}">Home</a> &rsaquo;
                    <a href="{{ route('branches') }}">Branches</a> &rsaquo;
                    {{ $branch->name }}
                </p>
                <h1 class="signboard-hero__title">{{ $branch->name }} Head Office</h1>
                <span class="signboard-hero__year">Established Year: {{ $signboard['established_year'] }}</span>

                @if ($address !== '' || $branch->phone || $branch->mobile)
                    <div class="signboard-hero__contacts">
                        @if ($address !== '')
                            <span class="signboard-hero__addr">
                                @include('partials.icon', ['name' => 'pin'])
                                {{ $address }}
                            </span>
                        @endif
                        @if ($branch->phone)
                            <a href="tel:{{ preg_replace('/\D+/', '', $branch->phone) }}" target="_blank" rel="noopener">
                                @include('partials.icon', ['name' => 'phone'])
                                {{ $branch->phone }}
                            </a>
                        @endif
                        @if ($branch->mobile)
                            <a href="tel:{{ preg_replace('/\D+/', '', $branch->mobile) }}" target="_blank" rel="noopener">
                                @include('partials.icon', ['name' => 'mobile'])
                                {{ $branch->mobile }}
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="page-head">
            <div class="wrap">
                <p class="crumb">
                    <a href="{{ route('home') }}">Home</a> &rsaquo;
                    <a href="{{ route('branches') }}">Branches</a> &rsaquo;
                    {{ $branch->name }}
                </p>
                <h1>
                    {{ $branch->name }}
                    @if ($isHeadOffice)
                        <span class="branch-badge">Head Office</span>
                    @endif
                </h1>
                @if ($address !== '')
                    <p>{{ $address }}</p>
                @endif

                @if ($branch->phone || $branch->mobile)
                    <div class="branch-row__contacts" style="justify-content:center;margin-top:18px">
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
            </div>
        </div>
    @endif

    @if ($signboard)
        <section class="section section--tight">
            <div class="wrap">
                <div class="section-head reveal">
                    <h2>About this branch</h2>
                </div>
                <div class="card reveal">
                    <div class="card-body">
                        <div @class(['signboard-about-split', 'signboard-about-split--full' => ! ($signboard['building_photo'] ?? null)])>
                            <div class="signboard-about">
                                @foreach ($signboard['about'] as $paragraph)
                                    <p>{{ $paragraph }}</p>
                                @endforeach
                            </div>
                            @if ($signboard['building_photo'] ?? null)
                                <figure class="signboard-about__photo">
                                    <div class="signboard-about__photo__frame">
                                        <img src="{{ asset($signboard['building_photo']) }}" alt="{{ $branch->name }} branch building" loading="lazy" decoding="async">
                                    </div>
                                    <figcaption>{{ $branch->name }} branch building</figcaption>
                                </figure>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($signboard['financial_summary'] ?? null)
            <section class="section section--tight section--subtle">
                <div class="wrap">
                    <div class="section-head reveal">
                        <h2>Financial summary</h2>
                    </div>

                    @foreach ([
                        'નફા નુકસાન ખાતું (૩૧/૦૩/૨૦૨૫ સુધીનું)' => [
                            'આવક' => $signboard['financial_summary']['income'],
                            'જાવક' => $signboard['financial_summary']['expenses'],
                        ],
                        'પાકું સરવૈયું (૩૧/૦૩/૨૦૨૫ સુધીનું)' => [
                            'મૂડી - દેવા' => $signboard['financial_summary']['liabilities'],
                            'મિલકત - લેણાં' => $signboard['financial_summary']['assets'],
                        ],
                    ] as $groupHeading => $boxes)
                        <h3 class="fin-boxes-group-heading reveal">{{ $groupHeading }}</h3>
                        <div class="fin-boxes reveal">
                            @foreach ($boxes as $heading => $rows)
                                <div class="fin-box">
                                    <h3 class="fin-box__heading">{{ $heading }}</h3>
                                    <ul class="fin-box__list">
                                        @foreach ($rows as [$label, $value])
                                            <li @class(['fin-box__total' => in_array($label, ['Total', 'કુલ'], true)])>
                                                <span>{{ $label }}</span>
                                                <span>{{ number_format((float) $value, 2) }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="section section--tight">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Branch board</span>
                    <h2>Advisory Board Members</h2>
                </div>
                <div class="card reveal">
                    <div class="card-body">
                        <div class="roster-list">
                            @foreach ($signboard['board_members'] as $name)
                                <div class="roster-person">
                                    <span class="roster-avatar" aria-hidden="true">{{ $initials($name) }}</span>
                                    <span class="roster-person__text">
                                        <span class="roster-person__name">{{ $name }}</span>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--tight section--subtle">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Management</span>
                    <h2>Management team</h2>
                </div>
                <div class="lead-grid reveal-group">
                    @foreach ($signboard['management'] as [$role, $name])
                        <article class="lead-card" style="--accent: var(--c{{ $loop->iteration % 6 ?: 6 }})">
                            <span class="lead-card__role">{{ $role }}</span>
                            <h3 class="lead-card__name">{{ $name }}</h3>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section section--tight">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Staff</span>
                    <h2>Supporting employees</h2>
                </div>
                <div class="card reveal">
                    <div class="card-body">
                        <div class="roster-list">
                            @foreach ($signboard['supporting_employees'] as $name)
                                <div class="roster-person">
                                    <span class="roster-avatar" aria-hidden="true">{{ $initials($name) }}</span>
                                    <span class="roster-person__text">
                                        <span class="roster-person__name">{{ $name }}</span>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif ($allManagers->isNotEmpty())
        <section class="section section--tight">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Management</span>
                    <h2>Who runs this branch</h2>
                </div>
                <div class="lead-grid reveal-group">
                    @foreach ($allManagers as $manager)
                        <article class="lead-card" style="--accent: var(--{{ $manager->color_class }})">
                            <span class="lead-card__role">{{ $manager->designation }}</span>
                            <h3 class="lead-card__name">{{ $manager->name }}</h3>
                            @if ($manager->phone)
                                <a class="lead-card__call" href="tel:{{ preg_replace('/\D+/', '', $manager->phone) }}" target="_blank" rel="noopener">
                                    @include('partials.icon', ['name' => 'phone'])
                                    {{ $manager->phone }}
                                </a>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($boardGroup && ! $signboard)
        <section class="section section--tight section--subtle">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Branch board</span>
                    <h2>Advisory Board Members</h2>
                    <p>{{ count($boardGroup['members']) }} members appointed at this branch.</p>
                </div>
                <div class="card reveal">
                    <div class="card-body">
                        <div class="roster-list">
                            @foreach ($boardGroup['members'] as [$name, $role])
                                <div @class(['roster-person', 'roster-person--lead' => str_contains(strtolower($role), 'md')])>
                                    <span class="roster-avatar" aria-hidden="true">{{ $initials($name) }}</span>
                                    <span class="roster-person__text">
                                        <span class="roster-person__name">{{ $name }}</span><br>
                                        <span class="roster-person__role">{{ $role }}</span>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($loans->isNotEmpty() && ! $signboard)
        <section class="section section--tight">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Rates</span>
                    <h2>Loan interest rates</h2>
                    <p>Mandali-wide rates, available at every branch including this one.</p>
                </div>
                <div class="rate-grid reveal-group">
                    @foreach ($loans as $loan)
                        <article class="rate-card">
                            <div class="rate-card__head">
                                <span class="rate-card__icon">
                                    @include('partials.icon', ['name' => $loan->icon ?: 'coins'])
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
                <div class="btn-row btn-row--center" style="margin-top:26px">
                    <a class="btn btn-ghost" href="{{ route('loan') }}">
                        View all loan schemes @include('partials.icon', ['name' => 'arrow-right'])
                    </a>
                </div>
            </div>
        </section>
    @endif

    @if ($depositRates->isNotEmpty() && ! $signboard)
        <section class="section section--tight section--subtle">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Rates</span>
                    <h2>Deposit interest rates</h2>
                    <p>Mandali-wide rates, available at every branch including this one.</p>
                </div>
                <div class="rate-grid reveal-group">
                    @foreach ($depositRates as $rate)
                        <article class="rate-card">
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
                <div class="btn-row btn-row--center" style="margin-top:26px">
                    <a class="btn btn-ghost" href="{{ route('deposit') }}">
                        View all deposit schemes @include('partials.icon', ['name' => 'arrow-right'])
                    </a>
                </div>
            </div>
        </section>
    @endif
@endsection
