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
    <link rel="icon" type="image/png" href="{{ asset('lte/assets/img/favicon.png') }}">
    <title>
        SIG Bengkel
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
    <link href="{{ asset('lte/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Edit Sparepart</h6>
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
                        </li>
                        <li class="nav-item ps-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <img src="{{ asset('storage/photo-user/' . Auth::user()->image) }}"
                                    class="avatar avatar-sm" alt="avatar" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->


        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Sparepart</h3>
            </div>

            <form action="{{ route('admin.sparepart.update', $sparepart->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Form fields here -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaBengkelInput">Nama Sparepart</label>
                                <input type="text" name="title" value="{{ $sparepart->title }}" class="form-control"
                                    id="namaBengkelInput" style="max-width: 400px;">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descriptionTextarea" class="form-label">Deskripsi</label>
                                <textarea name="description" id="descriptionTextarea" class="form-control"
                                    style="max-width: 400px;" cols="40"
                                    rows="4">{{ $sparepart->description }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Photo Sparepart</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

            {{-- <form action="{{ route('admin.sparepart.update', ['id' => $sparepart->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaBengkelInput">Nama Sparepart</label>
                                <input type="text" name="title" value="{{ $sparepart->title }}" class="form-control"
                                    id="namaBengkelInput" style="max-width: 400px;">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descriptionTextarea" class="form-label">Deskripsi</label>
                                <textarea name="description" id="descriptionTextarea" class="form-control"
                                    style="max-width: 400px;" cols="40"
                                    rows="4">{{ $sparepart->description }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Photo Sparepart</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form> --}}
        </div>
        @include('admin.components.footeradm')
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>
