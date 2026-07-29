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
        table {
          border-collapse: collapse;
        }

        th, td {
          padding: 8px;
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
                        <h3>DEPOSIT</h3>
                        <h6>Deposit rates are effective from 1st february 2022</h6>
                    </div>
                    <div class="row loan">
                        @foreach ($depositRates as $rate)
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
                    @if ($depositRateFeatured)
                    <div class="row loan d-flex justify-content-center">
                        <!--Icon Box Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="deprt-icon-box d-flex align-items-center justify-content-space-between p-5">
                                <div class="d-flex align-items-center">
                                    @if ($depositRateFeatured->icon)
                                    <img src="{{ asset($depositRateFeatured->icon) }}" alt="" class="p-0 m-0" width="20" loading="lazy" decoding="async">
                                    @endif
                                    <h6 class="p-0 m-0 ms-3"> <a href="javascript:;">{{ $depositRateFeatured->title }}</a> </h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h6 class="p-0 m-0 ms-3 bg-primary p-1" style="border-radius: 50rem;"> {{ $depositRateFeatured->rate }} </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- <div class="row" style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tenure</th>
                                    <th>Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30 Days to 45 Days</td>
                                    <td>4%</td>
                                </tr>
                                <tr>
                                    <td>46 Days to 91 Days</td>
                                    <td>4.50%</td>
                                </tr>
                                <tr>
                                    <td>92 Days to 182 Days</td>
                                    <td>5%</td>
                                </tr>
                                <tr>
                                    <td>183 Days to 364 Days</td>
                                    <td>6%</td>
                                </tr>
                                <tr>
                                    <td>1 Year to 2 Years</td>
                                    <td>9%</td>
                                </tr>
                                <tr>
                                    <td>2 Years to 3 Years</td>
                                    <td>10.5%</td>
                                </tr>
                                <tr>
                                    <td>3 Years to 5 Years</td>
                                    <td>11%</td>
                                </tr>
                                <tr>
                                    <td>7 Years</td>
                                    <td>Double</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row pt-5 mt-3" style="overflow-x: auto;">
                        <table>
                            <tbody>
                                <tr>
                                    <td width="69.5%">Pension Scheme</td>
                                    <td width="30.5%">9%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
                    <div class="row text-center mt-5 pt-3 mb-0 title-style-3">
                        <h3 class="fa-2x">Recurring Deposit</h3>
                    </div>
                    <div class="row loan" style="display: flex;justify-content: center;flex-direction: row;flex-wrap: wrap;align-content: center;align-items: center;">
                        @foreach ($recurringDeposits as $rd)
                        <div class="col-md-4 col-md-6 col-sm-6 col-xs-11 mb-2">
                            <div class="card p-3 rounded-3">
                                <div class="row p-0 m-0 d-flex justify-content-center align-items-center">
                                    <h6 class="p-0 m-0 fw-bold">{{ $rd->term }}</h6>
                                    <h6 class="p-0 m-0 ms-3 bg-primary p-1" style="border-radius: 50rem;"> {{ $rd->rate }} </h6>
                                </div>
                                @foreach ($rd->lines() as $line)
                                <div class="row p-0 m-0 d-flex justify-content-space-between align-items-center {{ $loop->first ? ' pt-5' : 'pt-2 ' }}">
                                    <h6 class="p-0 m-0 w-100">{{ $line['amount'] }}</h6>
                                    <h6 class="p-0 m-0 w-100 text-center"><i class="fas fa-arrow-right"></i></h6>
                                    <h6 class="p-0 m-0 w-100 text-right">{{ $line['maturity'] }}</h6>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- <div class="row" style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Monthly <br> Instalments</th>
                                    <th style="text-align: center;">1 Year <br> 9%</th>
                                    <th style="text-align: center;">2 Years <br> 9.25%</th>
                                    <th style="text-align: center;">3 Years <br> 9.50%</th>
                                    <th style="text-align: center;">4 Years <br> 9.75%</th>
                                    <th style="text-align: center;">5 Years <br> 10%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">100</td>
                                    <td style="text-align: center;">1259</td>
                                    <td style="text-align: center;">2631</td>
                                    <td style="text-align: center;">4127</td>
                                    <td style="text-align: center;">5756</td>
                                    <td style="text-align: center;">7525</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">200</td>
                                    <td style="text-align: center;">2517</td>
                                    <td style="text-align: center;">5263</td>
                                    <td style="text-align: center;">8255</td>
                                    <td style="text-align: center;">11511</td>
                                    <td style="text-align: center;">15050</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">500</td>
                                    <td style="text-align: center;">6293</td>
                                    <td style="text-align: center;">13156</td>
                                    <td style="text-align: center;">20636</td>
                                    <td style="text-align: center;">28778</td>
                                    <td style="text-align: center;">37625</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">1000</td>
                                    <td style="text-align: center;">12585</td>
                                    <td style="text-align: center;">26313</td>
                                    <td style="text-align: center;">41273</td>
                                    <td style="text-align: center;">57555</td>
                                    <td style="text-align: center;">75250</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2000</td>
                                    <td style="text-align: center;">25170</td>
                                    <td style="text-align: center;">52625</td>
                                    <td style="text-align: center;">82545</td>
                                    <td style="text-align: center;">115110</td>
                                    <td style="text-align: center;">150500</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2500</td>
                                    <td style="text-align: center;">31463</td>
                                    <td style="text-align: center;">65781</td>
                                    <td style="text-align: center;">103181</td>
                                    <td style="text-align: center;">143887</td>
                                    <td style="text-align: center;">188125</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">5000</td>
                                    <td style="text-align: center;">62925</td>
                                    <td style="text-align: center;">131563</td>
                                    <td style="text-align: center;">206363</td>
                                    <td style="text-align: center;">287775</td>
                                    <td style="text-align: center;">376250</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">10000</td>
                                    <td style="text-align: center;">125850</td>
                                    <td style="text-align: center;">263125</td>
                                    <td style="text-align: center;">412725</td>
                                    <td style="text-align: center;">575550</td>
                                    <td style="text-align: center;">752500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
                </div>
            </section>
            <!--Departments & Information Desk End-->
        </div>
        <!--Main Content End-->
@endsection
