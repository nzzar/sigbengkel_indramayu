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

    @yield('content')

    @include('userpage.konten')

    @include('userpage.maps')

    @include('userpage.bengkel')

    @include('userpage.components.footer')


    <link rel="stylesheet" href="{{ asset('assets/js/script.js') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <div id="map" style="height: 400px;"></div>

<script>
    var map = L.map('map').setView([-6.200000, 106.816666], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var customIcon = L.icon({
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34]
    });

    function getDistance(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = (lat2 - lat1) * (Math.PI / 180);
        var dLon = (lon2 - lon1) * (Math.PI / 180);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distance = R * c; // Distance in km
        return distance;
    }

    function addMarkersWithinRadius(userLat, userLon, data) {
        data.forEach(function(d) {
            var distance = getDistance(userLat, userLon, d.latitude, d.longitude);
            if (distance <= 5) {
                L.marker([d.latitude, d.longitude], {icon: customIcon})
                    .bindPopup("<b>" + d.title + "</b>")
                    .addTo(map);
            }
        });
    }

    function getNearbyBengkels(lat, lon) {
        fetch(`/api/bengkels/nearby?latitude=${lat}&longitude=${lon}`)
            .then(response => response.json())
            .then(data => {
                addMarkersWithinRadius(lat, lon, data);
            })
            .catch(error => {
                console.error('Error fetching nearby bengkels:', error);
            });
    }

    function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLon = position.coords.longitude;

            // Add the user's location marker
            var userMarker = L.marker([userLat, userLon], {icon: customIcon})
                                .bindPopup("<b>Lokasi Saya</b>")
                                .addTo(map);

            // Center the map on the user's location
            map.setView([userLat, userLon], 13);

            // Add a circle to represent the 5km radius
            L.circle([userLat, userLon], { radius: 5000 }).addTo(map);

            // Add markers from the data within 5km radius
            addMarkersWithinRadius(userLat, userLon, @json($data));

            // Get nearby bengkels based on the user's location and add markers within 5km radius
            getNearbyBengkels(userLat, userLon);
        }, function(error) {
            console.error('Error getting user location:', error);
            alert('Error getting your location. Please allow location access and try again.');
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

// Call getUserLocation when the page loads or when user activates GPS
getUserLocation();
</script>




    {{-- <script>
        var map = L.map('map').setView([-6.3473692, 108.2884698], 10);
        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        // Tambah marker
        var dwi = L.marker([-6.460680388183464, 108.45138413118077]).addTo(map);
        dwi.bindPopup("<b>Bengkel Dwi Setia Kawan</b>").openPopup();
        var mulia = L.marker([-6.471550784000624, 108.30264639980719]).addTo(map);
        mulia.bindPopup("<b>Bengkel Mulia Motor</b>").openPopup();

        // var bengkelIcon = L.icon({
        //     iconUrl: 'assets/icons/motor.png',

        //     iconSize: [24, 28], // size of the icon
        //     shadowSize: [50, 64], // size of the shadow
        //     iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        //     shadowAnchor: [4, 62], // the same for the shadow
        //     popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        // });

        L.marker([-6.506023513492756, 108.42647230496036], {
                icon: bengkelIcon
            }).addTo(map)
            .bindPopup('<b>Bengkel Wulan Motor</b>');;


        // polylane
        var latlngs = [
            [
                -6.245130267683152,
                107.90106940233471
            ],
            [
                -6.472749283712133,
                107.89458217881281
            ],
            [
                -6.518433214681679,
                108.00719783168057
            ],
            [
                -6.512847908965384,
                108.17797908189993
            ],
            [
                -6.527771366291347,
                108.31500635621103
            ],
            [
                -6.524051172565521,
                108.44643581925914
            ],
            [
                -6.462496466817299,
                108.48492122905884
            ],
            [
                -6.315107929896158,
                108.36571032553258
            ],
            [
                -6.261925763588167,
                108.36195565140554
            ],
            [
                -6.250728826253308,
                108.34693695489722
            ],
            [
                -6.22460170780478,
                108.18360863038055
            ],
            [
                -6.269390255115809,
                108.20613667514164
            ],
            [
                -6.325370527581114,
                108.13949120938878
            ],
            [
                -6.2432640681865195,
                107.90200807086649
            ]
        ];

        var polyline = L.polyline(latlngs, {
            coolor: 'red'
        }).addTo(map);

        map.fitBounds(polyline.getBounds());


        // Klik Marker
        // function onMapClick(e) {
        //     var tanda = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
        // }

        // map.on('click', onMapClick);

        // Edit Marker
        // var myIcon = L.icon({
        //     iconUrl: '../iconMarkers/marker.png',
        //     iconSize: [40, 40],
        // });
    </script> --}}
</body>

</html>
