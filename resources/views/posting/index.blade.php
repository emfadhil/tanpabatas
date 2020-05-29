@extends('layouts.index')
@section('content')
@if (empty( Auth::user()->name) )
  @include('auth.terlarang')
@elseif ( Auth::user()->role != 'member')
@php
$no = 1;
    $ar_judul = ['No', 'Nama Tempat', 'Kategori', 'latitude', 'longitude', "Status", "Kontributor", 'Action'];
@endphp
<div class="section-title" data-aos="fade-up">
    <h2>Data Postingan</h2>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a href="{{ route('posting.create') }}" class="btn btn-info btn-user">
          <i class="fas fa-plus-square"></i> Tambah postingan
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
            @foreach ($ar_posting as $posting)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $posting->namaTempat }}</td>
                <td>{{ $posting->kat }}</td>
                <td>{{ $posting->latitude }}</td>
                <td>{{ $posting->longitude }}</td>
                @if($posting->status == 'aktif')
                <td><span class="badge badge-success">{{ $posting->status }}</span></td>
                @else
                <td><span class="badge badge-warning">{{ $posting->status }}</span></td>
                @endif
                <td>{{ $posting->us }}</td>
                <td>
                  <form method="POST" action="{{ route('posting.destroy',$posting->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('posting.show',$posting->id) }}" class="btn btn-primary"><i class="fas fa-binoculars"></i></a>&nbsp;
                    <a href="{{ route('posting.edit',$posting->id) }}" class="btn btn-warning"><i class="fas fa-highlighter"></i></a>&nbsp;
                    @if($posting->status == 'aktif')
                    <a href="{{ url('posting/nonaktif',$posting->id) }}" class="btn btn-success"><i class="fas fa-ban"></i></a>
                    @else
                    <a href="{{ url('posting/aktif',$posting->id) }}" class="btn btn-warning"><i class="fas fa-check"></i></a>
                    @endif
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" >
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