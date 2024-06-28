{{-- <section id="biodata">
    <div class="container ">
        <div class="row mt-5">
            <h1 class="text-center pb-5 ">Biodata</h1>
            <div class="col-12 col-lg-6">
                <img class="img-fluid" src="{{ asset('storage/photo-user/'.Auth::user()->image) }}" alt="">
            </div>
            <div class="col-12 col-lg-5 position-relative">
                <form >
                    <div class="mb-1 mt-3 mt-lg-0 input-group-sm">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class=" form-control" id="nama" placeholder="Nama Lengkap..." value="{{ Auth::user()->name}}" disabled>
                    </div>
                    <div class="mb-1 input-group-sm">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class=" form-control" id="email" placeholder="email" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <a href="#" class="text-black">Ganti Password</a>
                        <a href="#" class="btn-primary text-decoration-none">Edit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/icons/map.png') }}">
    <title>SIG Bengkel Indramayu</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/fonts/boxicons.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://kit.fontawesome.com/22199b87c6.js" crossorigin="anonymous"></script>

</head>

<body>

    @include('userpage.components.navbar')

    <div class="container">
        <div class="profile-container">
            <div class="profile-photo">
                <img src="{{ asset('storage/photo-user/' . Auth::user()->image) }}" alt="Profile Picture">
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-profile">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="form-profile">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                </div>
                <div class="form-profile">
                    <label for="current_password">Password Lama</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <div class="form-profile">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="form-profile">
                    <label for="profile_image">Foto Profil</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                </div>
                <button type="submit" class="btn-profile btn-primary">Update</button>
            </form>
        </div>
    </div>

    @include('userpage.components.footer')


</body>

</html>




