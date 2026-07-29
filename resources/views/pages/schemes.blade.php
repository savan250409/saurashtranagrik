@extends('layouts.app')

@section('title', 'Shree Saurastra Nagrik Sharafi Mandali LTD')

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
        .deprt-icon-box:hover {
            padding: 40px;
        }
        .depart-info .deprt-icon-box {
            min-height: 375px;
            max-height: 500px;
            height: auto;
        }
        .depart-info .deprt-icon-box img {
            width: 372px;
        }
        .depart-info .deprt-icon-box h6 a {
            color: #d94148;
        }
        @media only screen and (min-width: 992px) and (max-width: 1200px) {
            .depart-info .deprt-icon-box {
                max-height: 375px;
            }
        }
        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .depart-info .deprt-icon-box {
                max-height: 0;
            }
            .depart-info .deprt-icon-box img {
                    width: 100%;
            }
        }
        @media only screen and (min-width: 320px) and (max-width: 768px) {
            .depart-info .deprt-icon-box {
                min-height: auto;
                max-height: 100%;
            }
            .depart-info .deprt-icon-box img {
                    width: 100%;
            }
        }
    </style>
@endpush

@section('content')
<!--Main Content Start-->
        <div class="main-content">
            <!--Departments & Information Desk Start-->
            <section class="wf100 p75-50  depart-info">
                <div class="container">
                    <div class="row text-center mb30 title-style-3">
                        <h3>Schemes</h3>
                    </div>
                    <div class="row">
                        <!--Icon Box Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/scheme/Sri Swami Vivekananda Sabhasad Insurance Scheme.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Sri Swami Vivekananda Sabhasad Insurance Scheme</a> </h6>
                                <p class="fw-bold">In this insurance plan, the Sabhasad only one time can join the scheme by paying a premium of Rs. 2000/- Maximum age is up to 50 years.<br>
                                After the death of the Sabhasad, the heir appointed by him shall receive Rs. 25000/- will be given in 2 installments.<br>
                                The designated heir has to submit the necessary documents.</p>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/scheme/girl child scheme.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Girl Child Scheme</a> </h6>
                                <p class="fw-bold">Congratulations on the birth of a child<br>
                                Two houses, unoccupied, small, detached, unfurnished, offering a bond of Rs. 11,000.</p>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/scheme/Samarth Pension Scheme.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Samarth Pension Scheme</a> </h6>
                                <p class="fw-bold">Be safe and sound by pushing your hard times away with Samarth Pension Yojana.<br>
                                9% per month on the given amount and fixed monthly pension melvi.<br>
                                The designated heir has to submit the necessary documents.</p>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/scheme/Daily Savings Plan.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Daily Savings Plan</a> </h6>
                                <p class="fw-bold">From your designated place of business <br>
                                Daily (daily) amount by our employee <br>
                                will be taken.</p>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/scheme/Quick and easy facility for loan.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Quick and easy facility for loan</a> </h6>
                                <p class="fw-bold">For the purpose of getting fast and easy credit for the members of Bagsara area, the credit can be directly deposited in your account through RTGS, so that the members can save time and use money quickly.</p>
                            </div>
                        </div>
                        <!--Icon Box End-->
                    </div>
                </div>
            </section>
            <!--Departments & Information Desk End-->
        </div>
        <!--Main Content End-->
@endsection
