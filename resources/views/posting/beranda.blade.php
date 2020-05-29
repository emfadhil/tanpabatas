@extends('layouts.index')
@section('content')

<div class="section-title" data-aos="fade-up">
    <h2>Info Fasilitas</h2>
</div>
{{-- cari informasi --}}
  <form action="{{ url('/search') }}" method="GET">
<div class="input-group mb-3">
    <input type="text" class="form-control" name="search" placeholder="Cari Inofrmasi" aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
      <button class="btn btn-warning" type="submit" id="button-addon2">Cari</button>
    </div>
</div>
  </form>
{{-- akhri cari informasi --}}
  <div class="row text-center">
    @foreach ($ar_posting as $posting)
    @if($posting->status == 'aktif')
    <div class="col-lg-3 col-md-6 mb-4 mt-2">
      <div class="card h-100">
        <img class="card-img-top" src="{{asset ('img/posting')}}/{{ $posting->ftempat}}" alt="">
        <div class="card-body">
          <h4 class="card-title">{{$posting->namaTempat}}</h4>
          <h6 class="card-title">{{$posting->kat}}</h6>
        </div>
        <div class="card-footer">
          <a href="{{ route('posting.show', $posting->id) }}"><i class="fas fa-search-plus"></i> <h6>Lihat fasilitas</h6></a>
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>
@endsection
