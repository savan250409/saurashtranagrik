@extends('layouts.app')

@section('title', 'Bagasara Head Office | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Bagasara Head Office of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd. - Board of Directors, address and contact details.')

@php
    $officers = [
        ['Chairman',      'Shri Anilbhai G. Vekariya'],
        ['Vice Chairman', 'Shri Diveyshbhai M. Vekariya'],
        ['M.D. Shri',     'Shri Jayasukhbhai S. Gondaliya'],
        ['Mantri Shri',   'Shri Rupalben D. Sarvaiya'],
    ];

    $members = [
        'Shri Dipakbhai V. Ambaliya',
        'Shri Bhaveshbhai L. Trapasiya',
        'Shri Bhavanaben V. Satasiya',
        'Shri Pravinbhai J. Kasavala',
        'Shri Hiteshbhai R. Tereya',
        'Shri Arunaben P. Babariya',
        'Shri Amitabhai M. Khimasuriya',
    ];

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
        return mb_strtoupper(mb_substr($first, 0, 1) . mb_substr($last, 0, 1));
    };
@endphp

@section('content')
    <div class="signboard-hero">
        <div class="wrap">
            <p class="crumb crumb--on-brand">
                <a href="{{ route('home') }}">Home</a> &rsaquo;
                <a href="{{ route('branches') }}">Branches</a> &rsaquo;
                Bagasara Head Office
            </p>
            <h1 class="signboard-hero__title">Bagasara Head Office</h1>

            <div class="signboard-hero__contacts">
                <span class="signboard-hero__addr">
                    @include('partials.icon', ['name' => 'pin'])
                    Samarth Saurashtra Building, Amarpara, Bagasara, Dist. - Amreli
                </span>
                <a href="tel:02796220525" target="_blank" rel="noopener">
                    @include('partials.icon', ['name' => 'phone'])
                    (02796) 220 525
                </a>
                <a href="tel:9484529400" target="_blank" rel="noopener">
                    @include('partials.icon', ['name' => 'mobile'])
                    94845 29400
                </a>
            </div>
        </div>
    </div>

    {{-- Officers with designation --}}
    <section class="section section--tight section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow">Shri Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.</span>
                <h2>Board of Directors</h2>
            </div>
            <div class="lead-grid reveal-group">
                @foreach ($officers as $i => [$role, $name])
                    <article class="lead-card" style="--accent: var(--c{{ ($i % 6) + 1 }})">
                        <span class="lead-card__role">{{ $role }}</span>
                        <h3 class="lead-card__name">{{ $name }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Management team --}}
    <section class="section section--tight section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow">Management</span>
                <h2>Management team</h2>
            </div>
            <div class="lead-grid reveal-group">
                @foreach ([
                    ['General Manager',     'Shri Jaydip Singh Rathod'],
                    ['Financial Manager',   'Shri Chiragbhai Kanapariya'],
                    ['Development Manager', 'Shri Alpeshbhai Sathvara'],
                    ['Account Manager',     'Shri Ajaybhai Nakum'],
                    ['Branch Manager',      'Shri Dhanjibhai Mitaliya'],
                ] as $i => [$role, $name])
                    <article class="lead-card" style="--accent: var(--c{{ ($i % 6) + 1 }})">
                        <span class="lead-card__role">{{ $role }}</span>
                        <h3 class="lead-card__name">{{ $name }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Regular members without designation --}}
    <section class="section section--tight">
        <div class="wrap">
            <div class="card reveal">
                <div class="card-body">
                    <div class="roster-list">
                        @foreach ($members as $name)
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
    {{-- Last 5 years growth --}}
    <section class="section section--tight section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <h2>છેલ્લા ૫ વર્ષની વિકાસની કડી</h2>
            </div>
            <div class="card reveal" style="overflow-x:auto">
                <div class="card-body" style="padding:0">
                    <table style="width:100%;border-collapse:collapse;min-width:600px;font-family:inherit">
                        <thead>
                            <tr style="background:var(--brand);color:#fff">
                                <th style="padding:12px 14px;text-align:center;font-weight:600;white-space:nowrap">વર્ષ</th>
                                <th style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap">સભ્ય સંખ્યા</th>
                                <th style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap">શેર ભંડોળ</th>
                                <th style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap">થાપણ</th>
                                <th style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap">ધિરાણ</th>
                                <th style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap">નફો</th>
                                <th style="padding:12px 14px;text-align:center;font-weight:600;white-space:nowrap">ઓડિટ વર્ગ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                ['૨૧-૨૨', '૫૭૦૧',   '૧,૫૦,૪૯,૯૦૦.૦૦',   '૪૩,૯૮,૬૦,૬૫૯.૦૦',   '૩૨,૦૪,૩૩,૯૮૯.૦૦',   '૯૩,૪૮,૬૯૨.૨૧',   'અ'],
                                ['૨૨-૨૩', '૭૫૭૮',   '૨,૦૮,૫૫,૦૦૦.૦૦',   '૪૫,૪૯,૯૮,૪૫૯.૦૦',   '૪૧,૩૩,૮૮,૨૯૬.૦૦',   '૮૨,૮૬,૪૮૦.૫૨',   'અ'],
                                ['૨૩-૨૪', '૧૦૦૦૮',  '૨,૯૯,૯૦,૩૦૦.૦૦',   '૬૮,૬૩,૧૪,૩૪૯.૬૦',   '૭૩,૫૫,૪૫,૮૨૫.૦૦', '૧,૯૮,૯૭,૪૫૯.૩૯',   'અ'],
                                ['૨૪-૨૫', '૧૧,૮૯૦', '૩,૨૫,૭૦,૮૦૦.૦૦',   '૬૩,૬૩,૯૪,૪૯૦.૬૦', '૧,૦૦,૩૦,૦૯,૦૮૪.૦૦', '૧,૨૩,૦૩,૩૬૮.૩૩',   'અ'],
                                ['૨૫-૨૬', '૧૩૫૫૨',  '૩,૯૩,૯૮,૫૦૦.૦૦', '૧,૧૯,૮૫,૦૯,૩૬૦.૬૦', '૧,૪૮,૩૩,૦૪,૯૨૨.૦૦', '૨,૧૧,૯૮,૫૨૫.૮૨',   '-'],
                            ] as $i => $row)
                                <tr style="{{ $i % 2 === 0 ? 'background:var(--surface)' : 'background:var(--surface-alt,var(--surface))' }}">
                                    <td style="padding:11px 14px;text-align:center;font-weight:600;border-bottom:1px solid var(--border,#e5e7eb)">{{ $row[0] }}</td>
                                    <td style="padding:11px 14px;text-align:right;border-bottom:1px solid var(--border,#e5e7eb)">{{ $row[1] }}</td>
                                    <td style="padding:11px 14px;text-align:right;border-bottom:1px solid var(--border,#e5e7eb)">{{ $row[2] }}</td>
                                    <td style="padding:11px 14px;text-align:right;border-bottom:1px solid var(--border,#e5e7eb)">{{ $row[3] }}</td>
                                    <td style="padding:11px 14px;text-align:right;border-bottom:1px solid var(--border,#e5e7eb)">{{ $row[4] }}</td>
                                    <td style="padding:11px 14px;text-align:right;border-bottom:1px solid var(--border,#e5e7eb)">{{ $row[5] }}</td>
                                    <td style="padding:11px 14px;text-align:center;border-bottom:1px solid var(--border,#e5e7eb)">{{ $row[6] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
