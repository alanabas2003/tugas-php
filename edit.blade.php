
@extends('adminlte::page')
@section('title', 'Detail mahasantri')
@section('content_header')
<h1>Form Buku</h1>
<br/><br/>
<a class="btn btn-primary btn-md"
href="{{ route('mahasantri.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left">Back</i></a>

@stop

@section('content') {{-- Isi Konten Data buku --}}
@php
    $rs1 = App\Models\pengarang::all();
    $rs2 = App\Models\penerbit::all();
    $rs3 = App\Models\kategori::all();
    
@endphp
@foreach($data as $d)
<form action="{{ route('mahasantri.update',$d->id) }}" method="POST">
@csrf
@method('put')
{{-- crosss-site request  forgery (CSRF) = pengcegahan serangang yang dilakukan oleh penguna yang tidak terautentiksi --}}
<div class="form-grup">
    <label for="">nama</label><input type="text" name="nama" value="{{ $d->nama }}" class="form-control">
</div>
<div class="form-grup">
    <label for="">Nim</label> <input type="text" name="nim" value="{{ $d->nim }}" class="form-control">
</div>
<div class="form-grup">
    <label for="">jurusan</label> <input type="text" name="jurusan" value="{{ $d->jurusan }}" class="form-control">
</div>
<div class="form-grup">
    <label for="">matakuliah</label> <input type="text" name="matakuliah" value="{{ $d->matakuliah }}" class="form-control">
</div>
<div class="form-grup">
    <label for="">dosen pengajar</label> <input type="text" name="dosen_pengajar" value="{{ $d->dosen_pengajar }}" class="form-control">
</div>

<button type="submit" class="btn btn-primary">simpan</button>
</form>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop