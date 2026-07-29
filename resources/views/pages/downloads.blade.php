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
        .download-box {
            text-align: center;
            margin-bottom: 30px;
        }
        .download-box a {
            text-decoration: none;
            color: #000;
            font-size: 18px;
        }
        .download-box a i {
            font-size: 24px;
            margin-right: 10px;
            vertical-align: middle;
        }
        .depart-info {
            margin-bottom: 200px; /* Adjust the margin as needed */
        }
    </style>
@endpush

@section('content')
<!--Main Content Start-->
        <div class="main-content">
            <!--Download Section Start-->
            <section class="wf100 p75-50 depart-info">
                <div class="container">
                    <div class="row text-center mb30 title-style-3">
                        <h3>Downloads</h3>
                    </div>
                    <div class="row">
                        @foreach ($downloads as $download)
                        <div class="col-md-6 col-sm-6">
                            <div class="download-box">
                                <a href="{{ asset($download->file) }}" download>
                                    <i class="fas fa-file-pdf"></i> {{ $download->title }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

            <!--Download Section End-->
        </div>
        <!--Main Content End-->
@endsection
