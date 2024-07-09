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
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    @include('userpage.components.navbar')

    <section>
        <div class="container py-5">
            <div class="text-center mt-5">
                <h3>{{ $data->title }}</h3>
                <div class="d-flex align-items-center mr-top">
                    <img src="{{ asset('assets/images/bengkel3.jpg') }}" alt="{{ $data->title }}" style="max-width: 600px; height: 400px; margin-right: 20px;">
                    <p style="text-align: left; vertical-align: top;">{{ $data->description_bengkel }}</p>
                </div>
                <div>
                    <p class="mt-5">Alamat: {{ $data->adress }}</p>
                    <p>Telepon: {{ $data->telepon }}</p>
                </div>
                <div class="mt-3">
                    <a href="{{ route('sparepart-bengkel', $data->id) }}" class="btn btn-primary w-50 mb-2">Sparepart</a>
                    <button class="btn btn-secondary w-50">Jasa</button>

                    <h3 class="text-center mt-5">Peta {{ $data->title }}</h3>
                    <div class="row">
                        <div class="col-12 min-h-100">
                            <div class="text-center map-detail" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('userpage.components.footer')



    <script>
        let map = L.map('map').setView([-6.474889294849401, 108.460165329184], 10);
        let latLng1 = L.latLng(-6.474889294849401, 108.460165329184);
        let latLng2 = L.latLng(-6.498999861598818, 108.42674969371632);
        let wp1 = new L.Routing.Waypoint(latLng1);
        let wp2 = new L.Routing.Waypoint(latLng2);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        L.Routing.control({
            waypoints: [latLng1, latLng2]
        }).addTo(map);

        let routeUs = L.Routing.osrmv1();
        routeUs.route([wp1, wp2],(err,routes)=>{
            if(!err)
            {
                let best = 10000000000000;
                let bestRoute = 0;
                for(i in routes)
                {
                    if(routes[i].summary.totalDistance < best) {
                        bestRoute = i;
                        best = routes[i].summary.totalDistance;
                    }
                }
                console.log('best route', routes[bestRoute]);
                L.Routing.line(routes[bestRoute],{
                    styles : [
                        {
                            color : 'green',
                            weight : '10'
                        }
                    ]
                }).addTo(map);
            }
        })
    </script>
</body>

</html>

