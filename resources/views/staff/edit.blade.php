<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Staff Konseling</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('staff.update',
                             $data->id_staff) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                    <input type="text" class="form-control @error('nama_staff') is-invalid @enderror"
                                        name="nama_staff" placeholder="Nama staff" value="{{ $data->nama_staff }}" >

                                    <!-- error message untuk cost -->
                                    @error('nama_staff')
                                    <div class="alert alert-dangermt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Konseling</label>
                                    <input type="text" class="form-control @error('jenis_konseling') is-invalid @enderror"
                                        name="jenis_konseling" placeholder="jenis_konseling Konseling" value="{{ $data->jenis_konseling }}" >

                                    <!-- error message untuk cost -->
                                    @error('nama_staff')
                                    <div class="alert alert-dangermt-2">

                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi Konseling</label>
                                    <input type="text" class="form-control @error('deskripsi_konseling') is-invalid @enderror"
                                        name="deskripsi_konseling"  value="{{ $data->deskripsi_konseling }}" >

                                    <!-- error message untuk cost -->
                                    @error('nama_staff')
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