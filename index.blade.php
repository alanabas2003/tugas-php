
@extends('adminlte::page')
@section('title', 'Data penerbit')
@section('content_header')
<h1><i class="fa fa-user"> Data penerbit</i></h1>
@stop

@section('content') {{-- Isi Konten Data Pegawai --}}
@if(session('success'))
<div class="alert alert-info">
    {{ session('success')}}
</div>
@endif 
@php
$ar_judul = ['No','nama','alamat','email','website','No hp','Action'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md"href="{{ route('penerbit.create') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-plus"> tambah penerbit</i></a>
<br/><br/>
<div class="card">
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
@foreach($ar_judul as $jdl)
<th>{{ $jdl }}</th>
@endforeach
</tr>
<tbody>
@foreach($ar_penerbit as $pe)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $pe->nama }}</td>
<td>{{ $pe->alamat }}</td>
<td>{{ $pe->email }}</td>
<td>{{ $pe->website }}</td>
<td>{{ $pe->telp }}</td>
<td>
    <form action="{{ route('penerbit.destroy',$pe->id) }}" method="POST">
        @csrf
        @method('delete')
        <a href="{{ route('penerbit.show',$pe->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
        <a href="{{ route('penerbit.edit',$pe->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
        <button class="btn btn-danger" onclick="return confirm('anda yakin data dihapus ?')"><i class="fa fa-trash"></i></button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</thead>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="/css/admin_custom.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset ('/css/admin_custom.css') }}">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script> console.log('Hi!'); </script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script> console.log('Hi!'); </script>
@stop