<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data konseling </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('konseling.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="form-group">
                                <labelclass="font-weight-bold">Nama</label>
                                    <input type="varchar" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" placeholder="Nama konseling">

                                    <!-- error message untuk cost -->
                                    @error('nama')
                                    <div class="alert alert-dangermt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <labelclass="font-weight-bold">Jenis</label>
                                    <input type="varchar" class="form-control @error('jenis') is-invalid @enderror"
                                        name="jenis" placeholder="Jenis konseling">

                                    <!-- error message untuk cost -->
                                    @error('jenis')
                                    <div class="alert alert-dangermt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">tanggal</label>

                                <textarea class="form-control
                                @error('tanggal') is-invalid @enderror"
                                    name="tanggal" rows="5"
                                    placeholder="Masukkan Tanggal">{{ old('tanggal') }}</textarea>
                                <!-- error message untuk description

-->

                                @error('tanggal')
                                <div class="alert alert-dangermt-2">

                                    {{ $message }}
                                </div>@enderror
                            </div>
                            <button type="submit" class="btn btn-mdbtn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-mdbtn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <scriptsrc="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <scriptsrc="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
            </script>
            <scriptsrc="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js">
                </script>
                <script>
                CKEDITOR.replace('description');
                </script>
</body>

</html>