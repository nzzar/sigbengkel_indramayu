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

    <div class="container mt-5" style="margin-bottom: 100px; !important">
        <form action="{{ route('sparepart') }}" method="GET">
            <div class="mb-3">
                <label for="bengkel_id" class="form-label">Pilih Bengkel</label>
                <select class="form-control" id="bengkel_id" name="bengkel_id">
                    <option value="">Pilih Bengkel</option>
                    @foreach($bengkels as $bengkel)
                        <option value="{{ $bengkel->id }}" {{ request('bengkel_id') == $bengkel->id ? 'selected' : '' }}>
                            {{ $bengkel->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tampilkan Spareparts</button>
        </form>

        <div class="row mt-4">
            @foreach($spareparts as $sparepart)
                <div class="col-xs-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card h-100 small-card" style="margin-top: 20px">
                        <img src="{{ asset('storage/photo-sparepart/' . $sparepart->image) }}" class="card-img-top" alt="{{ $sparepart->title }}">
                        <div class="card-body">
                            <hr>
                            <h5 class="card-title">{{ $sparepart->title }}</h5>
                            <p class="card-text">{{ $sparepart->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('userpage.components.footer')

</body>

</html>
