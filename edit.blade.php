
@extends('adminlte::page')
@section('title', 'Detail penerbit')
@section('content_header')
<h1>Form Penerbit</h1>
<br/><br/>
<a class="btn btn-primary btn-md"
href="{{ route('penerbit.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left">Back</i></a>

@stop

@section('content') {{-- Isi Konten Data buku --}}
@php
    $rs1 = App\Models\pengarang::all();
    $rs2 = App\Models\penerbit::all();
    $rs3 = App\Models\kategori::all();
    
@endphp
@foreach($data as $d)
<form action="{{ route('penerbit.update',$d->id) }}" method="POST">
@csrf
@method('put')
{{-- crosss-site request  forgery (CSRF) = pengcegahan serangang yang dilakukan oleh penguna yang tidak terautentiksi --}}
<div class="form-grup">
    <label for="">ISBN</label><input type="text" name="isbn" value="{{ $d->isbn }}" class="form-control">
</div>
<div class="form-grup">
    <label for="">Judul</label> <input type="text" name="judul" value="{{ $d->judul }}" class="form-control">
</div>
<div class="form-grup">
    <label for="">tahun cetak</label> <input type="text" name="tahun_cetak" value="{{ $d->tahun_cetak }}" class="form-control">
</div>
<div class="form-grup">
    <label for="">stok</label> <input type="text" name="stok" value="{{ $d->stok }}" class="form-control">
</div>
<div class="form-group">
<label>Pengarang</label>
<select class="form-control" name="idpengarang" >
<option value="">-- Pilih Pengarang --</option>
@foreach($rs1 as $p)
@php
$sel1 = ($p->id == $d->idpengarang) ? 'selected' : '';
@endphp
<option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
@endforeach
</select>
{{-- Panggil master data penerbit untuk ditampilkan di element form select --}}
<div class="form-group">
<label>Penerbit</label>
<select class="form-control" name="idpenerbit" >
<option value="">-- Pilih Penerbit --</option>
@foreach($rs2 as $pen)
@php
$sel2 = ($pen->id == $d->idpenerbit) ? 'selected' : '';
@endphp
<option value="{{ $pen->id }}" {{ $sel2 }}>{{ $pen->nama }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label>Kategori</label><br/>
@foreach($rs3 as $k)
@php
$cek = ($k->id == $d->idkategori) ? 'checked' : '';
@endphp
<input type="radio" name="idkategori" value="{{ $k->id }}" {{ $cek }} > {{ $k->nama }}&nbsp; &nbsp;
@endforeach
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