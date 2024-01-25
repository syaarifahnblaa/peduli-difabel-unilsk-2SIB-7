@extends('template/master')
@section('content')
    <br>
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Data jadwal</h3>
            </div>
            <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label>Judul Seminar</label>
                            <input type="text" class="form-control" id="judul_seminar" name="judul_seminar"
                                value="{{ $jadwal->judul_seminar }}">
                        </div>
                        <div class="col col-md-6 form-group">
                            <label>Tanggal Seminar</label>
                            <input type="date" class="form-control" id="tanggal_seminar" name="tanggal_seminar"
                                value="{{ $jadwal->tanggal_seminar }}">
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
