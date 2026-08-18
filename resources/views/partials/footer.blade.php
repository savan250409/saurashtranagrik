<section class="footer-cta">
    <div class="wrap">
        <div>
            <h2>Visit your nearest branch</h2>
            <p>Eleven branches across Gujarat, ready to help with deposits, loans and savings plans.</p>
        </div>
        <a class="btn btn-ghost--dark" href="{{ route('branches') }}">
            Find a branch @include('partials.icon', ['name' => 'arrow-right'])
        </a>
    </div>
</section>

<footer class="site-footer">
    <div class="wrap">
        <div class="footer-grid">
            <div class="footer-about">
                <a class="brand" href="{{ route('home') }}" style="margin-bottom:16px">
                    <img src="{{ asset('images/logo-lg.png') }}" width="46" height="46" alt="" loading="lazy">
                    <span class="brand-text">
                        <b>Shree Saurashtra Nagrik</b>
                        <span>Sharafi Sahakari Mandali Ltd.</span>
                    </span>
                </a>
                <p>Serving members across Bagasara, Kunkavav, Bhesan, Chuda, Visavadar, Bhalgam, Amreli, Dhari, Ahmedabad, Junagadh and Mendarda.</p>

                <ul class="footer-contact">
                    <li>
                        <a href="mailto:{{ config('site.contact.email') }}" target="_blank" rel="noopener">
                            @include('partials.icon', ['name' => 'mail'])
                            {{ config('site.contact.email') }}
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ preg_replace('/\D+/', '', config('site.contact.phone')) }}" target="_blank" rel="noopener">
                            @include('partials.icon', ['name' => 'phone'])
                            {{ config('site.contact.phone') }}
                        </a>
                    </li>
                </ul>

                <div class="footer-social">
                    <a href="{{ config('site.contact.social.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram">
                        @include('partials.icon', ['name' => 'instagram'])
                    </a>
                    <a href="{{ config('site.contact.social.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook">
                        @include('partials.icon', ['name' => 'facebook'])
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Important Links</h4>
                <ul>
                    @foreach (config('site.footer.links') as $route => $label)
                        <li><a href="{{ route($route) }}">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-col">
                <h4>Branches</h4>
                <ul>
                    @foreach ($navBranches as $navBranch)
                        <li>
                            @if ($navBranch->signboard)
                                <a href="{{ route('branches.show', $navBranch) }}">{{ $navBranch->name }}</a>
                            @else
                                {{-- Not built yet - listed for visibility, but not clickable, so it never dead-ends on a 404. --}}
                                <span class="footer-col__disabled">{{ $navBranch->name }}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-col">
                <h4>Explore</h4>
                <ul>
                    @foreach (config('site.footer.explore') as $route => $label)
                        <li><a href="{{ route($route) }}">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-col">
                <h4>Information</h4>
                <ul>
                    @foreach (config('site.footer.legal') as $route => $label)
                        <li><a href="{{ route($route) }}">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p style="margin:0">Copyright &copy; Shree Saurashtra Nagrik Sarafi Mandali Ltd. All Rights Reserved</p>
            <p style="margin:0">Developed by <a href="https://ngendevtech.com/" target="_blank" rel="noopener">NGD Technolab</a></p>
        </div>
    </div>
</footer>
