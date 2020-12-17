<header class="header_area clearfix">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <div class="menu_area h-100">
                    <nav class="navbar h-100 navbar-expand-lg align-items-center">
                        <a href="{{ route('home') }}" class="align-items-center">
                            <img src="{{ asset('template/mosh/img/core-img/kamarga.png') }}" alt="" rel="stylesheet">
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mosh-navbar"
                                aria-controls="mosh-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="mosh-navbar">
                            <ul class="navbar-nav animated" id="nav">
                                <li class="nav-item {{ active('home') }}">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Beranda') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about">Tentang Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="fasilitas">Fasilitas </a>
                                </li>
                                <li class="nav-item {{ active('career.*') }}">
                                    <a class="nav-link" href="{{ route('career.index') }}">Karir</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="kontak">Kontak</a>
                                </li>
                            </ul>
                            <!-- Search Form Area Start -->
                            <div class="search-form-area animated">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                    <button type="submit" class="d-none">
                                        <img src="{{ asset('template/mosh/img/core-img/search-icon.png') }}" alt="Search">
                                    </button>
                                </form>
                            </div>
                            <!-- Search btn -->
                            <div class="search-button">
                                <a href="" id="search-btn">
                                    <img src="{{ asset('template/mosh/img/core-img/search-icon.png') }}" alt="Search">
                                </a>
                            </div>
                            <!-- Login/Register btn -->
                            <div class="login-register-btn">
                                @guest
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">{{ __(' / Register') }}</a>
                                    @endif
                                @else
                                    <ul class="navbar-nav animated" id="nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name ?? '' }}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                                <a class="dropdown-item {{ active('user.index') }}" href="{{ route('user.index') }}">
                                                    {{ __('My Profile') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
