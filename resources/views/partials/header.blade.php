<header class="wf100 header">
    <div class="logo-nav-row">
        <div class="container">
            <div class="row p-0 m-0">
                <div class="col-md-12 p-0 m-0 d-flex justify-content-center">
                    <a class="navbar-brand p-0 m-0" href="{{ route('home') }}"><img src="{{ asset('images/logo-lg.png') }}" width="100" alt="Shree Saurashtra Nagrik Sharafi Mandali Ltd."></a>
                </div>
            </div>
            <div class="row p-0 m-0">
                <div class="col-md-12 p-0 m-0">
                    <nav class="navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false">
                            <ul class="nav navbar-nav">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                <li class="{{ request()->routeIs('bord-of-directors') ? 'active' : '' }}"><a href="{{ route('bord-of-directors') }}">Board of Directors</a></li>
                                <li class="{{ request()->routeIs('branches', 'branches.show') ? 'active' : '' }}"><a href="{{ route('branches') }}">Branches</a></li>
                                {{-- <li class="{{ request()->routeIs('schemes') ? 'active' : '' }}"><a href="{{ route('schemes') }}">Schemes</a></li> --}}
                                <li class="{{ request()->routeIs('loan') ? 'active' : '' }}"><a href="{{ route('loan') }}">Loans</a></li>
                                <li class="{{ request()->routeIs('deposit') ? 'active' : '' }}"><a href="{{ route('deposit') }}">Deposit</a></li>
                                <li class="{{ request()->routeIs('manager') ? 'active' : '' }}"><a href="{{ route('manager') }}">Managers</a></li>
                                <li class="{{ request()->routeIs('downloads') ? 'active' : '' }}"><a href="{{ route('downloads') }}">Downloads</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
