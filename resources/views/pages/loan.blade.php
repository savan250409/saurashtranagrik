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
        .depart-info .deprt-icon-box {
            height: auto;
        }
        .depart-info .deprt-icon-box img {
            width: 65px;
            height: 65px;
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
                        <h3>Loan</h3>
                        <h6>Following are the attractive loans offered by our association to our dear members with interest rate</h6>
                    </div>
                    <div class="row loan">
                        @foreach ($loans as $rate)
                        <div class="col-md-6 col-sm-6">
                            <div class="deprt-icon-box d-flex align-items-center justify-content-space-between p-5">
                                <div class="d-flex align-items-center">
                                    @if ($rate->icon)
                                    <img src="{{ asset($rate->icon) }}" alt="" class="p-0 m-0" width="20" loading="lazy" decoding="async">
                                    @endif
                                    <h6 class="p-0 m-0 ms-3"> <a href="javascript:;">{{ $rate->title }}</a> </h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h6 class="p-0 m-0 ms-3 bg-primary p-1" style="border-radius: 50rem;"> {{ $rate->rate }} </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!--Departments & Information Desk End-->
        </div>
        <!--Main Content End-->
@endsection
