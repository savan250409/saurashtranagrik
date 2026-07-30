@extends('layouts.app')

@section('title', 'Downloads | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Download the balance sheets and profit and loss accounts of the Mandali.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Downloads</p>
            <h1>Downloads</h1>
            <p>Published accounts and statements, available as PDF.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="doc-grid reveal-group">
                @foreach ($downloads as $download)
                    @php
                        // Format and size are read from the file on disk, so they
                        // cannot drift from what the visitor actually receives.
                        $path = public_path($download->file);
                        $format = strtoupper(pathinfo($download->file, PATHINFO_EXTENSION)) ?: 'FILE';
                        $bytes = is_file($path) ? filesize($path) : null;
                        $size = $bytes === null
                            ? null
                            : ($bytes >= 1048576
                                ? number_format($bytes / 1048576, 1).' MB'
                                : max(1, (int) round($bytes / 1024)).' KB');
                    @endphp

                    <a class="doc-card" href="{{ asset($download->file) }}" download>
                        <span class="doc-card__icon" aria-hidden="true">
                            @include('partials.icon', ['name' => 'file'])
                        </span>

                        <span class="doc-card__body">
                            <span class="doc-card__title">{{ $download->title }}</span>
                            <span class="doc-card__meta">
                                {{ $format }}@if ($size) &middot; {{ $size }} @endif
                            </span>
                        </span>

                        <span class="doc-card__go">@include('partials.icon', ['name' => 'download'])</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
