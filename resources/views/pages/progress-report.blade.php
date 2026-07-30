@extends('layouts.app')

@section('title', 'Progress Report | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Progress report of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Progress Report</p>
            <h1>Progress Report</h1>
            <p>Year on year growth of the Mandali.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="btn-row btn-row--center reveal" style="margin-bottom:32px">
                <a class="btn btn-primary" href="{{ asset('media/Profit & Loss.pdf') }}" download>@include('partials.icon', ['name' => 'download']) Profit and Loss (Year-2024)</a>
            </div>

            <p class="reveal" style="text-align:center;color:var(--text-muted);margin-bottom:22px">Balanced till 31/03/2023</p>

            <p class="scroll-hint">Scroll the table sideways to see every column.</p>
            <div class="table-scroll reveal">
                <table class="data">
                <thead>
                <tr>
                <th>Year</th>
                <th>Members</th>
                <th>Share Capital</th>
                <th>Deposits</th>
                <th>Loan & Advances</th>
                <th>Profit</th>
                <th>Audit class</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>12-13</td>
                <td>284</td>
                <td>4,99,500</td>
                <td>10,02,423</td>
                <td>15,80,639</td>
                <td>28,677</td>
                <td>A</td>
                </tr>
                <tr>
                <td>13-14</td>
                <td>350</td>
                <td>6,98,300</td>
                <td>25,26,180</td>
                <td>29,25,945</td>
                <td>20,226</td>
                <td>A</td>
                </tr>
                <tr>
                <td>14-15</td>
                <td>403</td>
                <td>8,60,200</td>
                <td>25,99,778</td>
                <td>38,72,554</td>
                <td>45,842</td>
                <td>A</td>
                </tr>
                <tr>
                <td>15-16</td>
                <td>449</td>
                <td>10,76,300</td>
                <td>41,75,949</td>
                <td>57,59,835</td>
                <td>75,915</td>
                <td>A</td>
                </tr>
                <tr>
                <td>16-17</td>
                <td>890</td>
                <td>14,49,300</td>
                <td>1,99,54,074</td>
                <td>2,03,16,056</td>
                <td>1,25,000</td>
                <td>A</td>
                </tr>
                <tr>
                <td>17-18</td>
                <td>1209</td>
                <td>31,01,800</td>
                <td>4,99,34,927</td>
                <td>4,54,54,495</td>
                <td>6,85,183</td>
                <td>A</td>
                </tr>
                <tr>
                <td>18-19</td>
                <td>1482</td>
                <td>45,61,900</td>
                <td>8,31,87,980</td>
                <td>7,67,85,634</td>
                <td>31,39,628</td>
                <td>A</td>
                </tr>
                <tr>
                <td>19-20</td>
                <td>3155</td>
                <td>79,80,300</td>
                <td>15,95,79,053</td>
                <td>15,88,77,705</td>
                <td>39,74,338-5</td>
                <td>A</td>
                </tr>
                <tr>
                <td>20-21</td>
                <td>3860</td>
                <td>1,00,58,700</td>
                <td>28,13,48,201</td>
                <td>21,45,79,876</td>
                <td>52,59,246-96</td>
                <td>A</td>
                </tr>
                <tr>
                <td>22-23</td>
                <td>7553</td>
                <td>2,09,55,000</td>
                <td>54,46,78,567</td>
                <td>46,33,99,279</td>
                <td>82,18,490-52</td>
                <td>A</td>
                </tr>
                <tr>
                <td>23-24</td>
                <td>10008</td>
                <td>2,77,10,300</td>
                <td>69,63,14,347-80</td>
                <td>-</td>
                <td>1,19,71,547-37</td>
                <td>A</td>
                </tr>
                <tr>
                <td>24-25</td>
                <td>11879</td>
                <td>3,25,80,400</td>
                <td>93,93,75,510</td>
                <td>1,00,30,07,041</td>
                <td>1,23,08,399-33</td>
                <td>A</td>
                </tr>
                <tr>
                <td>25-26</td>
                <td>13652</td>
                <td>3,63,78,500</td>
                <td>1,17,95,07,390</td>
                <td>1,14,33,05,722</td>
                <td>2,11,78,525-82</td>
                <td>-</td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
