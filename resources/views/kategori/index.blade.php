@extends('layouts.index')
@section('content')
@if ( Auth::user()->role != 'member')
<div class="container">
<div class="section-title" data-aos="fade-up">
          <h2>Data Kategori</h2>
        </div>
@php
$no = 1;
$ar_judul = ['No', 'Nama', 'Action'];
@endphp
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ route('kategori.create') }}" class="btn btn-info btn-user">
                  <i class="fas fa-plus-square"></i> Tambah Kategori
                </a>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    @foreach ($ar_judul as $jdl )
                      <th>{{ $jdl }}</th>  
                    @endforeach
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    @foreach ($ar_judul as $jdl )
                      <th>{{ $jdl }}</th>  
                    @endforeach
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ( $ar_kategori as $kategori )
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $kategori->nama }}</td>
                      <td>
                        <form method="POST" action="{{ route('kategori.destroy', $kategori->id)}}">
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning"><i class="fas fa-highlighter"></i></a>&nbsp;
                          <button type="submit" onclick="return confirm('Yakin dihapus ?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
@else
  @include('auth.terlarang')
@endif
@endsection
