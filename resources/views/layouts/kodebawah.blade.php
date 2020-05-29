<!-- Vendor JS Files -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/venobox/venobox.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>
  
{{-- modif --}}
  <script src="{{ asset('vendor2/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor2/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js2/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('js2/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>

  {{-- geolocation html --}}
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script>
      var y = document.getElementById('getLat');
      var z = document.getElementById('getLong');

      function getLocation(){
          if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
          }else{
              x.innerHTML = "Not Support";
          }
      }

      function showPosition(position){        
        y.value = position.coords.latitude;
        z.value = position.coords.longitude;
      }
  </script>
</body>
</html>