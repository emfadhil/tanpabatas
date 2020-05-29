@extends('layouts.index')
@section('content')
@foreach ( $data as $rs )
<div class="section-title" data-aos="fade-up">
          <h2>Edit Profil</h2>
        </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="user" method="POST" action="{{ route('profil.update',$rs->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
     <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{ $rs->alamat }}</textarea>
         @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
        <label>No. Telp</label>
        <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="No. telp" value="{{ $rs->telp }}">
         @error('telp')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
      <label>Foto</label>
        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
         @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <button type="submit" name="proses" value="simpan" href="login.html" class="btn btn-primary">
         Simpan
    </button>
 </form>
@endforeach  
@endsection