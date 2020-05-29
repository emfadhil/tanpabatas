@extends('layouts.index')
@section('content')
@if ( Auth::user()->role == 'admin')
@php
$ar_stat = ['aktif'=>'aktif','nonaktif'=>'nonaktif'];
$ar_role = ['admin'=>'admin','staff'=>'staff','member'=>'member'];
@endphp
<div class="section-title" data-aos="fade-up">
    <h2>Tambah Member</h2>
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
<form class="user" method="POST" action="{{ route('member.store') }}" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name Member" value="{{old('name')}}">
         @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
         @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" value="{{old('password')}}">
         @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">
            {{old('alamat')}}
        </textarea>
         @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
        <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="No. telp" value="{{old('telp')}}">
         @error('telp')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
    <div class="form-group row">   
    <label for="status" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <select name="status" class="form-control @error('status') is-invalid @enderror">
            <option value="">-- Pilih status--</option>
            @foreach ( $ar_stat as $status => $statuss )
                @php $sel = (old('status') == $status )? 'selected' : ''; @endphp
                <option value="{{ $status }}" {{$sel}}>{{ $statuss }}</option>
            @endforeach
         </select>
          @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="form-group row">   
    <label for="role" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <select name="role" class="form-control @error('role') is-invalid @enderror">
            <option value="">-- Pilih role--</option>
            @foreach ( $ar_role as $role => $roles )
                @php $sel = (old('role') == $role )? 'selected' : ''; @endphp
                <option value="{{ $role }}" {{$sel}}>{{ $roles }}</option>
            @endforeach
         </select>
          @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
     <div class="form-group">
      <label>Foto Member</label>
        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
         @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <button type="submit" name="proses" value="simpan" href="login.html" class="btn btn-primary">
         Simpan
    </button>
 </form>
@else
  @include('auth.terlarang')
@endif 
@endsection