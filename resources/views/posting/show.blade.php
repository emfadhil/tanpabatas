
@extends('layouts.index')
@section('content')
<div class="container">
  @foreach ( $ar_posting as $posting )
  <h2 align="center">{{$posting->namaTempat}}</h2>
<center>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->fparkir) ) 
                <img src="{{ asset ('img/posting/detail/parkiran')}}/{{ $posting->fparkir }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                    <h5 class="card-title">Fasilitas Parkir</h5>
                @if(!empty($posting->kparkir) )    
                    <p class="card-text">{{$posting->kparkir}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->fbm) ) 
                <img src="{{ asset ('img/posting/detail/bm')}}/{{ $posting->fbm }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                    <h5 class="card-title">Fasilitas Bidang Miring</h5>
                @if(!empty($posting->kbm) )    
                    <p class="card-text">{{$posting->kbm}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
     </div>

      <div class="carousel-item">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->fgb) ) 
                <img src="{{ asset ('img/posting/detail/gb')}}/{{ $posting->fgb }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                    <h5 class="card-title">Fasilitas Guiding Blocks</h5>
                @if(!empty($posting->kgb) )    
                    <p class="card-text">{{$posting->kgb}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
      </div>

     <div class="carousel-item">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->flift) ) 
                <img src="{{ asset ('img/posting/detail/lift')}}/{{ $posting->flift }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                    <h5 class="card-title">Fasilitas Lift</h5>
                @if(!empty($posting->klift) )    
                    <p class="card-text">{{$posting->klift}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
     </div>

     <div class="carousel-item">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->fpintu) ) 
                <img src="{{ asset ('img/posting/detail/pintu')}}/{{ $posting->fpintu }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                <h5 class="card-title">Fasilitas Pintu</h5>
                @if(!empty($posting->kpintu) )    
                    <p class="card-text">{{$posting->kpintu}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
     </div>

     <div class="carousel-item">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->fpj) ) 
                <img src="{{ asset ('img/posting/detail/pj')}}/{{ $posting->fpj }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                    <h5 class="card-title">Fasilitas Permukaan Jalan</h5>
                @if(!empty($posting->kpj) )    
                    <p class="card-text">{{$posting->kpj}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
     </div>

     <div class="carousel-item">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->frt) ) 
                <img src="{{ asset ('img/posting/detail/rt')}}/{{ $posting->frt }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                    <h5 class="card-title">Fasilitas Running Text</h5>
                @if(!empty($posting->krt) )    
                    <p class="card-text">{{$posting->krt}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
     </div>

     <div class="carousel-item">
        <div class="card mb-3" style="width: 18rem;">
            @if(!empty($posting->ftoilet) ) 
                <img src="{{ asset ('img/posting/detail/toilet')}}/{{ $posting->ftoilet }}" class="card-img-top">
            @else
                <img src="{{asset ('img/nopict.png')}}" class="card-img-top">
            @endif    
            <div class="card-body">
                <h5 class="card-title">Fasilitas Toilet</h5>
                @if(!empty($posting->ktoilet) )    
                    <p class="card-text">{{$posting->ktoilet}}</p>
                @else
                    <p class="card-text">Belum ada informasi</p>
                @endif
            </div>
        </div>
     </div>  
    </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
  </div>
</div>
</center>
  @endforeach
<center>  
<a href="{{ url('https://www.google.com/maps?q=loc:'.$posting->latitude .','.$posting->longitude.'' ) }}" target="_blank" class="btn btn-primary "><i class="fas fa-map-marker-alt"></i> Cek Lokasi</a>        
@if (!empty( Auth::user()->role ))
        @if ( Auth::user()->role != 'member' )
<a href="{{ url('/posting') }}" class="btn btn-primary "><i class="fas fa-undo"></i> Kembali</a>
        @else
<a href="{{ url('/') }}" class="btn btn-primary "><i class="fas fa-undo"></i> Kembali</a>
        @endif
@else
<a href="{{ url('/') }}" class="btn btn-primary "><i class="fas fa-undo"></i> Kembali</a>
@endif
</center>
</div>
@endsection






