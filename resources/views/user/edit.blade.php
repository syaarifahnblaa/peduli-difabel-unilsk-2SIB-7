<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data  - Penambahan Data User </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('user.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                            <div class="form-group">
                                <label class="font-weight-bold">nama</label>

                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="data barang" value="{{ $data->nama }}">

                                <!-- error message untuk cost -->
                                @error('nama')
                                <div class="alert alert-dangermt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">jenis_konseling</label>

                                <input type="text" class="form-control
@error('jenis_konseling') is-invalid @enderror" name="jenis_konseling" value="{!! $data->jenis_konseling!!}">
                                <!-- error message untuk nama

-->

                                @error('jenis_konseling')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">email</label>

                                <textarea class="form-control
@error('email') is-invalid @enderror" name="email" rows="5" placeholder="Masukkan Email">{{ $data->email }} 

                                <!-- error message untuk email

-->

                                @error('email')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">jenis_konseling</label>

                                <input type="text" class="form-control
@error('jenis_konseling') is-invalid @enderror" name="jenis_konseling" value="{!! $data->jenis_konseling!!}">
                                <!-- error message untuk nama

-->

                                @error('jenis_konseling')
                                <div class="alert alert-danger mt-2"

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">level</label>

                                <input type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{!! $data->level!!}">
                                <!-- error message untuk nama-->

                                @error('level')
                                <div class="alert alert-danger mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>

                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('email');
    </script>
</body>

</html>