@extends('template/master')
@section('content')
    <br>
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Data Artikel</h3>
            </div>
            <form action="{{ route('artikel.update', $artikel->id_artikel) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label>Nama artikel</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $artikel->tanggal }}">
                        </div>
                        <div class="col col-md-6 form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar"
                                value="{{ $artikel->gambar }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ $artikel->tanggal }}">
                        </div>
                        <div class="col col-md-6 form-group">
                            <label for="exampleInputFile">Deskripsi</label>
                            <div class="input-group">
                                <textarea id="deskripsi_form" class="form-control" name="deskripsi">
                                    {{ $artikel->deskripsi }}
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
