<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tanpa Batas | There is no obstacel to stepping</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/logo/logo.png') }}" rel="icon">
  <link href="{{ asset('img/logo/logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/venobox/venobox.css') }}" rel="stylesheet">
  {{-- unutk tabel, login, register --}}
  <link href="{{ asset('css2/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor2/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') }}">
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v2.0.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="{{ asset('js/geo.js') }}" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- tangkap GPS -->
<script>
function initialize_map()
{
    var myOptions = {
	      zoom: 4,
	      mapTypeControl: true,
	      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
	      navigationControl: true,
	      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
	      mapTypeId: google.maps.MapTypeId.ROADMAP      
	    }	
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
}

function initialize()
{
	if(geo_position_js.init())
	{
		document.getElementById('current').innerHTML="<h6>Yeayy..Lokasi Terdeteksi</h6>";
		geo_position_js.getCurrentPosition(show_position,function(){document.getElementById('current').innerHTML="Eangga bisa nemuin lokasi!"},{enableHighAccuracy:true});
	}
	else
	{
		document.getElementById('current').innerHTML="Tidak berfungsi";
	}
}

function show_position(p)
{

	document.getElementById('getLat').value= p.coords.latitude.toFixed(2);
	document.getElementById('getLong').value= +p.coords.longitude.toFixed(2);
	
	var pos=new google.maps.LatLng(p.coords.latitude,p.coords.longitude);
	map.setCenter(pos);
	map.setZoom(14);

	var infowindow = new google.maps.InfoWindow({
	    content: "<strong>yes</strong>"
	});

	var marker = new google.maps.Marker({
	    position: pos,
	    map: map,
	    title:"You are here"
	});

	google.maps.event.addListener(marker, 'click', function() {
	  infowindow.open(map,marker);
	});
	
}
</script>

<style>
	body {font-family: Helvetica;font-size:11pt;padding:0px;margin:0px}
	#current {font-size:10pt;padding:5px;}	
</style>
<!-- tangkap GPS -->
  </head>
