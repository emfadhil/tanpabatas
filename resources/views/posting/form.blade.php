@extends('layouts.index')
@section('content')
@php
//panggil master data
$rskat = App\Kategori::all();
@endphp

<div class="container">
<div class="section-title" data-aos="fade-up">
    <h2>Tambah Informasi</h2>
</div> 
<div id="current" style="margin-left:35%">
<button onClick="getLocation()">Cek Lokasi</button>
</div>
<div id="map_canvas" style="width:0px; height:0px; margin-left:35%"></div>
<br/>
<div class="row">
<div class="col-md-12">
<form action="{{ route('posting.store') }}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-group row">
    <label for="getLat" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="getLat" name="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" value="" readonly>
      @error('latitude')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="getLong" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="getLong" name="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" value="" readonly>
      @error('longitude')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama Tempat</label> 
    <div class="col-8">
      <input id="namatempat" name="namaTempat" type="text" class="form-control @error('namaTempat') is-invalid @enderror" autofocus placeholder="nama tempat">
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
    <label for="kategori" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
            <option value="">-- Pilih kategori--</option>
            @foreach ( $rskat as $kategori )
                @php $sel = (old('kategori_id')==$kategori['id'])? 'selected' : ''; @endphp
                <option value="{{ $kategori['id'] }}" {{$sel}}>{{ $kategori['nama'] }}</option>
            @endforeach
         </select>
          @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <br/>
<!-- parkiran -->
  <div class="form-group row">
    <label class="col-4 col-form-label">Fasilitas</label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="cparkiran" id="parkiran_0" type="checkbox" class="custom-control-input" value="parkiran"> 
          <label for="parkiran_0" class="custom-control-label" data-toggle="popover" title="Yang ideal Spacenya -+ 4m" data-content="">Parikiran</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="kparkir" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="kparkir" name="kparkir" placeholder="kondisi parkir" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="parkir" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="fparkir" name="fparkir" type="file" class="form-control @error('fparkir') is-invalid @enderror">
      @error('fparkir')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
  <!-- guiding block -->
  <div class="form-group row">
    <label class="col-4 col-form-label"></label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="cgb" id="gb_0" type="checkbox" class="custom-control-input" value="gb"> 
          <label for="gb_0" class="custom-control-label" data-toggle="popover" title="Kotak berwarna kuning terang yang ada di trotoar jalan" data-content="">Guiding Blocks</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="kgb" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="kgb" name="kgb" placeholder="kondisi Guiding Blocks" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="fgb" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="fgb" name="fgb" type="file" class="form-control @error('fgb') is-invalid @enderror">
      @error('fgb')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- permukaan jalan -->
  <div class="form-group row">
    <label class="col-4 col-form-label"></label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="cpermukaan" id="permukaan_0" type="checkbox" class="custom-control-input" value="permukaan"> 
          <label for="permukaan_0" class="custom-control-label" data-toggle="popover" title="Permukaan yang sama rata itu sangat ideal" data-content="">Permukaan Jalan</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="kpj" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="kpj" name="kpj" placeholder="kondisi permukaan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="pj" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="fpj" name="fpj" type="file" class="form-control @error('fpj') is-invalid @enderror">
      @error('fpj')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- bidang miring -->
  <div class="form-group row">
    <label class="col-4 col-form-label"></label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="cbidangmiring" id="bidangmiring_0" type="checkbox" class="custom-control-input" value="bidang miring"> 
          <label for="bidangmiring_0" class="custom-control-label" data-toggle="popover" title="Pengganti tangga" data-content="">Bidang Miring</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="kbm" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="kbm" name="kbm" placeholder="kondisi bidangmiring" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="bm" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="fbm" name="fbm" type="file" class="form-control @error('fbm') is-invalid @enderror">
      @error('fbm')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- pintu -->
  <div class="form-group row">
    <label class="col-4 col-form-label"></label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="cpintu" id="pintu_0" type="checkbox" class="custom-control-input" value="pintu"> 
          <label for="pintu_0" class="custom-control-label" data-toggle="popover" title="Diharapkan mudah di buka dan luas bukaannya" data-content="">Pintu</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="kpintu" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="kpintu" name="kpintu" placeholder="kondisi pintu" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="fpintu" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="fpintu" name="fpintu" type="file" class="form-control @error('fpintu') is-invalid @enderror">
      @error('fpintu')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- parkiran -->
  <div class="form-group row">
    <label class="col-4 col-form-label"></label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="crunningtext" id="runningtext_0" type="checkbox" class="custom-control-input" value="runningtext"> 
          <label for="runningtext_0" class="custom-control-label" data-toggle="popover" title="Membantu teman tuna rungu untuk meliaht informasi" data-content="">Running Text</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="krt" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="krt" name="krt" placeholder="kondisi running text" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="frt" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="frt" name="frt" type="file" class="form-control @error('frt') is-invalid @enderror">
      @error('frt')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- lift -->
  <div class="form-group row">
    <label class="col-4 col-form-label"></label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="clift" id="lift_0" type="checkbox" class="custom-control-input" value="lift"> 
          <label for="lift_0" class="custom-control-label" data-toggle="popover" title="Idealnya terdapat tombol braile" data-content="">Lift</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="klift" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="klift" name="klift" placeholder="kondisi lift" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="flift" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="flift" name="flift" type="file" class="form-control @error('flift') is-invalid @enderror">
      @error('flift')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <!-- toilet -->
  <div class="form-group row">
    <label class="col-4 col-form-label"></label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-switch">
          <input name="ctoilet" id="toilet_0" type="checkbox" class="custom-control-input" value="toilet"> 
          <label for="toilet_0" class="custom-control-label" data-toggle="popover" title="Bukaan pintu toilet yang luas untuk teman tuna daksa" data-content="">Toilet</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="ktoilet" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <input id="ktoilet" name="ktoilet" placeholder="kondisi toilet" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">   
    <label for="ftoilet" class="col-4 col-form-label"></label>  
    <div class="col-8">
      <input id="ftoilet" name="ftoilet" type="file" class="form-control @error('ftoilet') is-invalid @enderror">
      @error('ftoilet')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  </div>
  <div class="form-group row">
    <label for="users_id" class="col-4 col-form-label"></label> 
    <div class="col-8">
    <input id="users_id" name="users_id" placeholder="id users" type="text" class="form-control" value="{{Auth::user()->id}}" hidden>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ url('/') }}" class="btn btn-primary "><i class="fas fa-undo"></i> Kembali</a>
    </div>
  </div>
</form>
</div>
</div>
</div>
@endsection