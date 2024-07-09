<!-- Navbar -->
{{-- <header>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#005B41" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/icons/logo.png') }}" height="60px" width="120px" alt="SIGbengkel">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('home-active')" style="color: white;" aria-current="page"
                            href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('peta-active')" style="color: white;"
                            href="{{ route('home') }}#peta">Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('bengkel-active')" style="color: white;"
                            href="{{ route('home') }}#bengkel">Bengkel</a>
                    </li>
                </ul>
                <ul class="navbar-nav profile-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-pic">
                                <img style="width: 50px;" src="{{ asset('assets/images/nizarp.jpg')}}" alt="Profile Picture"
                                    class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-id-badge"></i> lihat
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-file-lines"></i> lihat Peta
                                    </a></li>
                            <li><a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-file-circle-plus"></i>
                                    Lihat Bengkel</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="fas fa-sign-out-alt fa-fw"></i> Log
                                    Out</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link btn-danger">Login</a>
                </div>
            </div>
        </div>
    </nav>
</header> --}}

<header>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#005B41" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/icons/logo.png') }}" height="60px" width="120px" alt="SIGbengkel">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('home-active')" style="color: white;" aria-current="page"
                            href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('peta-active')" style="color: white;"
                            href="{{ route('sparepart') }}#sparepart">Sparepart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('bengkel-active')" style="color: white;"
                            href="#jasa">Jasa</a>
                    </li>
                </ul>
                @if(auth()->check())
                <ul class="navbar-nav profile-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-pic">
                                <img style="width: 50px;" src="{{ asset('storage/photo-user/' . Auth::user()->image) }}" alt="Profile Picture"
                                    class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa-solid fa-id-badge"></i> Lihat Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>


                @else
                <div class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link btn-danger">Login</a>
                </div>
                @endif
            </div>
        </div>
    </nav>
</header>



<!-- Navbar -->
