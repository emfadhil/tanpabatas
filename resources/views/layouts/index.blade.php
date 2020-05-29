@include('layouts.kodeatas')
@include('layouts.topbar')
@include('layouts.header')
@include('layouts.carousel')
<main id="main">
{{-- @include('layouts.feature') --}}
<div class="container">
@yield('content')
</div>
@include('layouts.about')
@include('layouts.service')
@include('layouts.client')
</main><!-- End #main -->
@include('layouts.footer')
@include('layouts.kodebawah')

