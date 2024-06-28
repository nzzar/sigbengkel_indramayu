<!-- Bengkel -->
<section>
    <div class="container py-5">
        <h3 class="text-center p-3 mb-2">Bengkel Motor</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            @foreach ($data as $d)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/photo-bengkel/' . $d->image) }}" alt="Profile Picture" style="width: 400px; height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $d->title }}</h5>
                        <p class="card-text">{{ $d->adress }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <a href="" class="btn btn-primary"><i class="fa-solid fa-location-dot"></i> Maps</a>
                        <a href="{{ route('detail-bengkel', ['id' => $d->id]) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Bengkel -->
