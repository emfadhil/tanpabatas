@extends('layouts.index')
@section('content')
@php
$ar_stat = ['aktif'=>'aktif','nonaktif'=>'nonaktif'];
$ar_role = ['admin'=>'admin','staff'=>'staff','member'=>'member'];
@endphp
@foreach ( $data as $rs )
<div class="section-title" data-aos="fade-up">
    <h2>Edit Data Member</h2>
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
<form class="user" method="POST" action="{{ route('member.update',$rs->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="name" readonly class="form-control @error('name') is-invalid @enderror" placeholder="Name Member" value="{{ $rs->name }}">
         @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
     <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" readonly class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $rs->email }}">
         @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
     </div>
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
        <label>Role</label>  
        <select name="role" class="form-control @error('role') is-invalid @enderror">
                <option value="">-- Pilih role--</option>
                @foreach ( $ar_role as $role => $roles )
                    @php $sel = ($rs->role == $role )? 'selected' : ''; @endphp
                    <option value="{{ $role }}" {{$sel}}>{{ $roles }}</option>
                @endforeach
            </select>
            @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
        <label>Foto Member</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button type="submit" name="proses" value="simpan" href="login.html" class="btn btn-primary">
            Simpan
        </button>
        <a href="{{ route('pass.edit', $rs->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i> Ubah Password</a>
        <a href="{{ url('member') }}" class="btn btn-primary "><i class="fas fa-undo"></i> Kembali</a>
</form>
@endforeach  
@endsection