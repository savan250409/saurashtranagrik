@extends('layouts.app')

@section('title', 'Shree Saurastra Nagrik Sharafi Mandali LTD')

@push('styles')
<style type="text/css">
        /* ---- Equal-height grid with proper gutters ---- */
        .branch-row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
        }
        .branch-row > [class*="col-"] {
            display: flex;
            padding: 15px;
        }

        /* ---- Card ---- */
        .department-box {
            position: relative;
            width: 100%;
            min-height: 280px;
            height: 100%;
            margin-bottom: 0 !important;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }
        .department-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.28);
        }

        /* ---- Header bar with location icon ---- */
        .department-box h6 {
            margin: 0;
            padding: 16px 20px;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0.6px;
            color: #fff;
            background: rgba(0, 0, 0, 0.20);
            display: flex;
            align-items: center;
        }
        .department-box h6::before {
            content: "\f3c5"; /* map-marker-alt */
            font-family: "FontAwesome"; /* the bundled all.css declares this family name */
            font-weight: 900;
            font-size: 17px;
            margin-right: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.22);
        }

        /* ---- Address body ---- */
        .branch-body {
            flex: 1;
            padding: 20px 22px;
            font-family: 'Montserrat';
        }
        .branch-body p {
            margin: 0 0 14px;
            color: #fff;
            font-size: 14.5px;
            line-height: 1.55;
            display: flex;
            align-items: flex-start;
        }
        .branch-body p:last-child {
            margin-bottom: 0;
        }
        .branch-body p i {
            flex: 0 0 auto;
            width: 20px;
            margin-right: 12px;
            margin-top: 3px;
            font-size: 15px;
            text-align: center;
            color: #fff;
            opacity: 0.95;
        }
        .branch-body .contact-line {
            font-weight: 600;
            letter-spacing: 0.3px;
        }
        .branch-body .contact-line a {
            color: #fff;
            text-decoration: none;
        }
        .branch-body .contact-line a:hover {
            text-decoration: underline;
        }
        .branch-divider {
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.28);
            margin: 4px 0 14px;
        }

        @media (max-width: 575px) {
            .branch-row > [class*="col-"] {
                padding: 10px;
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
                        <h3>BRANCHES</h3>
                    </div>
                    <div class="row branch-row">
                        @foreach ($branches as $branch)
                        <div class="col-md-4 col-sm-4">
                            <div class="department-box mb30 {{ $branch->color_class }}">
                                <h6>{{ $branch->name }}</h6>
                                <div class="branch-body">
                                    @if ($branch->address)
                                    <p class="addr-line"><i class="fas fa-building"></i><span>{!! nl2br(e($branch->address)) !!}</span></p>
                                    @endif
                                    <hr class="branch-divider">
                                    @if ($branch->phone)
                                    <p class="contact-line"><i class="fas fa-phone"></i><a href="tel:{{ preg_replace('/\D+/', '', $branch->phone) }}">{{ $branch->phone }}</a></p>
                                    @endif
                                    @if ($branch->mobile)
                                    <p class="contact-line"><i class="fas fa-mobile-alt"></i><a href="tel:{{ preg_replace('/\D+/', '', $branch->mobile) }}">{{ $branch->mobile }}</a></p>
                                    @endif
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
