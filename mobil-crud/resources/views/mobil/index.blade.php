<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD LARAVEL 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightcoral">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">DATA MOBIL</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('mobil.create') }}" class="btn btn-md btn-success mb-3">Tambah Data</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">STOK</th>
                                    <th scope="col" style="width: 20%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mobil as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/mobil/'.$item->gambar) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ "Rp " . number_format($item->harga,2,',','.') }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('mobil.destroy', $item->id) }}" method="POST" class="d-inline form-delete">
                                            <a href="{{ route('mobil.show', $item->id) }}" class="btn btn-sm btn-dark">
                                                SHOW
                                            </a>

                                            <a href="{{ route('mobil.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                EDIT
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                HAPUS
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Mobil belum ada.
                                </div>
                                @endforelse

                            </tbody>
                        </table>
                        {{ $mobil->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        // ============================
        // SweetAlert Success & Error
        // ============================

        @if(session('success'))

        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#FFC107'
        });

        @elseif(session('error'))

        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            confirmButtonColor: '#FFC107'
        });

        @endif


        // ============================
        // SweetAlert Konfirmasi Hapus
        // ============================

        document.querySelectorAll('.form-delete').forEach(function(form){

            form.addEventListener('submit', function(e){

                e.preventDefault();

                Swal.fire({

                    title: 'Yakin ingin menghapus?',

                    text: 'Data yang sudah dihapus tidak dapat dikembalikan.',

                    icon: 'warning',

                    showCancelButton: true,

                    confirmButtonColor: '#FFC107',

                    cancelButtonColor: '#dc3545',

                    confirmButtonText: 'Ya, Hapus',

                    cancelButtonText: 'Batal',

                    reverseButtons: true

                }).then((result)=>{

                    if(result.isConfirmed){

                        form.submit();

                    }

                });

            });

        });

    </script>

</body>

</html>