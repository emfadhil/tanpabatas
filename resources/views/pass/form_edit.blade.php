@extends('layouts.index')
@section('content')
@foreach ( $data as $rs )
<div class="section-title" data-aos="fade-up">
          <h2>Ubah Password</h2>
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
<form class="user" method="POST" action="{{ route('pass.update',$rs->id) }}"">
@csrf
@method('PUT')
     <div class="form-group">
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="No. email" value="{{ $rs->email }}" disabled>
         @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="No. password" value="{{ $rs->password }}">
         @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <button type="submit" name="proses" value="simpan" href="login.html" class="btn btn-primary">
         Simpan
    </button>
 </form>
@endforeach  
@endsection