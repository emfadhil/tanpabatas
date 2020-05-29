@extends('layouts.index')
@section('content')
@if ( Auth::user()->role != 'member')
<div class="container">
<div class="card shadow mb-4">
<div class="card-header py-3">
@php
//panggil master data
@endphp

<div class="section-title" data-aos="fade-up">
    <h2>Tambah Kategori</h2>
</div>
<form class="user" method="POST" action="{{ route('kategori.store') }}">
@csrf
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror" placeholder="Kategori" value="{{old('nama')}}" autofocus>
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
</div>
<button type="submit" name="proses" value="simpan" href="login.html" class="btn btn-primary">
    Simpan
</button>
 </form>
</div>
</div>
</div>
@else
  @include('auth.terlarang')
@endif
@endsection