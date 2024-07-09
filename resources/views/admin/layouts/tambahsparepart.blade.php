<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/icons/map.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/icons/map.png') }}">
    <title>
        Admin SIG Bengkel Indramayu
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
    <link href="{{ asset('lte/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('lte/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ asset('lte/assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('admin.components.navbaradm')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Tambah Sparepart</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item ps-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0">
                                    <img src="{{ asset('storage/photo-user/' . Auth::user()->image) }}" class="avatar avatar-sm" alt="avatar" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center mb-3">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Tambah Sparepart</h6>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="{{ route('admin.sparepart.create') }}" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2">
                                    <span class="btn-inner--icon">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                        </svg>
                                    </span>
                                    <span class="btn-inner--text">Tambah Sparepart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Title</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Bengkel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($spareparts as $s)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $s->title }}</td>
                                            <td>{{ $s->description }}</td>
                                            <td><img src="{{ asset('storage/photo-sparepart/' . $s->image) }}" class="img-fluid" width="100"></td>
                                            <td>{{ $s->bengkel->name }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('admin.sparepart.edit', ['id' => $s->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <button class="btn btn-danger delete-btn" data-toggle="modal" data-target="#modal-hapus{{ $s->id }}"><i class="fas fa-trash"></i> Hapus</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-hapus{{ $s->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus data <b>{{ $s->title }}</b> ini?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form action="{{ route('admin.sparepart.delete', ['id' => $s->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.components.footeradm')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                $('#modal-default').modal('show');
            });

            $('#confirm-delete-btn').click(function() {
                alert('Data berhasil dihapus!');
                $('#modal-default').modal('hide');
            });
        });
    </script>
</body>

</html>
