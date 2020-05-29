@extends('layouts.index')
@section('content')
@php
    $no = 1;
    $rsposting = App\Posting::all();
@endphp
<div class="container">
<div class="section-title" data-aos="fade-up">
          <h2>Detail Profil</h2>
        </div>
    <div class="jumbotron">
    <h1 class="display-4">Halo, {{ Auth::user()->name }}</h1>
        <p class="lead">Ini adalah halaman profil kamu, kamu bisa liat liat hasil kontribusi kamu kepada kami, Terimakasih ya.</p>
        <hr class="my-4">
      </div>

      @foreach ($ar_profil as $profil)
      @if($profil->email == Auth::user()->email)
        
         <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="{{ asset('img/member') }}/{{ $profil->foto }}">
        </div>
        <div class="card-block px-2">
            <h4 class="card-title">{{ $profil->name }}</h4>
            <p class="card-text">{{ $profil->email }}</p>
            <p class="card-text">{{ $profil->alamat }}</p>
            <p class="card-text">{{ $profil->telp }}</p>
            <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-primary">Edit Data Diri</a>
            <a href="{{ route('pass.edit', $profil->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i> Ubah Password</a>
        </div>
        <div class="w-100"></div>
        </div>
        <br/>
        <div class="section-title" data-aos="fade-up">
          <h4>Kontribusi Kamu</h4>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($rsposting as $posting)
        @if (Auth::user()->id == $posting->users_id)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{$posting->namaTempat}}</td>
            @if($posting->status == 'aktif')
                <td><span class="badge badge-success">{{ $posting->status }}</span></td>
            @else
            <td><span class="badge badge-warning">{{$posting->status}}</span></td>
            @endif
        </tr>
        @endif    
        @endforeach
        </tbody>
    </table>
    
</div>    
@endif
@endforeach
@endsection
