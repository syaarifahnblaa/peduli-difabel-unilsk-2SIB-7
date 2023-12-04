<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama</label>

                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" placeholder="nama mahasiswa">

                                    <!-- error message untuk nama -->
                                    @error('nama')
                                    <div class="alert alert-dangermt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">NIM</label>

                                    <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" placeholder="nim mahasiswa"> <!-- error message untuk nim-->

                                    @error('nim')
                                    <div class=" alert alert-danger mt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>

                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email mahasiswa">

                                    <!-- error message untuk email -->
                                    @error('email')
                                    <div class="alert alert-dangermt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Jenis Konseling</label>

                                    <input type="text" class="form-control @error('jenis konseling') is-invalid @enderror" name="jenis konseling" placeholder="jenis konseling">

                                    <!-- error message untuk jenis konseling -->
                                    @error('jenis_konseling')
                                    <div class="alert alert-dangermt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Level</label>

                                    <input type="number" class="form-control @error('level') is-invalid @enderror"
                                        name="level" placeholder="level">

                                    <!-- error message untuk level -->
                                    @error('level')
                                    <div class="alert alert-dangermt-2">

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