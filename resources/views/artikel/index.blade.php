
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Data artikel </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('artikel.create') }}" class="btn btn-md btn-success mb-3"> Tambah Artikel </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">DUE DATE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $artikel)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/artikel/') . $artikel->photo }}"
                                                class="rounded" style="width: 150px">

                                        </td>

                                        <td>{{ $artikel->due_date }}</td>

                                        <td>{!! $artikel->description !!}</td>

                                        <td class="text-center">
                                            <form onsubmit="return

confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('artikel.destroy', $artikel->id) }}" method="post">
                                                <a href="{{ route('artikel.edit', $artikel->id) }}"
                                                    class="btn

btn-sm btn-primary">EDIT</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data artikel belum

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js "></script>
    <script>
        //message with toastr
        @if (session() -> has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session() -> has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html>