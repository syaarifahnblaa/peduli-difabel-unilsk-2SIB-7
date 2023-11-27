<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Staff Konseling</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: pink">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('staff.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA STAFF </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA STAFF</th>
                                    <th scope="col">JENIS</th>
                                    <th scope="col">DESKRIPSI KONSELING</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $staff)
                                <tr>
                                    <td>{{ $staff->nama_staff}}</td>
                                    <td>{{ $staff->jenis_konseling}}</td>
                                    <td>{!! $staff->deskripsi_konseling !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" 
                                        action="{{route('staff.destroy', $staff->id_staff) }}" method="post">
                                            <a href="{{route('staff.edit', $staff->id_staff) }}" 
                                            class="btnbtn-sm btn-primary">
                                            EDIT</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Staff konseling belum

                                    Tersedia.

                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js
"></script>
    <script>
    // //message with toastr
    // if(session() - > has('success'))
    // toastr.success('{{ session('
    //     success ') }}', 'BERHASIL!');
    // elseif(session() - > has('error'))
    // toastr.error('{{ session('
    //     error ') }}', 'GAGAL!');
    // endif
    </script>
</body>

</html>