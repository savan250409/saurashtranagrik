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
    </style>
@endpush

@section('content')
<!--Main Content Start-->
        <div class="main-content">
            <!--Departments & Information Desk Start-->
            <section class="wf100 p75-50  depart-info">
                <div class="container">
                    <div class="row text-center mb30 title-style-3">
                        <h3>Chairman's statement</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="h2-Mayor-msg">
                                <div class="Mayor-img">
                                    <img src="{{ asset('images/mayer2.png') }}" alt="" style="width:100%;" loading="lazy" decoding="async">
                                </div>
                                <div class="Mayor-txt"> 
                                    <p class="chairmans-statement-par">Celebrating 16 successful years today, our Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd., Bagasara, has achieved remarkable growth. Operating across various districts of Gujarat State, we proudly serve communities in Bagasara, Kunkavav, Bhesan, Chuda, Visavadar, Bhalgam, Amreli, Dhari, Ahmedabad, Junagadh, and Mendarda.</p>

<p>Our journey in the cooperative sector has been characterized by rapid progress. Fueled by transparent administration, an accessible system, and strong member relationships, our organization has consistently thrived. Through effective management of share funds, deposits, and diverse loan services, we have generated substantial growth and profitability. Our continuous &#39;A&#39; grade audit rating since inception reflects our unwavering commitment to excellence.</p>

<p>This sustained success is a testament to our dedication. We are proud to have been honored as one of the best associations in the state, and to have one of our members recognized as the best cooperative individual for their outstanding service and contribution.</p>

<p>In line with our commitment to serving members, we have introduced a safe deposit vault (locker) service at our Bhalgam branch, providing a secure place for valuable jewelry and important documents. In the near future, similar locker facilities will be available at our Bagasara, Chuda, and Kunkavav branches.</p>

<p>We are grateful for your continued support and look forward to a future of sustained growth and service. The vision of our organization is to serve our members and help them effectively resolve their queries and challenges.</p><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Departments & Information Desk End-->
        </div>
        <!--Main Content End-->
@endsection
