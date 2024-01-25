@extends('template/master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<br>
<div class="card">
    
   <div class="card-header">
       <h3 class="card-title">Data Table Artikel</h3>
   </div>
   <div class="card-body">
       <table id="table_artikel" class="table table-bordered table-striped">
            <div>
            <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
            </div>
            <br>
           <thead>
               <tr>
                    <th>No</th>
                    <th>Nama Artikel</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
            <?php $no = 0;?>
                @foreach($artikel as $data)
            <?php $no++ ;?>
               <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $data->nama}}</td>
                    <td><img src="{{ asset('storage/artikel/'.$data->gambar) }}" height="100px" width="100px" alt=""></td>
                    <td>{{ $data->deskripsi}}</td>
                    <td>{{ $data->tanggal}}</td>
                   <td>
                   <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('artikel.destroy', $data->id_artikel) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                           <a href="{{ route('artikel.edit', $data->id_artikel) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                           
                   </form>
                   </td>
               </tr>
               @endforeach
           </tbody>
       </table>
   </div>
</div>
@endsection
@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
$(function() {
   $("#table_artikel").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_artikel_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
