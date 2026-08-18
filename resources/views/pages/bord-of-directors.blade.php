@extends('layouts.app')

@section('title', 'Board of Directors | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'The board of directors and branch board members of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.')

@php
    // Branch board rosters - shared with each branch's own detail page via
    // config/site.php, so the two can never drift out of sync.
    $boardGroups = config('site.board_groups');

    /**
     * Initials for the avatar chip, ignoring honorifics so
     * "Shri Dr. Hiteshbhai Bodar" reads as "HB" rather than "SB".
     */
    $initials = function (string $name): string {
        $clean = $name;
        // run twice: names like "Shri Dr. Sanjaybhai ..." stack two honorifics
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
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Board of Directors</p>
            <h1>Board of Directors</h1>
            <p>The elected members who guide the Mandali.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="grid grid--4 reveal-group">
                @foreach ($directors as $director)
                    <article class="card card--hover person">
                        <div class="person-photo">
                            <img src="{{ asset($director->photo) }}" alt="{{ $director->name }}"
                                 loading="lazy" decoding="async">
                        </div>
                        <div class="card-body">
                            <h3>{{ $director->name }}</h3>
                            <span class="role">{{ $director->designation }}</span>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow">Branch boards</span>
                <h2>Advisory Board Members</h2>
                <p>Board members appointed at each branch. Pick a branch to see its roster.</p>
            </div>

            <div class="reveal">
                <div class="roster-tabs" role="tablist" aria-label="Branches">
                    @foreach ($boardGroups as $group)
                        <button type="button" class="roster-tab" role="tab"
                                id="roster-tab-{{ $loop->index }}"
                                aria-controls="roster-panel-{{ $loop->index }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                tabindex="{{ $loop->first ? '0' : '-1' }}">
                            {{ $group['branch'] }}
                            <span class="count">{{ count($group['members']) }}</span>
                        </button>
                    @endforeach
                </div>

                @foreach ($boardGroups as $group)
                    <div @class(['card', 'roster-panel', 'is-active' => $loop->first])
                         role="tabpanel"
                         id="roster-panel-{{ $loop->index }}"
                         aria-labelledby="roster-tab-{{ $loop->index }}"
                         tabindex="0">
                        <div class="card-body">
                            <div class="roster-head">
                                {{-- the full original heading is kept verbatim --}}
                                <h3>{{ $group['heading'] }}</h3>
                                <span class="roster-count">{{ count($group['members']) }} members</span>
                            </div>
                            <div class="roster-list">
                                @foreach ($group['members'] as [$name, $role])
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
                @endforeach
            </div>
        </div>
    </section>
@endsection
