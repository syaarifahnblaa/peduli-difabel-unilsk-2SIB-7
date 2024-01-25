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
       <h3 class="card-title">Data Table Jadwal</h3>
   </div>
   <div class="card-body">
       <table id="table_jadwal" class="table table-bordered table-striped">
            <div>
            <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>
            </div>
            <br>
           <thead>
               <tr>
                    <th>No</th>
                    <th>Judul Seminar</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Seminar</th>
                    <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
            <?php $no = 0;?>
                @foreach($jadwal as $data)
            <?php $no++ ;?>
               <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $data->judul_seminar}}</td>
                    <td>{{ $data->deskripsi}}</td>
                    <td>{{ $data->tanggal_seminar}}</td>
                   <td>
                   <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jadwal.destroy', $data->id_jadwal) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                           <a href="{{ route('jadwal.edit', $data->id_jadwal) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                           
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
   $("#table_jadwal").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_jadwal_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
