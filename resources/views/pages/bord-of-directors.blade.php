@extends('layouts.app')

@section('title', 'Board of Directors | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'The board of directors and branch board members of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.')

@php
    // Branch board rosters - static content carried over from the original page.
    $boardGroups = [
        ['Ad. Board Member ( Bagasara Branch )', [
            ['Shri Himmarbhai Khetani', 'Board Member'],
            ['Shri Piyushbhai Bharakhada', 'Board Member'],
            ['Shri Keyurbhai Dholariya', 'Board Member'],
            ['Shri Ketanbhai Dixit', 'Board Member'],
            ['Shri Jentibhai Makvana', 'Board Member'],
            ['Shri Dr. Sanjaybhai Sorathiya', 'Board Member'],
            ['Shri Dineshbhai Kateshiya', 'Board Member'],
        ]],
        ['Ad. Board Member ( Kunkavav Branch )', [
            ['Shri Bharatbhai Dhirubhai Kanani', 'Branch MD'],
            ['Shri Babubhai Kotadiya', 'Board Member'],
            ['Shri Viththalbhai Korat', 'Board Member'],
            ['Shri Dr.Hiteshbhai Bodar', 'Board Member'],
            ['Shri Priteshbhai Dobariya', 'Board Member'],
            ['Shri parshotambhai Rakholiya', 'Board Member'],
            ['Shri Ritaben Bhuva', 'Board Member'],
        ]],
        ['Ad. Board Member ( Bhesan Branch )', [
            ['Shri Jaysukhbhai Gondaliya', 'Branch MD'],
            ['Shri Bhaveshbhai Trapasiya', 'Board Member'],
            ['Shri Prakashbhai Savaliya', 'Board Member'],
            ['Shri Ramjibhai Dobariya', 'Board Member'],
            ['Shri Sonalben Sojitra', 'Board Member'],
            ['Shri Pradipbhai Kanpariya', 'Board Member'],
            ['Shri Bharatbhai Sarkhareliya', 'Board Member'],
        ]],
        ['Ad. Board Member ( Amreli Branch )', [
            ['Shri Divyeshbhai Vekaria', 'Branch MD'],
            ['Shri Sanjaybhai Malaviya', 'Board Member'],
            ['Shri Jaysukhbhai Sorathiya', 'Board Member'],
            ['Shri Dipakbhai Dhanani', 'Board Member'],
            ['Shri Mukeshbhai Korat', 'Board Member'],
            ['Shri Arunbhai Der', 'Board Member'],
            ['Shri Hiteshbhai Khanesha', 'Board Member'],
            ['Shri Dharmeshbhai Visavaliya', 'Board Member'],
        ]],
        ['Ad. Board Member ( Visavadar Branch )', [
            ['Shri Prakashbhai Savaliya', 'Branch MD'],
            ['Shri Hasubhai Rabadiya', 'Board Member'],
            ['Shri Mohitbhai Malaviya', 'Board Member'],
            ['Shri Rinaben Bhaliya', 'Board Member'],
            ['Shri Chimanbhai Rafaliya', 'Board Member'],
            ['Shri Hirenbhai Sojitra', 'Board Member'],
            ['Shri Manishaben Lakhani', 'Board Member'],
        ]],
        ['Ad. Board Member ( Bhalgam Branch )', [
            ['Shri Dipakbhai Ambaliya', 'Branch MD'],
            ['Shri Nitinbhai Kotadiya', 'Board Member'],
            ['Shri Bhupatbhai Lokadiya', 'Board Member'],
            ['Shri Manishbhai Pansuriya', 'Board Member'],
            ['Shri Jyotsanaben Godhani', 'Board Member'],
            ['Shri Dayaben Vaghasiya', 'Board Member'],
        ]],
        ['Ad. Board Member ( Chuda Branch )', [
            ['Shri Arunaben Barariya', 'Branch MD'],
            ['Shri Jaysukhbhai Vaghasiya', 'Board Member'],
            ['Shri Sonalben Gajipara', 'Board Member'],
            ['Shri Sangitaben Dobariya', 'Board Member'],
            ['Shri Bharatbhai Korat', 'Board Member'],
            ['Shri Ghanshyambhai Patoliya', 'Board Member'],
            ['Shri Dalsukhbhai Ansodariya', 'Board Member'],
            ['Shri Kishanbhai Kathiriya', 'Board Member'],
            ['Shri Gordhanbhai Bhut', 'Board Member'],
        ]],
        ['Ad. Board Member ( Dhari Branch )', [
            ['Shri Pravinbhai Kasvala', 'Branch MD'],
            ['Shri Vinubhai Katharotiya', 'Board Member'],
            ['Shri Bhavsukhbhai Vaghela', 'Board Member'],
            ['Shri Sureshbhai Antala', 'Board Member'],
            ['Shri Hemalbhai Jaysval', 'Board Member'],
            ['Shri Mansukhbhai Vastani', 'Board Member'],
            ['Shri Anitaben Shiroya', 'Board Member'],
        ]],
        ['Ad. Board Member ( Ahmedabad Branch )', [
            ['Shri Sajanbhai Pethani', 'Board Member'],
            ['Shri Vipulbhai Sangani', 'Board Member'],
            ['Shri Manojbhai Savaliya', 'Board Member'],
            ['Shri Jigneshbhai Savaliya', 'Board Member'],
            ['Shri Prakashbhai Gevariya', 'Board Member'],
            ['Shri Bhaveshbhai Tanti', 'Board Member'],
            ['Shri Sagarbhai Hirpara', 'Board Member'],
        ]],
    ];

    /**
     * Short tab label from a full heading:
     * "Ad. Board Member ( Bagasara Branch )" -> "Bagasara".
     * The full heading is still rendered inside the panel, so no wording is lost.
     */
    $branchName = function (string $heading): string {
        if (preg_match('/\(([^)]+)\)/', $heading, $m)) {
            return trim(preg_replace('/\s*Branch\s*$/i', '', trim($m[1])));
        }

        return $heading;
    };

    /**
     * Initials for the avatar chip, ignoring honorifics so
     * "Shri Dr.Hiteshbhai Bodar" reads as "HB" rather than "SB".
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
                    @foreach ($boardGroups as [$heading, $people])
                        <button type="button" class="roster-tab" role="tab"
                                id="roster-tab-{{ $loop->index }}"
                                aria-controls="roster-panel-{{ $loop->index }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                tabindex="{{ $loop->first ? '0' : '-1' }}">
                            {{ $branchName($heading) }}
                            <span class="count">{{ count($people) }}</span>
                        </button>
                    @endforeach
                </div>

                @foreach ($boardGroups as [$heading, $people])
                    <div @class(['card', 'roster-panel', 'is-active' => $loop->first])
                         role="tabpanel"
                         id="roster-panel-{{ $loop->index }}"
                         aria-labelledby="roster-tab-{{ $loop->index }}"
                         tabindex="0">
                        <div class="card-body">
                            <div class="roster-head">
                                {{-- the full original heading is kept verbatim --}}
                                <h3>{{ $heading }}</h3>
                                <span class="roster-count">{{ count($people) }} members</span>
                            </div>
                            <div class="roster-list">
                                @foreach ($people as [$name, $role])
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
