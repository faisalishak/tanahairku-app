<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tanah Airku</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('/icons/logo.png') }}">

  <!-- Material Design -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

  <!--heart pluse-->
	<!--<link href='//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>	
	-->
	
	<!--AOS Library-->
	<link href="{{ asset('/css/aos.css') }}" rel="stylesheet">
	<!--<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">-->

  <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
  <link href="{{ asset('/css/vendor/material-icons.min.css') }}" rel="stylesheet" media="screen">

  <!-- Social Icons -->
  <link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?c2sn1i">
  <link href="{{ asset('/css/vendor/socicon.min.css') }}" rel="stylesheet" media="screen">

  <link href="{{ asset('/css/theme.min.css') }}" rel="stylesheet" media="screen">
  
  <!-- override theme.min.css -->
  <link href="{{ asset('/css/theme-custom.css') }}" rel="stylesheet" media="screen">
  <!-- link href="css/style.css" rel="stylesheet" media="screen" -->
  
  <!-- Font-Awesome -->
  <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
  
  <!--style owl-carousel slider image-->
  <link href="{{ asset('/assets/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">

    @yield('content')

     <!-- Footer -->
   <footer class="footer">
     <div class="column">
      <div class="cards"><img src="{{ asset('/img/miracle_logo.jpg') }}" alt="Miracle Studio"></div>
      <h3 class="widget-title">
         <small>Deliver exciting method of learning education.</small>
         <small>Jalan Dipatiukur No. 112-116, Coblong, Lebakgede, Bandung, Kota Bandung, Jawa Barat 40132</small>
      </h3>
     </div><!-- .column -->
     <div class="column">
      <h3 class="widget-title">
         Newsletter
         <small>To receive latest offers and discounts from the shop.</small>
      </h3>
      <form action="#" method="post" target="_blank" class="subscribe-form" novalidate>
         <input type="email" class="form-control" name="EMAIL" placeholder="Your e-mail">
         <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
         <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1" value=""></div>
         <button type="submit"><i class="material-icons send"></i></button>
      </form>
     </div><!-- .column -->
     <div class="column">
      <p class="text-sm">Courier Partner</p>
      <!--div class="social-bar text-center space-bottom"-->
        <div class="external-logo external-logo--courier">
          <!--h6 class="external-logo-title">
          Jasa Pengiriman
          </h6-->
          <ul class="external-logo-lists">
            <li class="external-logo--list">
              <span class="external-logo-item external-logo-item--jne">JNE</span>
            </li>
            <li class="external-logo--list">
              <span class="external-logo-item external-logo-item--tiki">Tiki</span>
            </li>
            <li class="external-logo--list">
              <span class="external-logo-item external-logo-item--pos-indonesia">Pos Indonesia</span>
            </li>
          </ul>
        </div>
      <!--</div> .social-bar -->
      <p class="copyright">&copy; 2017. Made with <i class="text-danger material-icons favorite"></i> by Miracle Studio.</p>
      <!-- Scroll To Top Button -->
      <div class="scroll-to-top-btn"><i class="material-icons trending_flat"></i></div>
     </div><!-- .column -->
   </footer><!-- .footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
	  <script src="{{ asset('/js/retina-1.1.0.js') }}"></script>
	  <script src="{{ asset('/js/jquery.hoverdir.js') }}"></script>
	  <script src="{{ asset('/js/jquery.hoverex.min.js') }}"></script>
	  <script src="{{ asset('/js/jquery.prettyPhoto.js') }}"></script>
  	<script src="{{ asset('/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/velocity.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/waves.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/icheck.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/page-preloading.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('/css/modernizr.js') }}"></script>
  
    <!-- AOS Library -->
    <script src="{{ asset('/js/aos.js') }}"></script>
	  <!--<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>-->

		<!-- Owl-Carousel -->
		<script src="{{ asset('/assets/owl-carousel/owl.carousel.min.js ') }}"></script>
		<script src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
  	<script src="{{ asset('/js/custom.js ') }}"></script>
		<script src="{{ asset('/js/script.js ') }}"></script>
    <script>
      //AOS
      AOS.init({
        duration: 1200
      });
    </script>
</body>
</html>
