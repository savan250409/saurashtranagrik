@extends('layouts.app')

@section('title', 'Shree Saurastra Nagrik Sharafi Mandali LTD')

@push('head')
<link href="{{ asset('css/event.css') }}" rel="stylesheet">
@endpush

@push('styles')
<style type="text/css">
        table {
            width: 100%;
        }
        table th, table td {
            border: 1px solid;
            padding: 10px;
            color: black;
        }
    </style>
@endpush

@section('content')
<!--Main Content Start-->
        <div class="main-content">
            <!--Departments & Information Desk Start-->
            <section class="pt-5 depart-info">
                <div class="container">
                    <div class="row text-center mb30 title-style-3">
                        <h3 class="pb-0 mb-0">Events</h3>
                    </div>
                </div>
            </section>
            <div class="events-wrapper events-listing">
                <div class="container">
                    <div class="row">
                        <div class="main">
                            <ul class="cards">
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/DSC_2895.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                        <div class="card_content">
                                            <div class="card_text">
                                                <!-- <span class="note">Seasonal.</span> -->
                                                <p>Chairman Mr. Anilbhai Vekariya, Director Mr. Deepakbhai Ambaliya, MD Mr. Jaysukhbhai Gondaliya, and the Board of Directors presented an honorary check to the Amreli family in recognition of the uncontested election of Mr. Dilipbhai Sanghani as the Chairman of IFFCO. Mr. Sanghani holds the responsibility for fostering cooperation throughout the entire nation.  </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/janjariya cheq arpan.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                        <div class="card_content">
                                            <div class="card_text">
                                                <!-- <span class="note">Seasonal.</span> -->
                                                <p>Presenting cheque to beneficiaries under the Sabhasad Bima Yojana.  </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_3339.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                        <div class="card_content">
                                            <div class="card_text">
                                                <!-- <span class="note">Seasonal.</span> -->
                                                <p>Introducing a bond offering of Rs. 11,000/- through the small C Diwadi, illuminating the household with the joyous occasion of welcoming a daughter. Congratulations on this blessed event!  </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/1.jpeg') }}" alt="" loading="lazy" decoding="async"></div>
                                        <div class="card_content">
                                            <div class="card_text">
                                                <!-- <span class="note">Seasonal.</span> -->
                                                <p>In the company of the Central Minister of the Government of India, Mr. Parshotambhai Rupala sir, as well as the District BJP President, Mr. Kaushikbhai Vekariya, and Chairman, Mr. Anilbhai Vekariya.s</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/2.jpeg') }}" alt="" loading="lazy" decoding="async"></div>
                                        <div class="card_content">
                                            <div class="card_text">
                                                <!-- <span class="note">Seasonal.</span> -->
                                                <p>Chairman Mr. Anilbhai Vekaria is providing an informative report on the cooperative and service activities accomplished by our organization to Mr. Jagdishbhai Vishwakarma, State BJP General Minister, and Mr. Pareshbhai Lakhani, Ahmedabad City BJP General Secretary, in alignment with the motto "Saharkar Se Samriddhi Ki Aur."  </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <section class="pt-5 depart-info" style="background: #fafafa;">
                <div class="container">
                    <div class="row text-center mb30 title-style-3">
                        <h3 class="pb-0 mb-0">Gallery</h3>
                    </div>
                </div>
            </section>
            <div class="events-wrapper events-listing pt-2">
                <div class="container">
                    <div class="row m-0">
                        <div class="main">
                            <ul class="cards">
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_5773.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                 <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/slider/2(4).jpg') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_3345.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_6971.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_6587.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_9269.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_6626.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_6988.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/chuda opening.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/BSP_0908.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_0295.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/BSP_0937.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/BSP_10355.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_1014.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/BSP_0792.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/BSP_0945.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card w-100" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_3192.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_0273.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_94011.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_9351.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_9806.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                                <li class="cards_item">
                                    <div class="card" tabindex="0">
                                        <div class="card_image"><img src="{{ asset('images/events/IMG_9989.JPG') }}" alt="" loading="lazy" decoding="async"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Events End--> 
            </div>
            <!--Departments & Information Desk End-->
        </div>
        <!--Main Content End-->
@endsection
