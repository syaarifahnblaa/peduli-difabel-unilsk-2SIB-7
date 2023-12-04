<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Psikolog </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('dosen_7.update',

$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
    
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>

                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Biaya

Dosen" value="{{ $data->nama }}">

                                <!-- error message untuk cost -->
                                @error('nama')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NIP</label>

                                <input type="text" class="form-control
@error('nip') is-invalid @enderror" name="nip" value="{!! $data->nip !!}">
                                <!-- error message untuk nama

-->

                                @error('nama')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Keahlian</label>

                                <textarea class="form-control
@error('keahlian') is-invalid @enderror" name="keahlian" rows="5" placeholder="Masukkan Konten

Dosen">{{ $data->keahlian }}</textarea>

                                <!-- error message untuk keahlian

-->

                                @error('keahlian')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md

btn-primary">SIMPAN</button>

                            <button type="reset" class="btn btn-md

btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.
js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('keahlian');
    </script>
</body>

</html>
