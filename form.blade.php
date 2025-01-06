
@extends('adminlte::page')
@section('title', 'Data mahasantrii')
@section('content_header')
<h1>Form mahasantri</h1>
<br/><br/>
<a class="btn btn-primary btn-md"
href="{{ route('mahasantri.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left">Back</i></a>

@stop

@section('content') {{-- Isi Konten Data mahasantri --}}
@if($errors->any())
<div class="alert alert-danger">
<ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
</ul>
</div>
@endif
<form method="POST" action="{{ route('mahasantri.store') }} " method="POTS" enctype="multipart/form-data">
@csrf
{{-- crosss-site request  forgery (CSRF) = pengcegahan serangang yang dilakukan oleh penguna yang tidak terautentiksi --}}
<div class="form-grup">
    <label for="">Nama</label><input type="text" name="nama" class="form-control">
</div>
<div class="form-grup">
    <label for="">Nim</label> <input type="text" name="nim" class="form-control">
</div>
<div class="form-grup">
    <label for="">jurusan</label> <textarea name="jurusan" class="form-control"></textarea>
</div>
<div class="form-grup">
    <label for="">mata kuliah</label> <input type="text" name="matakuliah" class="form-control">
</div>
<div class="form-grup">
    <label for="">dosen pengajar</label> <input type="text" name="dosen_pengajar" class="form-control">
</div>
<button type="submit" class="btn btn-primary">simpan</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop