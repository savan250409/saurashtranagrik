@extends('layouts.app')

@section('title', 'Shree Saurastra Nagrik Sharafi Mandali LTD')

@push('styles')
<style type="text/css">
        /* ---- Equal-height grid with gutters ---- */
        .manager-row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
        }
        .manager-row > [class*="col-"] {
            display: flex;
            padding: 15px;
            flex: 0 0 50%;
            max-width: 50%;
        }
        /* Full width stacking on small phones */
        @media (max-width: 575px) {
            .manager-row {
                margin-left: -8px;
                margin-right: -8px;
            }
            .manager-row > [class*="col-"] {
                flex: 0 0 100%;
                max-width: 100%;
                padding: 8px;
            }
        }

        /* ---- Card ---- */
        .department-box {
            position: relative;
            width: 100%;
            min-height: 170px;
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

        /* ---- Header bar with icon ---- */
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
            content: "\f0b1"; /* briefcase */
            font-family: "FontAwesome"; /* the bundled all.css declares this family name */
            font-weight: 900;
            font-size: 16px;
            margin-right: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.22);
        }
        .branch-mgr .department-box h6::before {
            content: "\f3c5"; /* map-marker-alt */
        }

        /* ---- Body ---- */
        .manager-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 18px 22px;
            font-family: 'Montserrat';
        }
        .manager-body p {
            margin: 0 0 10px;
            color: #fff;
            font-size: 15px;
            line-height: 1.5;
            display: flex;
            align-items: center;
        }
        .manager-body p:last-child {
            margin-bottom: 0;
        }
        .manager-body p i {
            flex: 0 0 auto;
            width: 22px;
            margin-right: 12px;
            font-size: 15px;
            text-align: center;
            opacity: 0.95;
        }
        .manager-body .name-line {
            font-weight: 600;
            font-size: 16px;
        }
        .manager-body .contact-line a {
            color: #fff;
            text-decoration: none;
        }
        .manager-body .contact-line a:hover {
            text-decoration: underline;
        }
        @media (max-width: 575px) {
            .department-box {
                min-height: auto;
            }
            .department-box h6 {
                font-size: 16px;
                padding: 14px 16px;
            }
            .manager-body {
                padding: 16px;
            }
        }
	</style>
@endpush

@section('content')
<!--Main Content Start-->

<div class="main-content"><!--Departments & Information Desk Start-->
<section class="wf100 p75-50  depart-info">
<div class="container">
<div class="row text-center mb30 title-style-3">
<h3>Managers</h3>
</div>

<div class="row manager-row">
@foreach ($headOfficeManagers as $manager)
<div class="col-md-6 col-sm-6">
<div class="department-box mb30 {{ $manager->color_class }}">
<h6>{{ $manager->designation }}</h6>
<div class="manager-body">
	<p class="name-line"><i class="fas fa-user-tie"></i><span>{{ $manager->name }}</span></p>
@if ($manager->phone)
	<p class="contact-line"><i class="fas fa-phone"></i><a href="tel:{{ preg_replace('/\D+/', '', $manager->phone) }}">{{ $manager->phone }}</a></p>
@endif
</div>
</div>
</div>
@endforeach
                    </div>

<hr />
<div class="row text-center mb30 title-style-3">
<h3>Branch Managers</h3>
</div>
<div class="row manager-row branch-mgr">
@foreach ($branchManagers as $manager)
<div class="col-md-6 col-sm-6">
<div class="department-box mb30 {{ $manager->color_class }}">
<h6>{{ $manager->designation }}</h6>
<div class="manager-body">
	<p class="name-line"><i class="fas fa-user"></i><span>{{ $manager->name }}</span></p>
@if ($manager->phone)
	<p class="contact-line"><i class="fas fa-phone"></i><a href="tel:{{ preg_replace('/\D+/', '', $manager->phone) }}">{{ $manager->phone }}</a></p>
@endif
</div>
</div>
</div>
@endforeach
                    </div>
</div>
</section>
<!--Departments & Information Desk End--></div>
<!--Main Content End-->
@endsection
