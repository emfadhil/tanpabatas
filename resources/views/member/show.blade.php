@extends('layouts.index')
@section('content')
@foreach ( $ar_member as $member )
    <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil Member</h6>
         </div>
         <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="{{ asset('img/member') }}/{{ $member->foto }}">
        </div>
        <div class="card-block px-2">
            <h4 class="card-title">{{ $member->name }}</h4>
            <p class="card-text">{{ $member->email }}</p>
            <p class="card-text">{{ $member->alamat }}</p>
            <p class="card-text">{{ $member->telp }}</p>
        </div>
        <div class="w-100"></div>
        </div>
        <a href="{{ url('member') }}" class="btn btn-primary "><i class="fas fa-undo"></i> Kembali</a>
    </div>
@endforeach
@endsection