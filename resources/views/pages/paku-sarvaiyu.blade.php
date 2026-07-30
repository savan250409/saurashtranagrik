@extends('layouts.app')

@section('title', 'Balance Sheet | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Balance sheet of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Balance Sheet</p>
            <h1>Balance Sheet</h1>
            <p>Audited balance sheet figures, branch by branch.</p>
        </div>
    </div>

    <section class="section">
        <div class="wrap">
            <div class="btn-row btn-row--center reveal" style="margin-bottom:32px">
                <a class="btn btn-primary" href="{{ asset('media/Paku Sarvaiyu 2026.pdf') }}" download>@include('partials.icon', ['name' => 'download']) Balance Sheet (Year-2026)</a>
                <a class="btn btn-primary" href="{{ asset('media/Paku Sarvaiyu - 31-03-24 - Final - Copy.pdf') }}" download>@include('partials.icon', ['name' => 'download']) Balance Sheet (Year-2025)</a>
                <a class="btn btn-primary" href="{{ asset('media/Balance Sheet.pdf') }}" download>@include('partials.icon', ['name' => 'download']) Balance Sheet (Year-2024)</a>
            </div>

            <p class="reveal" style="text-align:center;color:var(--text-muted);margin-bottom:22px">Balanced till 31/03/2023</p>

            <p class="scroll-hint">Scroll the table sideways to see every column.</p>
            <div class="table-scroll reveal">
                <table class="data">
                <thead>
                <tr>
                <th>Order</th>
                <th>Capital Debt</th>
                <th>Bagasara</th>
                <th>Kunkavav</th>
                <th>Bhesan</th>
                <th>Chuda</th>
                <th>Visavadar</th>
                <th>Amreli</th>
                <th>Bhalgam</th>
                <th>Dhari</th>
                <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>1</td>
                <td>At share fund</td>
                <td>20955000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>20955000.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Reserves and other reserve funds</td>
                <td class="fw-bold">23430232.72</td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold">23430232.72</td>
                </tr>
                <tr>
                <td>2</td>
                <td>at the Reserve Fund</td>
                <td>10572265.72</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>10572265.72</td>
                </tr>
                <tr>
                <td>3</td>
                <td>At Dividend Equalization Fund</td>
                <td>423530.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>423530.00</td>
                </tr>
                <tr>
                <td>4</td>
                <td>At the building fund</td>
                <td>4548470.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>4548470.00</td>
                </tr>
                <tr>
                <td>5</td>
                <td>At depreciation fund</td>
                <td>3521609.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>3521609.00</td>
                </tr>
                <tr>
                <td>6</td>
                <td>At Dubat Debt Fund</td>
                <td>3117982.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>3117982.00</td>
                </tr>
                <tr>
                <td>7</td>
                <td>at Charitable Fund</td>
                <td>1246376.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1246376.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">At other funds</td>
                <td class="fw-bold">5863142.00</td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold">5863142.00</td>
                </tr>
                <tr>
                <td>8</td>
                <td>At the Assembly and Staff Assistance Fund</td>
                <td>1327587.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1327587.00</td>
                </tr>
                <tr>
                <td>9</td>
                <td>At the Co-operation Promotion Fund</td>
                <td>770756.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>770756.00</td>
                </tr>
                <tr>
                <td>10</td>
                <td>At Sabhasad Incentive Fund</td>
                <td>1674304.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1674304.00</td>
                </tr>
                <tr>
                <td>11</td>
                <td>At Sabhasad Welfare Fund</td>
                <td>328500.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>328500.00</td>
                </tr>
                <tr>
                <td>12</td>
                <td>At Sabhasad Bonus Fund</td>
                <td>352399.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>352399.00</td>
                </tr>
                <tr>
                <td>13</td>
                <td>At the Sabhad Gift Fund</td>
                <td>704798.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>704798.00</td>
                </tr>
                <tr>
                <td>14</td>
                <td>At the Cooperative Promotion Fund</td>
                <td>352399.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>352399.00</td>
                </tr>
                <tr>
                <td>15</td>
                <td>At the festival celebration fund</td>
                <td>352399.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>352399.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">deposits</td>
                <td class="fw-bold">388012187.00</td>
                <td class="fw-bold">42449030.00</td>
                <td class="fw-bold">20178289.00</td>
                <td class="fw-bold">32376008.00</td>
                <td class="fw-bold">10558174.00</td>
                <td class="fw-bold">27430293.00</td>
                <td class="fw-bold">21310927.00</td>
                <td class="fw-bold">2363659.00</td>
                <td class="fw-bold">544678567.00</td>
                </tr>
                <tr>
                <td>16</td>
                <td>At savings deposits</td>
                <td>9031806.00</td>
                <td>1558372.00</td>
                <td>1915410.00</td>
                <td>1773346.00</td>
                <td>291554.00</td>
                <td>201453.00</td>
                <td>4395826.00</td>
                <td>39159.00</td>
                <td>19206926.00</td>
                </tr>
                <tr>
                <td>17</td>
                <td>At Daily Savings</td>
                <td>4710356.00</td>
                <td>1650550.00</td>
                <td>1083550.00</td>
                <td>916350.00</td>
                <td>579620.00</td>
                <td>1618350.00</td>
                <td>402750.00</td>
                <td></td>
                <td>10961526.00</td>
                </tr>
                <tr>
                <td>18</td>
                <td>At Recurring Deposit (Shubh Lakshmi).</td>
                <td>3071300.00</td>
                <td>315900.00</td>
                <td>77000.00</td>
                <td>175600.00</td>
                <td>95500.00</td>
                <td>69000.00</td>
                <td>100900.00</td>
                <td>44500.00</td>
                <td>3949700.00</td>
                </tr>
                <tr>
                <td>19</td>
                <td>At Fixed Deposit</td>
                <td>302868745.00</td>
                <td>27134185.00</td>
                <td>15220129.00</td>
                <td>23382579.00</td>
                <td>8699500.00</td>
                <td>24651290.00</td>
                <td>14892951.00</td>
                <td>1880000.00</td>
                <td>418729379.00</td>
                </tr>
                <tr>
                <td>20</td>
                <td>at fixed deposit nominal</td>
                <td>105000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>105000.00</td>
                </tr>
                <tr>
                <td>21</td>
                <td>esp. At fixed deposits</td>
                <td>63374980.00</td>
                <td>11745023.00</td>
                <td>1882200.00</td>
                <td>5728133.00</td>
                <td>892000.00</td>
                <td>390200.00</td>
                <td>1165000.00</td>
                <td>400000.00</td>
                <td>85577536.00</td>
                </tr>
                <tr>
                <td>22</td>
                <td>At monthly deposits</td>
                <td>4850000.00</td>
                <td>45000.00</td>
                <td></td>
                <td>400000.00</td>
                <td></td>
                <td>500000.00</td>
                <td>300000.00</td>
                <td></td>
                <td>6095000.00</td>
                </tr>
                <tr>
                <td>23</td>
                <td>At Safe Depot.Vault Deposit</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>53500.00</td>
                <td></td>
                <td>53500.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Other Liabilities (Other Debts)</td>
                <td class="fw-bold">23436873.20</td>
                <td class="fw-bold">6514855.56</td>
                <td class="fw-bold">61220422.02</td>
                <td class="fw-bold">9746676.11</td>
                <td class="fw-bold">34897323.86</td>
                <td class="fw-bold">46467079.86</td>
                <td class="fw-bold">787411.00</td>
                <td class="fw-bold">4740722.00</td>
                <td class="fw-bold">187811363.61</td>
                </tr>
                <tr>
                <td>24</td>
                <td>Fixed Depot. At interest payable</td>
                <td>20346963.00</td>
                <td>2419456.00</td>
                <td>882738.00</td>
                <td>1573969.00</td>
                <td>488788.00</td>
                <td>1038200.00</td>
                <td>757521.00</td>
                <td>17601.00</td>
                <td>27525236.00</td>
                </tr>
                <tr>
                <td>25</td>
                <td>Recurring Depot. At Rs. eligible interest</td>
                <td>83565.00</td>
                <td>8413.00</td>
                <td>2104.00</td>
                <td>7086.00</td>
                <td>2857.00</td>
                <td>1176.00</td>
                <td>3394.00</td>
                <td>271.00</td>
                <td>108866.00</td>
                </tr>
                <tr>
                <td>26</td>
                <td>Daily savings at eligible interest</td>
                <td>102321.00</td>
                <td>37810.00</td>
                <td>57181.00</td>
                <td>53497.00</td>
                <td>24022.00</td>
                <td>79461.00</td>
                <td>26496.00</td>
                <td></td>
                <td>380788.00</td>
                </tr>
                <tr>
                <td>27</td>
                <td>At dividend provision</td>
                <td>360000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>360000.00</td>
                </tr>
                <tr>
                <td>28</td>
                <td>At outstanding debts due</td>
                <td>414760.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>414760.00</td>
                </tr>
                <tr>
                <td>29</td>
                <td>Swami Vivekananda Insurance Scheme</td>
                <td>1494000.00</td>
                <td>382000.00</td>
                <td>572000.00</td>
                <td>164000.00</td>
                <td>14000.00</td>
                <td>27000.00</td>
                <td></td>
                <td></td>
                <td>2653000.00</td>
                </tr>
                <tr>
                <td>30</td>
                <td>At Ladli Yojana</td>
                <td>350000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>350000.00</td>
                </tr>
                <tr>
                <td>31</td>
                <td>at Head Office</td>
                <td></td>
                <td>3663176.56</td>
                <td>59704399.02</td>
                <td>7948124.11</td>
                <td>34367656.86</td>
                <td>45321242.86</td>
                <td></td>
                <td>4722850.00</td>
                <td>155727449.41</td>
                </tr>
                <tr>
                <td>32</td>
                <td>At Bhalgam branch</td>
                <td>285264.20</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>285264.20</td>
                </tr>
                <tr>
                <td>33</td>
                <td>At Chuda branch</td>
                <td></td>
                <td>4000.00</td>
                <td>2000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>6000.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Provisions</td>
                <td class="fw-bold">12872544.00</td>
                <td class="fw-bold">1217198.00</td>
                <td class="fw-bold">3291976.00</td>
                <td class="fw-bold">357528.00</td>
                <td class="fw-bold">97429.00</td>
                <td class="fw-bold"></td>
                <td class="fw-bold">56173.00</td>
                <td class="fw-bold"></td>
                <td class="fw-bold">17892848.00</td>
                </tr>
                <tr>
                <td>34</td>
                <td>At provision against standard account</td>
                <td>4234229.00</td>
                <td>420668.00</td>
                <td>805351.00</td>
                <td>51752.00</td>
                <td>24186.00</td>
                <td></td>
                <td>43591.00</td>
                <td></td>
                <td>5579777.00</td>
                </tr>
                <tr>
                <td>35</td>
                <td>At overdue interest fund</td>
                <td>8638315.00</td>
                <td>796530.00</td>
                <td>2486625.00</td>
                <td>305776.00</td>
                <td>73243.00</td>
                <td></td>
                <td>12582.00</td>
                <td></td>
                <td>12313071.00</td>
                </tr>
                <tr>
                <td>36</td>
                <td>Profit Tota Account</td>
                <td>1683373.00</td>
                <td>1327523.00</td>
                <td>1935842.90</td>
                <td>378527.99</td>
                <td>612635.64</td>
                <td>2017562.00</td>
                <td>217931.40</td>
                <td>45094.59</td>
                <td>8218490.52</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Total</td>
                <td class="fw-bold">476253351.92</td>
                <td class="fw-bold">51508606.56</td>
                <td class="fw-bold">86626529.92</td>
                <td class="fw-bold">42858740.10</td>
                <td class="fw-bold">46165562.50</td>
                <td class="fw-bold">75914934.86</td>
                <td class="fw-bold">22372442.40</td>
                <td class="fw-bold">7149475.59</td>
                <td class="fw-bold">808849643.85</td>
                </tr>
                </tbody>
                </table>
            </div>

            <p class="scroll-hint" style="margin-top:26px">Scroll the table sideways to see every column.</p>
            <div class="table-scroll reveal" style="margin-top:10px">
                <table class="data">
                <thead>
                <tr>
                <th>Order</th>
                <th>Property - Debt</th>
                <th>Bagasara</th>
                <th>Kunkavav</th>
                <th>Bhesan</th>
                <th>Chuda</th>
                <th>Visavadar</th>
                <th>Amreli</th>
                <th>Bhalgam</th>
                <th>Dhari</th>
                <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>1</td>
                <td>Cash on hand</td>
                <td>670722.00</td>
                <td>276477.00</td>
                <td>452013.00</td>
                <td>490076.00</td>
                <td>442878.00</td>
                <td>425455.00</td>
                <td>476352.00</td>
                <td>417880.00</td>
                <td>3651853.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Bank accounts</td>
                <td class="fw-bold">3586391.01</td>
                <td class="fw-bold">686917.56</td>
                <td class="fw-bold">1518451.92</td>
                <td class="fw-bold">616052.10</td>
                <td class="fw-bold">2173633.50</td>
                <td class="fw-bold">1299113.86</td>
                <td class="fw-bold">938251.20</td>
                <td class="fw-bold">678180.59</td>
                <td class="fw-bold">11496991.74</td>
                </tr>
                <tr>
                <td>2</td>
                <td>A.G.M.S. at the current</td>
                <td>1366113.50</td>
                <td>311207.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td>436407.00</td>
                <td></td>
                <td>150396.00</td>
                <td>2264123.50</td>
                </tr>
                <tr>
                <td>3</td>
                <td>At Central Bank of India Current</td>
                <td>74997.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>74997.00</td>
                </tr>
                <tr>
                <td>4</td>
                <td>Junagadh District Cooperative Bank Current</td>
                <td></td>
                <td></td>
                <td>584514.80</td>
                <td>302052.20</td>
                <td>1008998.80</td>
                <td></td>
                <td>481332.40</td>
                <td></td>
                <td>2376898.20</td>
                </tr>
                <tr>
                <td>5</td>
                <td>At Dena Bank Current / Bank of Baroda</td>
                <td></td>
                <td></td>
                <td>495904.80</td>
                <td></td>
                <td>576594.14</td>
                <td></td>
                <td></td>
                <td>244381.00</td>
                <td>1316879.94</td>
                </tr>
                <tr>
                <td>6</td>
                <td>At State Bank of India Current</td>
                <td>1888496.51</td>
                <td>41840.56</td>
                <td>430385.22</td>
                <td>308823.40</td>
                <td>308825.56</td>
                <td>289820.86</td>
                <td></td>
                <td>170407.59</td>
                <td>3438599.70</td>
                </tr>
                <tr>
                <td>7</td>
                <td>At A.G.M.S.Bank Saving</td>
                <td>144588.00</td>
                <td>333870.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td>572886.00</td>
                <td></td>
                <td>112996.00</td>
                <td>1164340.00</td>
                </tr>
                <tr>
                <td>8</td>
                <td>Junagadh District Co-operative Bank Savings</td>
                <td></td>
                <td></td>
                <td>7647.10</td>
                <td>5176.50</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>12823.60</td>
                </tr>
                <tr>
                <td>9</td>
                <td>At Central Bank of India Savings</td>
                <td>112196.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>112196.00</td>
                </tr>
                <tr>
                <td>10</td>
                <td>Junagadh Co.Co. At the bank</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>279215.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td>279215.00</td>
                </tr>
                <tr>
                <td>11</td>
                <td>At Union Bank of India</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>456918.80</td>
                <td></td>
                <td>456918.80</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Investments</td>
                <td class="fw-bold">120001100.00</td>
                <td class="fw-bold">14700000.00</td>
                <td class="fw-bold">1500000.00</td>
                <td class="fw-bold">6000000.00</td>
                <td class="fw-bold">10000.00</td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold">142211100.00</td>
                </tr>
                <tr>
                <td>12</td>
                <td>At District Bank Share</td>
                <td>100.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>100.00</td>
                </tr>
                <tr>
                <td>13</td>
                <td>At IFFCO Shares</td>
                <td>1000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1000.00</td>
                </tr>
                <tr>
                <td>14</td>
                <td>A.G.M.S. F.D. at</td>
                <td>120000000.00</td>
                <td>14700000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>134700000.00</td>
                </tr>
                <tr>
                <td>15</td>
                <td>At Junagadh District Co-operative Bank F.D</td>
                <td></td>
                <td></td>
                <td>1500000.00</td>
                <td>6000000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>7500000.00</td>
                </tr>
                <tr>
                <td>16</td>
                <td>Junagadh Co.Co. Bank Fee D. at</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>10000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td>10000.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Loans</td>
                <td class="fw-bold">167925239.00</td>
                <td class="fw-bold">35046382.00</td>
                <td class="fw-bold">80661940.00</td>
                <td class="fw-bold">35432736.00</td>
                <td class="fw-bold">43455908.00</td>
                <td class="fw-bold">74185266.00</td>
                <td class="fw-bold">20650993.00</td>
                <td class="fw-bold">6040815.00</td>
                <td class="fw-bold">463399279.00</td>
                </tr>
                <tr>
                <td>17</td>
                <td>At Jat Jamingiri Lending</td>
                <td>135695196.00</td>
                <td>25260872.00</td>
                <td>43744417.00</td>
                <td>18156903.00</td>
                <td>32296885.00</td>
                <td>51410718.00</td>
                <td>12004956.00</td>
                <td>1120642.00</td>
                <td>319690589.00</td>
                </tr>
                <tr>
                <td>18</td>
                <td>At the property loan</td>
                <td>10750282.00</td>
                <td>5680300.00</td>
                <td>21420775.00</td>
                <td>6510507.00</td>
                <td>1607995.00</td>
                <td>12727112.00</td>
                <td>4600726.00</td>
                <td>4423353.00</td>
                <td>67721050.00</td>
                </tr>
                <tr>
                <td>19</td>
                <td>At Lending Against Deposit</td>
                <td>3672060.00</td>
                <td>472540.00</td>
                <td>137984.00</td>
                <td></td>
                <td>40271.00</td>
                <td>750070.00</td>
                <td>31824.00</td>
                <td></td>
                <td>5104749.00</td>
                </tr>
                <tr>
                <td>20</td>
                <td>At the gold loan</td>
                <td>3186637.00</td>
                <td>752033.00</td>
                <td>2340904.00</td>
                <td>5676407.00</td>
                <td>2046518.00</td>
                <td>978060.00</td>
                <td>979240.00</td>
                <td>201853.00</td>
                <td>16161652.00</td>
                </tr>
                <tr>
                <td>21</td>
                <td>At Real Estate Financing</td>
                <td>10420925.00</td>
                <td>1155457.00</td>
                <td>10673946.00</td>
                <td>1467205.00</td>
                <td>918641.00</td>
                <td>7198801.00</td>
                <td></td>
                <td></td>
                <td>31834975.00</td>
                </tr>
                <tr>
                <td>22</td>
                <td>At Atmanirbhar Gujarat Sahay Yojana</td>
                <td>1622870.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1622870.00</td>
                </tr>
                <tr>
                <td>23</td>
                <td>At Nari Gaurav Kamadhenu Dhirana</td>
                <td>2264933.00</td>
                <td>731989.00</td>
                <td>1362070.00</td>
                <td>1125074.00</td>
                <td>4838267.00</td>
                <td>559279.00</td>
                <td>2038649.00</td>
                <td>294967.00</td>
                <td>13215228.00</td>
                </tr>
                <tr>
                <td>24</td>
                <td>Gold C.C. At the credit</td>
                <td>312336.00</td>
                <td>993191.00</td>
                <td>981844.00</td>
                <td>2496640.00</td>
                <td>1707331.00</td>
                <td>561226.00</td>
                <td>995598.00</td>
                <td></td>
                <td>8048166.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Immovable Properties</td>
                <td class="fw-bold">19692535.50</td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold"></td>
                <td class="fw-bold">19692535.50</td>
                </tr>
                <tr>
                <td>25</td>
                <td>At Furniture and Fixtures</td>
                <td>5251588.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>5251588.00</td>
                </tr>
                <tr>
                <td>26</td>
                <td>at Deadstock</td>
                <td>1781728.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1781728.00</td>
                </tr>
                <tr>
                <td>27</td>
                <td>At Office Equipment Materials</td>
                <td>905394.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>905394.00</td>
                </tr>
                <tr>
                <td>28</td>
                <td>At the locker cabinet</td>
                <td>3855545.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>3855545.00</td>
                </tr>
                <tr>
                <td>29</td>
                <td>At Solar Panel Equipment Materials</td>
                <td>990000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>990000.00</td>
                </tr>
                <tr>
                <td>30</td>
                <td>At Electrical Equipment Materials</td>
                <td>1238508.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1238508.00</td>
                </tr>
                <tr>
                <td>31</td>
                <td>CCTV At the camera</td>
                <td>479140.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>479140.00</td>
                </tr>
                <tr>
                <td>32</td>
                <td>At A.C</td>
                <td>1666805.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1666805.00</td>
                </tr>
                <tr>
                <td>33</td>
                <td>at Fire Safety</td>
                <td>1049900.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1049900.00</td>
                </tr>
                <tr>
                <td>34</td>
                <td>at the computer</td>
                <td>735927.50</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>735927.50</td>
                </tr>
                <tr>
                <td>35</td>
                <td>At Vehicles</td>
                <td>1738000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1738000.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Other assets (liabilities)</td>
                <td class="fw-bold">164377364.41</td>
                <td class="fw-bold">798830.00</td>
                <td class="fw-bold">2494125.00</td>
                <td class="fw-bold">319876.00</td>
                <td class="fw-bold">83143.00</td>
                <td class="fw-bold">5100.00</td>
                <td class="fw-bold">306846.20</td>
                <td class="fw-bold">12600.00</td>
                <td class="fw-bold">168397884.61</td>
                </tr>
                <tr>
                <td>36</td>
                <td>N.P.A. Undue interest receivable on loans made</td>
                <td>8638315.00</td>
                <td>796530.00</td>
                <td>2486625.00</td>
                <td>305776.00</td>
                <td>73243.00</td>
                <td></td>
                <td>12582.00</td>
                <td></td>
                <td>12313071.00</td>
                </tr>
                <tr>
                <td>37</td>
                <td>At Stamp Stock</td>
                <td>11600.00</td>
                <td>2300.00</td>
                <td>7500.00</td>
                <td>8100.00</td>
                <td>9900.00</td>
                <td>5100.00</td>
                <td>9000.00</td>
                <td>12600.00</td>
                <td>66100.00</td>
                </tr>
                <tr>
                <td>38</td>
                <td>Head Office</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>285264.20</td>
                <td></td>
                <td>285264.20</td>
                </tr>
                <tr>
                <td>39</td>
                <td>CUNKAWAW BRANCH</td>
                <td>3663176.56</td>
                <td></td>
                <td></td>
                <td>4000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>3667176.56</td>
                </tr>
                <tr>
                <td>40</td>
                <td>Bhensan Branch</td>
                <td>59704399.02</td>
                <td></td>
                <td></td>
                <td>2000.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>59706399.02</td>
                </tr>
                <tr>
                <td>41</td>
                <td>Chuda branch</td>
                <td>7948124.11</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>7948124.11</td>
                </tr>
                <tr>
                <td>42</td>
                <td>Visavdar Branch</td>
                <td>34367656.86</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>34367656.86</td>
                </tr>
                <tr>
                <td>43</td>
                <td>Amreli Branch</td>
                <td>45321242.86</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>45321242.86</td>
                </tr>
                <tr>
                <td>44</td>
                <td>At Dhari Branch</td>
                <td>4722850.00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>4722850.00</td>
                </tr>
                <tr>
                <td class="fw-bold" colspan="2">Total</td>
                <td class="fw-bold">476253351.92</td>
                <td class="fw-bold">51508606.56</td>
                <td class="fw-bold">86626529.92</td>
                <td class="fw-bold">42858740.10</td>
                <td class="fw-bold">46165562.50</td>
                <td class="fw-bold">75914934.86</td>
                <td class="fw-bold">22372442.40</td>
                <td class="fw-bold">7149475.59</td>
                <td class="fw-bold">808849643.85</td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
