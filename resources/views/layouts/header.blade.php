<!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        {{-- <h1 class="text-light"><a href="index.html"><span>Eterna</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{url('/')}}"><img src="{{ asset('img/logo/logo3.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url('/') }}">Beranda</a></li>
          @if (!empty( Auth::user()->role ))
          @if ( Auth::user()->role != 'member' )
          <li class="drop-down"><a href="">Kelola</a>
            <ul>
              <li><a href="{{ url('kategori') }}">Kategori</a></li>
              <li><a href="{{ url('posting') }}">Postingan</a></li>
            </ul>
          </li>
          @else
          @endif
          @else
          @endif
          <li><a data-toggle="modal" data-target="#staticBackdrop1" href="{{'/'}}">Tentang Kami</a></li>
          <li><a data-toggle="modal" data-target="#staticBackdrop" href="{{'/'}}">Bantuan</a></li>
          
          @if (empty( Auth::user()->name) )
          <li><a href="{{url('register')}}">Daftar</a></li>
          <li><a href=""> | </a></li>
          <li><a href="{{url('login')}}">Masuk</a></li>
          @else
          <li class="drop-down"><a href="">Halo, {{ Auth::user()->name }}</a>
            <ul>
              <li><a href="{{ url('profil') }}">Profil Saya</a></li>
              @if( Auth::user()->role == 'admin')
              <li><a href="{{ url('member') }}">Kelola Member</a></li>
              @else
              @endif
              <li><a href="{{ route('posting.create') }}">Tambah Info Fasilitas</a></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" 
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

 
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-warning">
        <h5 class="modal-title" id="staticBackdropLabel">Cara berbagi informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
        <h5>Pastikan kamu telah terdaftar yaa</h5>
        <p>1. Login dengan email kamu</p>
        <p>2. Klik nama kamu pada topbar sisi kanan</p>
        <p>3. Pilih 'Tambah Info Fasilitas'</p>
        <p>4. Pastiin kamu allow akses lokasi kamu yaa</p>
      </div>
      <div class="modal-footer text-white bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal1 -->
<div class="modal fade" id="staticBackdrop1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-warning">
        <h5 class="modal-title" id="staticBackdropLabel">Tentang Kami</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
        <h5>Kelompok 10</h5>
        <p align="justify">
        Kami,<br/> 
        ~ Anisya Ayu Dewanti<br/>
        ~ Ema Karima<br/>
        ~ Muhamad Fadillah<br/><br/> 
        Adalah peserta didik dari program Techmuda Batch 4 yang
        diselenggarakan oleh Plan Indonesia bersama NF Computer. Dalam rangka tugas akhir Web 
        Development, kami ingin meng-implementasi-kan hasil pelatihan yang kami dapat kedalam sebuah website sederhana
        yang bertujuan untuk membantu teman teman disabilitas mendapatkan informasi mengenai fasilitas di suatu tempat 
        umum yang dapat memudahkan aksesibilitas mereka.  
        </p>
      </div>
      <div class="modal-footer text-white bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>


  