@extends('layouts.main')
@section('title')
    halaman edit formulir
@endsection
    
@section('isi_konten')
    halaman edit formulir
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Formulir - Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route(
                            'formulir.update',
                        
                            $data->ID,
                        ) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">PHOTO</label>

                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="photo">
                                <!-- error message untuk title -->
                                @error('photo')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">COST</label>

                                <input type="number" class="form-control @error('cost') is-invalid @enderror"
                                    name="cost" placeholder="Biaya

Formulir" value="{{ $data->cost }}">

                                <!-- error message untuk cost -->
                                @error('cost')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">DUE

                                    DATE</label>

                                <input type="datetime-local"
                                    class="form-control
@error('due_date') is-invalid @enderror" name="due_date"
                                    value="{{ $data->due_date }}">
                                <!-- error message untuk due_date

-->

                                @error('due_date')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">DESCRIPTION</label>

                                <textarea class="form-control
@error('description') is-invalid @enderror" name="description" rows="5"
                                    placeholder="Masukkan Konten

Formulir">{{ $data->description }}</textarea>

                                <!-- error message untuk description

-->

                                @error('description')
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
        CKEDITOR.replace('description');
    </script>
</body>

</html>