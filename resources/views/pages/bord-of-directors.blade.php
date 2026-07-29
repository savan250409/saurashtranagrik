@extends('layouts.app')

@section('title', 'Shree Saurastra Nagrik Sharafi Mandali LTD')

@push('styles')
<style type="text/css">table {
            width: 100%;
        }
        table th, table td {
            border: 1px solid;
            padding: 10px;
            color: black;
        }
        .h3-team-box {
            height: 280px;
            width: 280px;
            border-radius: 50rem;
            border: 3px solid rgba(214,43,35,0.5);
            -webkit-box-shadow: 0px 0px 30px -11px rgba(214,43,35,1);
            -moz-box-shadow: 0px 0px 30px -11px rgba(214,43,35,1);
            box-shadow: 0px 0px 30px -11px rgba(214,43,35,1);
        }
        .team-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            position: relative;
            padding: 10px 0;
        }
        .team-info h6, .team-info strong {
            color: black;
        }
        .item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .h3-team-box:after {
            display: none;
        }
	</style>
@endpush

@section('content')
<!--Main Content Start-->

<div class="main-content"><!--Departments & Information Desk Start-->
<section class="wf100 p75-50  depart-info">
<div class="container">
<div class="row text-center mb30 title-style-3">
<h3>Board of Directors</h3>
</div>

<div class="row mt-5 text-capitalize" style="display: flex;flex-wrap: wrap;justify-content: center;">
@foreach ($directors as $director)
<div class="col-lg-4 col-md-4 col-sm-6{{ $loop->index >= 4 ? ' mt-3' : '' }}">
<div class="owl-item active">
<div class="item">
<div class="h3-team-box"><img alt="" src="{{ asset($director->photo) }}" loading="lazy" decoding="async" /></div>

<div class="team-info">
<h6>{{ $director->name }}</h6>
<strong>{{ $director->designation }}</strong></div>
</div>
</div>
</div>
@endforeach
                    </div>

<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
    <h3>Ad. Board Member ( Bagasara Branch )</h3>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 pt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Himmarbhai Khetani</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 pt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Piyushbhai Bharakhada</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 pt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Keyurbhai Dholariya</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 pt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Ketanbhai Dixit</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 pt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Jentibhai Makvana</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 pt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Dr. Sanjaybhai Sorathiya</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 pt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Dineshbhai Kateshiya</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>
</div>

<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
    <h3>Ad. Board Member ( Kunkavav Branch )</h3>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Bharatbhai Dhirubhai Kanani</a></h6>
                <p>Branch MD</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Babubhai Kotadiya</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Viththalbhai Korat</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Dr.Hiteshbhai Bodar</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Priteshbhai Dobariya</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri parshotambhai Rakholiya</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
        <div class="news-box">
            <div class="new-txt">
                <h6><a href="javascript:;">Shri Ritaben Bhuva</a></h6>
                <p>Board Member</p>
            </div>
        </div>
    </div>
</div>

<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
<h3>Ad. Board Member ( Bhesan Branch )</h3>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Jaysukhbhai Gondaliya</a></h6>

<p>Branch MD</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Bhaveshbhai Trapasiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Prakashbhai Savaliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Ramjibhai Dobariya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Sonalben Sojitra</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Pradipbhai Kanpariya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Bharatbhai Sarkhareliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>
</div>

<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
<h3>Ad. Board Member ( Amreli Branch )</h3>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Divyeshbhai Vekaria</a></h6>

<p>Branch MD</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Sanjaybhai Malaviya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Jaysukhbhai Sorathiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Dipakbhai Dhanani</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Mukeshbhai Korat</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Arunbhai Der</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Hiteshbhai Khanesha</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Dharmeshbhai Visavaliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>
</div>

<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
<h3>Ad. Board Member ( Visavadar Branch )</h3>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Prakashbhai Savaliya</a></h6>

<p>Branch MD</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Hasubhai Rabadiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Mohitbhai Malaviya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Rinaben Bhaliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Chimanbhai Rafaliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Hirenbhai Sojitra</a></h6>

<p>Board Member</p>
</div>
</div>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Manishaben Lakhani</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

</div>

<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
<h3>Ad. Board Member ( Bhalgam Branch )</h3>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Dipakbhai Ambaliya</a></h6>

<p>Branch MD</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Nitinbhai Kotadiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Bhupatbhai Lokadiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Manishbhai Pansuriya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Jyotsanaben Godhani</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Dayaben Vaghasiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>
</div>


<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
<h3>Ad. Board Member ( Chuda Branch )</h3>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Arunaben Barariya</a></h6>

<p>Branch MD</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Jaysukhbhai Vaghasiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Sonalben Gajipara</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Sangitaben Dobariya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Bharatbhai Korat</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Ghanshyambhai Patoliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Dalsukhbhai Ansodariya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Kishanbhai Kathiriya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Gordhanbhai Bhut</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

</div>


<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
<h3>Ad. Board Member ( Dhari Branch )</h3>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Pravinbhai Kasvala</a></h6>

<p>Branch MD</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Vinubhai Katharotiya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Bhavsukhbhai Vaghela</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Sureshbhai Antala</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Hemalbhai Jaysval</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Mansukhbhai Vastani</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Anitaben Shiroya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>
</div>


<div class="row text-center pb-0 mb-0 mt-5 pt-5 title-style-3">
<h3>Ad. Board Member ( Ahmedabad Branch )</h3>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Sajanbhai Pethani</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Vipulbhai Sangani</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Manojbhai Savaliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Jigneshbhai Savaliya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Prakashbhai Gevariya</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Bhaveshbhai Tanti</a></h6>

<p>Board Member</p>
</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 pt-3">
<div class="news-box">
<div class="new-txt">
<h6><a href="javascript:;">Shri Sagarbhai Hirpara</a></h6>

<p>Board Member</p>
</div>
</div>
</div>
</div>
</section>
<!--Departments & Information Desk End--></div>
<!--Main Content End-->
@endsection
