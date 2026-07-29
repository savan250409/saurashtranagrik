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
            <div class="grid grid--2 reveal-group">
                @foreach ($downloads as $download)
                    <a class="download-row" href="{{ asset($download->file) }}" download>
                        <span class="file-icon">@include('partials.icon', ['name' => 'file'])</span>
                        <span>{{ $download->title }}</span>
                        <span class="dl-arrow">@include('partials.icon', ['name' => 'download'])</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
