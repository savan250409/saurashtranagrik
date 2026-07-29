@extends('layouts.app')

@section('title', 'Shree Saurastra Nagrik Sharafi Mandali Ltd.')

@push('head')
<link rel="preload" as="image" href="{{ asset('images/slider/2(1).JPG') }}">
<link rel="preload" as="image" href="{{ asset('images/logo-lg.png') }}">
<!--Rev Slider Start-->
<link rel="stylesheet" href="{{ asset('js/rev-slider/css/settings.css') }}" type='text/css' media='all' />
<link rel="stylesheet" href="{{ asset('js/rev-slider/css/layers.css') }}" type='text/css' media='all' />
<link rel="stylesheet" href="{{ asset('js/rev-slider/css/navigation.css') }}" type='text/css' media='all' />
<!--Rev Slider End-->
@endpush

@push('styles')
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            overflow-y: auto; /* Allow vertical scrolling */
        }
        #video-popup {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0; /* Initially hidden */
            visibility: hidden; /* Initially hidden */
            transition: opacity 0.3s ease, visibility 0.3s ease; /* Smooth transition */
        }
        #video-popup.active {
            opacity: 1; /* Visible */
            visibility: visible; /* Visible */
        }
        #video-popup video {
            max-width: 90%;
            max-height: 90%;
        }
        #close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }
        .video-gallery-box {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 30px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s ease;
        }
        .video-gallery-box:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }
        .video-gallery-box video {
            width: 100%;
            height: 220px;
            display: block;
            border-radius: 4px;
            background: #000;
            cursor: pointer;
        }
        /* Mobile slider fix: images use bgfit "contain" which makes them
           tiny on narrow screens - switch to "cover" and enforce a
           minimum slider height on mobile */
        @media (max-width: 767px) {
            .main-slider .rev_slider .tp-bgimg,
            .main-slider .rev_slider .slotholder .tp-bgimg,
            .main-slider .rev_slider .defaultimg {
                background-size: cover !important;
                background-position: center center !important;
            }
            .main-slider .rev_slider_wrapper,
            .main-slider .fullwidthbanner-container,
            .main-slider .rev_slider,
            .main-slider .forcefullwidth_wrapper_tp_banner {
                min-height: 240px !important;
            }
        }
    </style>
@endpush

@section('prebody')
<div id="video-popup">
        <span id="close-btn" onclick="closePopup()">&times;</span>
        <video id="popup-video" controls autoplay>
            <source src="{{ asset('media/v2.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
@endsection

