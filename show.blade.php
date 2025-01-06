
@extends('adminlte::page')
@section('title', 'Detail Buku')
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
@foreach($ar_buku as $b)
<form >
@csrf
{{-- crosss-site request  forgery (CSRF) = pengcegahan serangang yang dilakukan oleh penguna yang tidak terautentiksi --}}
<div class="form-grup">
    <label for="">nama</label><input type="text" placeholder="{{ $pen->nama }}" class="form-control" disabled>
</div>
<div class="form-grup">
    <label for="">email</label> <input type="email" placeholder="{{ $pen->email }}" class="form-control" disabled>
</div>
<div class="form-grup">
    <label for="">no</label> <input type="text" placeholder="{{ $pen->no }}" class="form-control" disabled>
</div>
<div class="form-grup">
    <label for="">stok</label> <input type="text" placeholder="{{ $b->stok }}" class="form-control">
</div>
<div class="form-group">
<label>Pengarang</label>
<select class="form-control" name="idpengarang" disabled>
<option value="">-- Pilih Pengarang --</option>
@foreach($rs1 as $p)
@php
$sel1 = ($p->id == $b->idpengarang) ? 'selected' : '';
@endphp
<option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
@endforeach
</select>
{{-- Panggil master data penerbit untuk ditampilkan di element form select --}}
<div class="form-group">
<label>Penerbit</label>
<select class="form-control" name="idpenerbit" disabled>
<option value="">-- Pilih Penerbit --</option>
@foreach($rs2 as $pen)
@php
$sel2 = ($pen->id == $b->idpenerbit) ? 'selected' : '';
@endphp
<option value="{{ $pen->id }}" {{ $sel2 }}>{{ $pen->nama }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label>Kategori</label><br/>
@foreach($rs3 as $k)
@php
$cek = ($k->id == $b->idkategori) ? 'checked' : '';
@endphp
<input type="radio" name="idkategori" value="{{ $k->id }}" {{ $cek }} disabled> {{ $k->nama }}&nbsp; &nbsp;
@endforeach
</div>
<button type="submit" class="btn btn-primary"
name="proses">Ubah</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
</form>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop