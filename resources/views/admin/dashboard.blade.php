<!--
=========================================================
* Corporate UI - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/corporate-ui
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('lte/assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/icons/map.png') }}">
    <title>
        Admin Sistem Informasi Geografis Bengkel
    </title>
    <!--     Fonts and icons     -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
        rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('lte/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('lte/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('lte/assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.components.navbaradm')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    class="fixed-plugin-button-nav cursor-pointer" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor" class="cursor-pointers">
                                    <path fill-rule="evenodd"
                                        d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item ps-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <img src="{{ asset('storage/photo-user/' . Auth::user()->image) }}" class="avatar avatar-sm"
                                    alt="avatar" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">Hello, {{$pemilik->name}}</h3>
                            <p class="mb-0">Selamat Datang</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">


            <div class="row my-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">User </p>
                                        <h4 class="mb-2 font-weight-bold">3</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Bengkel</p>
                                        <h4 class="mb-2 font-weight-bold">6</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-xs border">
                        <div class="container">
                            <h3 class="text-center">Peta Bengkel Kabupaten Indramayu</h3>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="text-center" id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            @include('admin.components.footeradm')

        </div>
    </main>


    {{-- peta --}}
    <script>
        var map = L.map('map').setView([-6.3473692, 108.2884698], 10);
        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        // Tambah marker
        var marker = L.marker([-6.460680388183464, 108.45138413118077]).addTo(map);
        marker.bindPopup("<b>Bengkel Dwi Setia Kawan</b").openPopup();
        var bengkel = L.marker([-6.471550784000624, 108.30264639980719]).addTo(map);
        bengkel.bindPopup("<b>Bengkel Mulia Motor</b").openPopup();

        // Klik Marker
        function onMapClick(e) {
            var tanda = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
        }

        map.on('click', onMapClick);

        // Edit Marker
        // var myIcon = L.icon({
        //     iconUrl: '../iconMarkers/marker.png',
        //     iconSize: [40, 40],
        // });
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('lte/assets/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
</body>

</html>
