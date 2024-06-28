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
    <script src="https://kit.fontawesome.com/22199b87c6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://kit.fontawesome.com/22199b87c6.js" crossorigin="anonymous"></script>


</head>

<body>

    <section id="hero" class="px-0"></section>
<div class="wrapper">
    <div class="form-box login">
        <h2>Login</h2>
        <form action="{{ route('login-proses') }}" method="post">
            @csrf
            <div class="input-box">
                <span class="fa-solid fa-envelope"></span>
                <input type="email" name="email" required>
                <label>Email</label>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-box">
                <span class="fa-solid fa-lock"></span>
                <input type="password" name="password" required>
                <label>Password</label>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btnLog" type="submit">Login</button>
            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>

    <div class="form-box register">
        <h2>Registration</h2>
        <form action="{{ route('register-proses') }}" method="post">
            @csrf
            <div class="input-box">
                <span class="fa-solid fa-user"></span>
                <input type="text" name="name" value="{{ old('name') }}" required>
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="fa-solid fa-envelope"></span>
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="fa-solid fa-lock"></span>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="input-box">
                <span class="fa-solid fa-users"></span>
                <select name="role" id="role" required onchange="togglePhoneInput()">
                    <option value="visitor">Daftar sebagai Pengunjung</option>
                    <option value="workshop">Daftar sebagai pemilik Bengkel</option>
                </select>
            </div>
            <div class="input-box" id="phoneInput" style="display: none;">
                <span class="fa-solid fa-phone"></span>
                <input type="text" name="phone" placeholder="Masukkan nomor telepon">
                <label>Telepon</label>
            </div>
            <button class="btnLog" type="submit">Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
</div>


    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function togglePhoneInput() {
            var roleSelect = document.getElementById('role');
            var phoneInput = document.getElementById('phoneInput');
            if (roleSelect.value === 'workshop') {
                phoneInput.style.display = 'block';
            } else {
                phoneInput.style.display = 'none';
            }
        }
    </script>

    {{-- Tampilkan Pesan Error --}}
    @if ($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
        });
    </script>
    @endif

    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil...',
            text: "{{ session('success') }}",
        });
    </script>
    @endif
</body>

</html>
