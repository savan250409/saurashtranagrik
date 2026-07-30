@extends('layouts.app')

@section('title', 'Contact Us | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Get in touch with Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd. - send us a message and we will get back to you.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Contact Us</p>
            <h1>Contact Us</h1>
            <p>Have a question about deposits, loans or membership? Send us a message.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="contact-grid">
                <aside class="contact-info reveal">
                    <h2>Get in touch</h2>
                    <p>Reach out directly, or use the form and we'll reply by email.</p>

                    <ul class="contact-info__list">
                        <li>
                            <span class="contact-info__icon">@include('partials.icon', ['name' => 'mail'])</span>
                            <a href="mailto:{{ config('site.contact.email') }}">{{ config('site.contact.email') }}</a>
                        </li>
                        <li>
                            <span class="contact-info__icon">@include('partials.icon', ['name' => 'phone'])</span>
                            <a href="tel:{{ preg_replace('/\D+/', '', config('site.contact.phone')) }}">{{ config('site.contact.phone') }}</a>
                        </li>
                    </ul>

                    <div class="footer-social" style="margin-top:22px">
                        <a href="{{ config('site.contact.social.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram">
                            @include('partials.icon', ['name' => 'instagram'])
                        </a>
                        <a href="{{ config('site.contact.social.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook">
                            @include('partials.icon', ['name' => 'facebook'])
                        </a>
                    </div>

                    <a class="btn btn-ghost contact-info__branches" href="{{ route('branches') }}">
                        Find a branch near you @include('partials.icon', ['name' => 'arrow-right'])
                    </a>
                </aside>

                <div class="contact-form-card reveal">
                    @if (session('status'))
                        <div class="alert alert-ok" role="status">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('contact-us.send') }}" class="contact-form" novalidate>
                        @csrf

                        {{-- Honeypot: hidden from real visitors, often filled in by bots. --}}
                        <div class="contact-form__trap" aria-hidden="true">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="field-grid">
                            <div class="field">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="120" autocomplete="name">
                                @error('name') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="field">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="190" autocomplete="email">
                                @error('email') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="field-grid">
                            <div class="field">
                                <label for="phone">Phone <span class="field-optional">(optional)</span></label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" maxlength="20" autocomplete="tel">
                                @error('phone') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="field">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required maxlength="150">
                                @error('subject') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="6" required maxlength="3000">{{ old('message') }}</textarea>
                            @error('message') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Send message @include('partials.icon', ['name' => 'arrow-right'])
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