@section('content')
<!--Slider Start-->
        <div class="main-slider wf100">
            <div class="home2-slider rev_slider_wrapper">
                <!-- START REVOLUTION SLIDER -->
                <div class="rev_slider_wrapper fullwidthbanner-container">
                    <div id="rev-slider2" class="rev_slider fullwidthabanner">
                        <ul>
                            @foreach ($heroSlides as $slide)
                            <li data-transition="{{ $slide->transition }}"> <img src="{{ asset($slide->image) }}" alt="" width="1920" height="685" @if ($loop->first) fetchpriority="high" decoding="async" @else loading="lazy" decoding="async" @endif data-bgposition="top center" data-bgfit="contain" data-bgrepeat="no-repeat" data-bgparallax="1">
                                <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top" data-voffset="175" data-transform_idle="o:1;" data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END REVOLUTION SLIDER -->

            </div>
        </div>
        <!--Slider End-->
        <!--Main Content Start-->
        <div class="main-content">
            <section class="wf100 pt-5 pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="h2-Mayor-msg">
                                <div class="Mayor-img">
                                    <img src="{{ asset('images/mayer2.png') }}" alt="" loading="lazy" decoding="async">
                                </div>
                                <div class="Mayor-txt"> 
                                    <h4 class="chairmans-statement-title">Chairman's statement</h4>
                                    <p class="chairmans-statement-par" style="word-wrap: break-word;">Celebrating 16 successful years today, our Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd., Bagasara, has achieved remarkable growth. Operating across various districts of Gujarat State, we proudly serve communities in Bagasara, Kunkavav, Bhesan, Chuda, Visavadar, Bhalgam, Amreli, Dhari, Ahmedabad, Junagadh, and Mendarda.</p>
                                    <a href="{{ route('statement') }}">Read More</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Departments & Information Desk Start-->
            <section class="wf100 p75-50  depart-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="title-style-3">
                                <h3>Sections and information</h3>
                                <!-- <p>Read the News Updates and Articles about Government </p> -->
                            </div>
                            <div class="row">
                                <!--Icon Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img src="{{ asset('images/deprticon1.png') }}" alt="" loading="lazy" decoding="async">
                                        <h6> <a href="{{ route('loan') }}">Interest rate and savings plan</a> </h6>
                                        <a class="rm" href="{{ route('deposit') }}">Read More</a> </div>
                                </div>
                                <!--Icon Box End-->
                                <!--Icon Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img src="{{ asset('images/deprticon2.png') }}" alt="" loading="lazy" decoding="async">
                                        <h6> <a href="{{ route('profit-loss') }}">Profit loss account</a> </h6>
                                        <a class="rm" href="{{ route('profit-loss') }}">Read More</a> </div>
                                </div>
                                <!--Icon Box End-->
                                <!--Icon Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img src="{{ asset('images/Activity.png') }}" alt="" loading="lazy" decoding="async">
                                        <h6> <a href="{{ route('activity') }}">Activities</a> </h6>
                                        <a class="rm" href="{{ route('activity') }}">Read More</a> </div>
                                </div>
                                <!--Icon Box End-->
                                <!--Icon Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img src="{{ asset('images/Pregress Report.png') }}" alt="" loading="lazy" decoding="async">
                                        <h6> <a href="{{ route('progress-report') }}">Progress Report </a> </h6>
                                        <a class="rm" href="{{ route('progress-report') }}">Read More</a> </div>
                                </div>
                                <!--Icon Box End-->
                                <!--Icon Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img src="{{ asset('images/deprticon5.png') }}" alt="" loading="lazy" decoding="async">
                                        <h6> <a href="{{ route('paku-sarvaiyu') }}">Balance Sheet</a> </h6>
                                        <a class="rm" href="{{ route('paku-sarvaiyu') }}">Read More</a> </div>
                                </div>
                                <!--Icon Box End-->
                                <!--Icon Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img src="{{ asset('images/deprticon6.png') }}" alt="" loading="lazy" decoding="async">
                                        <h6> <a href="{{ route('event') }}">Events</a> </h6>
                                        <a class="rm" href="{{ route('event') }}">Read More</a> </div>
                                </div>
                                <!--Icon Box End-->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="emergency-info">
                                <h5>Branch Associate</h5>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!--Panel Start-->
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Amreli </a> </h6>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul>
                                                    <li> <i class="fas fa-user-tie"></i>Shri Divyeshbhai Vekariya - Branch MD</li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Sanjaybhai Malaviya</li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Jaysukhbhai Sorathiya</li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Dipakbhai Dhanani</li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Mukeshbhai Korat </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Arunbhai Der</li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Hiteshbhai Khaneshar</li>                                                                             <li> <i class="fas fa-user-tie"></i>  Shri Dharmeshbhai Visavaliya</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Panel End-->
                                    <!--Panel Start-->
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id="heading2">
                                            <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2"> Chuda </a> </h6>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                            <div class="panel-body">
                                                <ul>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Arunaben Barariya -Branch MD </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Jaysukhbhai Vaghasiya  </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Sonalben Gajipara </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Sangitaben Dobariya </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Bharatbhai Korat </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Ghanshyambhai Patoliya </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Dalsukhbhai Asodariya  </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Kishanbhai Kathiriya </li>
                                                    <li> <i class="fas fa-user-tie"></i> Shri Gordhanbhai Bhut </li>
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Panel End-->
                                    <!--Panel Start-->
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3"> Visavadar
                                        </a> </h6>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                                            <div class="panel-body">
                                                <ul>
                                        <li> <i class="fas fa-user-tie"></i> Shri Prakashbhai Savaliya - Branch MD </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Hasubhai Rabadiya </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Mohitbhai Malaviya </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Rinaben Bhaliya </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Chimanbhai Rafaliya </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Hirenbhai Sojitra </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Manishaben Lakhani </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Panel End-->
                                    <!--Panel Start-->
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id="heading4">
                                            <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4"> Bhalgam </a> </h6>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                            <div class="panel-body">
                                                <ul>
                                        <li> <i class="fas fa-user-tie"></i> Shri Dipakbhai Ambaliya - Branch MD </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Nitinbhai Kotadiya </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Bhupatbhai Lokadiya </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Manishbhai Pansuriya </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Jyotsanaben Godhani </li>
                                        <li> <i class="fas fa-user-tie"></i> Shri Dayaben Vaghasiya </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Panel End-->
                                </div>
                            </div>
                            <a href="{{ route('branches') }}" class="jobs-link">Branch Details</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--Departments & Information Desk End-->
            <!--Video Gallery Start-->
            <section class="wf100 p75-50 depart-info">
                <div class="container">
                    <div class="row text-center mb30 title-style-3">
                        <h3>Video Gallery</h3>
                    </div>
                    <div class="row">
                        @foreach ($homeVideos as $video)
                        <!--Video Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="video-gallery-box">
                                <video controls preload="metadata">
                                    <source src="{{ asset($video->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <!--Video Box End-->
                        @endforeach
                    </div>
                </div>
            </section>
            <!--Video Gallery End-->
        </div>
        <!--Main Content End-->
@endsection

@push('scripts')
<script>
        function closePopup() {
            var videoPopup = document.getElementById('video-popup');
            videoPopup.classList.remove('active'); // Hide popup
            document.getElementById('popup-video').pause(); // Pause video
            // Smoothly scroll back to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
            // Allow scrolling again by removing overflow hidden
            document.body.style.overflow = 'auto';
        }

        window.onload = function() {
            var videoPopup = document.getElementById('video-popup');
            videoPopup.classList.add('active'); // Show popup
            var video = document.getElementById('popup-video');
            video.muted = false;
            var playPromise = video.play();

            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    // Automatic playback started!
                    // Show playing UI.
                    video.muted = false;
                }).catch(error => {
                    // Auto-play was prevented
                    // Show a UI element to let the user manually start playback
                    console.log("Autoplay with sound failed. User interaction required.");
                });
            }
            // Prevent scrolling while video popup is active
            document.body.style.overflow = 'hidden';
        }

        // Video gallery: pause other videos when one starts playing
        document.addEventListener('play', function(e) {
            if (e.target.tagName === 'VIDEO' && e.target.id !== 'popup-video') {
                var videos = document.querySelectorAll('.video-gallery-box video');
                videos.forEach(function(v) {
                    if (v !== e.target) v.pause();
                });
            }
        }, true);
    </script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider.js') }}"></script>
{{-- All nine extensions must stay. Revolution auto-fetches any it considers
     missing from jsFileLocation + "extensions/", which is not where they live
     here, so dropping a tag makes the loader 404 and the slider never starts. --}}
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rev-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
@endpush
