@extends('layouts.app')

@section('title', 'Events | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Events, ceremonies and community moments from the Mandali.')

@php
    $events = [
        ['images/events/DSC_2895.JPG', 'Chairman Mr. Anilbhai Vekariya, Director Mr. Deepakbhai Ambaliya, MD Mr. Jaysukhbhai Gondaliya, and the Board of Directors presented an honorary check to the Amreli family in recognition of the uncontested election of Mr. Dilipbhai Sanghani as the Chairman of IFFCO. Mr. Sanghani holds the responsibility for fostering cooperation throughout the entire nation.'],
        ['images/events/janjariya cheq arpan.JPG', 'Presenting cheque to beneficiaries under the Sabhasad Bima Yojana.'],
        ['images/events/IMG_3339.JPG', 'Introducing a bond offering of Rs. 11,000/- through the small C Diwadi, illuminating the household with the joyous occasion of welcoming a daughter. Congratulations on this blessed event!'],
        ['images/events/1.jpeg', 'In the company of the Central Minister of the Government of India, Mr. Parshotambhai Rupala sir, as well as the District BJP President, Mr. Kaushikbhai Vekariya, and Chairman, Mr. Anilbhai Vekariya.s'],
        ['images/events/2.jpeg', 'Chairman Mr. Anilbhai Vekaria is providing an informative report on the cooperative and service activities accomplished by our organization to Mr. Jagdishbhai Vishwakarma, State BJP General Minister, and Mr. Pareshbhai Lakhani, Ahmedabad City BJP General Secretary, in alignment with the motto "Saharkar Se Samriddhi Ki Aur."'],
    ];

    $gallery = [
        'images/events/IMG_5773.JPG', 'images/slider/2(4).jpg', 'images/events/IMG_3345.JPG',
        'images/events/IMG_6971.JPG', 'images/events/IMG_6587.JPG', 'images/events/IMG_9269.JPG',
        'images/events/IMG_6626.JPG', 'images/events/IMG_6988.JPG', 'images/events/chuda opening.JPG',
        'images/events/BSP_0908.JPG', 'images/events/IMG_0295.JPG', 'images/events/BSP_0937.JPG',
        'images/events/BSP_10355.JPG', 'images/events/IMG_1014.JPG', 'images/events/BSP_0792.JPG',
        'images/events/BSP_0945.JPG', 'images/events/IMG_3192.JPG', 'images/events/IMG_0273.JPG',
        'images/events/IMG_94011.JPG', 'images/events/IMG_9351.JPG', 'images/events/IMG_9806.JPG',
        'images/events/IMG_9989.JPG',
    ];
@endphp

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Events</p>
            <h1>Events</h1>
            <p>Moments from our work in the community.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="grid grid--3 reveal-group">
                @foreach ($events as [$image, $text])
                    <article class="card card--hover">
                        <img src="{{ asset($image) }}" alt="" loading="lazy" decoding="async"
                             style="aspect-ratio:4/3;object-fit:cover;width:100%">
                        <div class="card-body">
                            <p style="color:var(--text-muted);font-size:.9rem">{{ $text }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow">Photos</span>
                <h2>Gallery</h2>
            </div>
            <div class="gallery reveal-group">
                @foreach ($gallery as $image)
                    <a href="{{ asset($image) }}" target="_blank" rel="noopener" aria-label="Open photo {{ $loop->iteration }}">
                        <img src="{{ asset($image) }}" alt="" loading="lazy" decoding="async">
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
