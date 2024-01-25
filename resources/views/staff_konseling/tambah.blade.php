@extends('template/master')
@section('content')
    <br>
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Staff Konseling</h3>
            </div>
            <form action="{{ route('staff_konseling.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label>Nama Staff Konseling</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama staff konseling">
                        </div>
                        <div class="col col-md-6 form-group">
                            <label>Jenis konseling</label>
                            <input type="text" class="form-control" id="jenis_konseling" name="jenis_konseling"
                                placeholder="Masukkan jenis konseling">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label>Tanggal Konseling</label>
                            <input type="date" class="form-control" id="tanggal_konseling" name="tanggal_konseling"
                                placeholder="Masukkan tanggal konseling">
                        </div>
                        <div class="col col-md-6 form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar"
                                placeholder="Masukkan gambar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label for="exampleInputFile">Deskripsi Konseling</label>
                            <div class="input-group">
                                <textarea id="deskripsi_form" class="form-control" name="deskripsi_konseling">
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('#deskripsi_form').summernote()
        })
    </script>
@endsection
