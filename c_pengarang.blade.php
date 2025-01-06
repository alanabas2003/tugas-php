
@extends('adminlte::page')
@section('title', 'Data Buku')
@section('content_header')
<h1>Form Buku</h1>
<br/><br/>
<a class="btn btn-primary btn-md"
href="{{ route('buku.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left">Back</i></a>

@stop

@section('content') {{-- Isi Konten Data buku --}}
@php
    $rs1 = App\Models\pengarang::all();
    $rs2 = App\Models\penerbit::all();
    $rs3 = App\Models\kategori::all();
    
@endphp
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form method="POST" action="{{ route('buku.store') }}">
@csrf
{{-- crosss-site request  forgery (CSRF) = pengcegahan serangang yang dilakukan oleh penguna yang tidak terautentiksi --}}
<div class="form-grup">
    <label for="">ISBN</label><input type="text" name="isbn" class="form-control">
</div>
<div class="form-grup">
    <label for="">Judul</label> <input type="text" name="judul" class="form-control">
</div>
<div class="form-grup">
    <label for="">tahun cetak</label> <input type="text" name="tahun_cetak" class="form-control">
</div>
<div class="form-grup">
    <label for="">stok</label> <input type="text" name="stok" class="form-control">
</div>
<div class="form-group">
<label>Pengarang</label>
<select class="form-control" name="idpengarang">
<option value="">-- Pilih Pengarang --</option>
@foreach($rs1 as $p)
<option value="{{ $p->id }}">{{ $p->nama }}</option>
@endforeach
</select>
{{-- Panggil master data penerbit untuk ditampilkan di element form select --}}
<div class="form-group">
<label>Penerbit</label>
<select class="form-control" name="idpenerbit">
<option value="">-- Pilih Penerbit --</option>
@foreach($rs2 as $pen)
<option value=
"{{ $pen->id }}">{{ $pen->nama }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label>Kategori</label><br/>
@foreach($rs3 as $k)
<input type="radio" name="idkategori"
value="{{ $k->id }}"/>{{ $k->nama }} &nbsp; &nbsp;
@endforeach
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