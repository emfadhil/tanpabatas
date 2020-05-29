@extends('layouts.index')
@section('content')
<div class="container">
<div class="card shadow mb-4">
<div class="card-header py-3">
@php
//panggil master data
@endphp
@foreach ( $data as $rs )
    
<div class="section-title" data-aos="fade-up">
  <h2>Edit Kategori</h2>
</div>
<form class="user" method="POST" action="{{ route('kategori.update', $rs->id) }}">
@csrf
@method('PUT')
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Kategori" value="{{ $rs->nama}}" autofocus>
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
     <button type="submit" name="proses" value="ubah" href="login.html" class="btn btn-primary">
         Simpan
    </button>
 </form>
@endforeach
</div>
</div>
</div>
@endsection