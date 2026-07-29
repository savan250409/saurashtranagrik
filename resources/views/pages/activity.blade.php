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
            text-align: center;
        }
        .fw-bold {
            font-weight: bold;
        }
        .deprt-icon-box:hover {
            padding: 40px;
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
                        <h3>Activity</h3>
                    </div>
                    <div class="row">
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/member.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Share Member</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Fixes Deposit.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Fixes Deposit</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Special Fixed Deposit.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Special Fixed Deposit</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Monthly Deposit.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Monthly Deposit</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Reccuring Deposit.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Reccuring Deposit</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Running Saving.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Running Saving</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Daily Saving.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Daily Saving</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Mortgage Loan.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Mortgage Loan</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Gold Loan.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Gold Loan</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Jat-Jamingiri Loan.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Jat-Jamingiri Loan</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Mortgage CC.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Mortgage CC</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Gold CC.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Gold CC</a> </h6>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('images/Activity/Plaz Loan.png') }}" alt="" loading="lazy" decoding="async">
                                <h6> <a href="javascript:;">Plaz Loan</a> </h6>
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
