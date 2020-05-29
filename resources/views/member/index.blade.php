@extends('layouts.index')
@section('content')
@if ( Auth::user()->role == 'admin')
@php
$no = 1;
    $ar_judul = ['No', 'Nama', 'Email', 'Alamat', 'Telp', "Status", "Role", 'Action'];
@endphp
<div class="section-title" data-aos="fade-up">
          <h2>Data Member</h2>
        </div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a href="{{ route('member.create') }}" class="btn btn-info btn-user">
          <i class="fas fa-plus-square"></i> Tambah Member
        </a>
        <a href="{{ url('exportmember') }}" class="btn btn-success btn-user">
          <i class="fas fa-file-excel"></i> Unduh Data Member
        </a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                @foreach ($ar_judul as $judul)
                <th>{{ $judul }}</th>                    
                @endforeach
            </tr>
          </thead>
          <tfoot>
            <tr>
                @foreach ($ar_judul as $judul)
                <th>{{ $judul }}</th>                    
                @endforeach
            </tr>
          </tfoot>
          <tbody>
            @foreach ($ar_member as $member)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->alamat }}</td>
                <td>{{ $member->telp }}</td>
                @if($member->status == 'aktif')
                <td><span class="badge badge-success">{{ $member->status }}</span></td>
                @else
                <td><span class="badge badge-danger">{{ $member->status }}</span></td>
                @endif
                <td>{{ $member->role }}</td>
                <td>
                  <form method="POST" action="{{ route('member.destroy',$member->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('member.show',$member->id) }}" class="btn btn-primary"><i class="fas fa-binoculars"></i></a>&nbsp;
                    <a href="{{ route('member.edit',$member->id) }}" class="btn btn-warning"><i class="fas fa-highlighter"></i></a>&nbsp;
                    @if($member->status == 'aktif')
                    <a href="{{ url('member/nonaktif',$member->id) }}" class="btn btn-success"><i class="fas fa-ban"></i></a>
                    @else
                    <a href="{{ url('member/aktif',$member->id) }}" class="btn btn-warning"><i class="fas fa-check"></i></a>
                    @endif
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')" >
                    <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </td>
              </tr>          
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>   
@else
  @include('auth.terlarang')
@endif 
@endsection