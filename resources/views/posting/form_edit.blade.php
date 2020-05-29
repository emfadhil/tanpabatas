@extends('layouts.index')
@section('content')
<div class="container">
<div class="section-title" data-aos="fade-up">
    <h2>Edit Data Postingan</h2>
</div>
<div class="card shadow mb-4">
<div class="card-header py-3">
@php
//panggil master data
$rskat = App\Kategori::all();
$ar_status = ['aktif'=>'aktif', 'moderasi'=>'moderasi'];
@endphp
@foreach ( $data as $rs )    
<form class="user" method="POST" action="{{ route('posting.update', $rs->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama Tempat</label> 
    <div class="col-8">
    <input id="namatempat" name="namaTempat" type="text" class="form-control @error('namaTempat') is-invalid @enderror" autofocus placeholder="nama tempat" value="{{$rs->namaTempat}}">
      @error('namaTempat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="form-group row">   
    <label for="tempat" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="ftempat" name="ftempat" type="file" class="form-control @error('ftempat') is-invalid @enderror">
      @error('ftempat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <br/>
  <div class="form-group row">   
    <label for="kategori" class="col-4 col-form-label">Kategori</label>  
    <div class="col-8">
      <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
            <option value="">-- Pilih kategori--</option>
            @foreach ( $rskat as $kategori )
                @php $sel = ($rs->kategori_id == $kategori['id'])? 'selected' : ''; @endphp
                <option value="{{ $kategori['id'] }}" {{$sel}}>{{ $kategori['nama'] }}</option>
            @endforeach
         </select>
          @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <br/>
<!-- parkiran -->
  <div class="form-group row">
    <label for="kparkir" class="col-4 col-form-label">Parkiran</label> 
    <div class="col-8">
      <input name="kparkir" placeholder="kondisi kparkir" type="text" class="form-control" value="{{$rs->kparkir}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="parkir" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input name="fparkir" type="file" class="form-control @error('fparkir') is-invalid @enderror">
      @error('fparkir')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <!-- guiding block -->
    <div class="form-group row">
    <label for="kgb" class="col-4 col-form-label">Guiding Blocks</label> 
    <div class="col-8">
      <input name="kgb" placeholder="kondisi Guiding Blocks" type="text" class="form-control" value="{{$rs->kgb}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="fgb" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input name="fgb" type="file" class="form-control @error('fgb') is-invalid @enderror">
      @error('fgb')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- permukaan jalan -->
  <div class="form-group row">
    <label for="kpj" class="col-4 col-form-label">Permukaan Jalan</label> 
    <div class="col-8">
      <input name="kpj" placeholder="kondisi permukaan" type="text" class="form-control" value="{{$rs->kpj}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="pj" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input name="fpj" type="file" class="form-control @error('fpj') is-invalid @enderror">
      @error('fpj')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- bidang miring -->
  <div class="form-group row">
    <label for="kbm" class="col-4 col-form-label">Bidang Miring</label> 
    <div class="col-8">
      <input name="kbm" placeholder="kondisi bidangmiring" type="text" class="form-control" value="{{$rs->kbm}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="bm" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input name="fbm" type="file" class="form-control @error('fbm') is-invalid @enderror">
      @error('fbm')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- pintu -->
  <div class="form-group row">
    <label for="kpintu" class="col-4 col-form-label">Pintu</label> 
    <div class="col-8">
      <input name="kpintu" placeholder="kondisi pintu" type="text" class="form-control" value="{{$rs->kpintu}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="fpintu" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input name="fpintu" type="file" class="form-control @error('fpintu') is-invalid @enderror">
      @error('fpintu')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- parkiran -->
  <div class="form-group row">
    <label for="krt" class="col-4 col-form-label">Running Text</label> 
    <div class="col-8">
      <input name="krt" placeholder="kondisi running text" type="text" class="form-control" value="{{$rs->krt}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="frt" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input name="frt" type="file" class="form-control @error('frt') is-invalid @enderror">
      @error('frt')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- lift -->
  <div class="form-group row">
    <label for="klift" class="col-4 col-form-label">Lift</label> 
    <div class="col-8">
      <input name="klift" placeholder="kondisi lift" type="text" class="form-control" value="{{$rs->klift}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="flift" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input  name="flift" type="file" class="form-control @error('flift') is-invalid @enderror">
      @error('flift')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- toilet -->
  <div class="form-group row">
    <label for="ktoilet" class="col-4 col-form-label">Toilet</label> 
    <div class="col-8">
      <input name="ktoilet" placeholder="kondisi toilet" type="text" class="form-control" value="{{$rs->ktoilet}}">
    </div>
  </div>
  <div class="form-group row">   
    <label for="ftoilet" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input  name="ftoilet" type="file" class="form-control @error('ftoilet') is-invalid @enderror">
      @error('ftoilet')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <div class="form-group row">
    <label for="users_id" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="users_id" name="users_id" placeholder="id users" type="text" class="form-control" value="{{$rs->users_id}}" hidden>
    </div>
  </div>
     <button type="submit" name="proses" value="ubah" href="login.html" class="btn btn-primary">
         Simpan
    </button>
    <a href="{{ url('/posting') }}" class="btn btn-primary "><i class="fas fa-undo"></i> Kembali</a>
 </form>
@endforeach
</div>
</div>
</div>
@endsection