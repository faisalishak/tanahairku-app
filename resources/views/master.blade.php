<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Tanah Airku</title>

	<!-- Material Design -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	
	<!--heart pluse-->
	<!--<link href='//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>	
	-->
	
	<!--AOS Library-->
	<link href="{{ asset('/css/aos.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/aos.js') }}"></script>
	<!--<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
	<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>-->

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">

		<!--bootstrap validator-->
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		
		<!--style owl-carousel slider image-->
		<link href="{{ asset('/assets/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/assets/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/css/modernizr.js') }}"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a href="/"><img class="top" width="142px" height="19px" src="{{ asset('/img/logo@2x.png')}}" alt=""></a>
          <!--<a class="navbar-brand top" href="index.html">Tanah Airku International </a>-->
		  <a class="navbar-brand visible" href="/">Miracle Studio </a>
		</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="{{Request::path()=='ourproduct' ? 'active':''}}"><a href="{{ url('ourproduct') }}">Our Products</a></li>
            <li class="{{Request::path()=='workwithus' ? 'active':''}}"><a href="{{ url('workwithus') }}">Work With Us</a></li>
            <li class="{{Request::path()=='aboutus' ? 'active':''}}"><a href="{{ url('aboutus') }}">About Us</a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="single-project.html">SINGLE PROJECT</a></li>
              </ul>
            </li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

  @yield('content')

     <!-- *****************************************************************************************************************
	 Stay update, subscribe to our news letter.
	 ***************************************************************************************************************** -->
     <div id="">
        <div class="rectangle-subscribe">   
            <div class="container">
                <div class="row-centered">
                <h3 class="color-white"><center>Stay update, subscribe to our news letter</center></h3>
                <br><br><br>
                    <div class="col-md-5 col-centered centered" data-aos="fade-right">
                        <form role="form">
                            <center><div class="form-group">
                                <input type="email" class="form-control resizedTextbox" placeholder="Your Email Address" id="email">
																<p id="alert-email" class="content-3 color-white font-center"></p>
														</div></center>
                            		<button type="submit" id="subscribe" class="btn btn-subscribe" data-loading-text="Processing">Subscribe!</button>
                        </form>
                    </div>	 				
                </div>
            </div>
	 	</div><! --/container -->
	 </div><! --/service -->

	 <!-- *****************************************************************************************************************
	 Footer
	 ***************************************************************************************************************** -->	  
    <div id="">
			<div class="rectangle-footer">
				<div class="container centered">
					<div class="row-centered centered">
						<a href="{{ url('/') }}">
							<div class="col-md-3 col-centered">
									<h4 class="content-2 font-center color-black">Home</h4>
							</div>
						</a>	 
						<a href="{{ url('ourproduct') }}">
							<div class="col-md-3 col-centered">
									<h4 class="content-2 font-center color-black">Our Product</h4>
							</div>
						</a>
						<a href="{{ url('workwithus') }}">
							<div class="col-md-3 col-centered">
									<h4 class="content-2 font-center color-black">Work With Us</h4>
							</div>
						</a>
						<a href="{{ url('ourproduct') }}">	
							<div class="col-md-3 col-centered">
									<h4 class="content-2 font-center color-black">About Us</h4>
							</div>
						</a>				
					</div>
				</div><! --/container -->
			</div>	
		</div><! --/service -->

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
			 <p class="content-3 font-center">Made with <i id="heart" class='fa fa-heart fa-lg' style='color:#ec5a55; margin-left:-3;'></i> by Codelabs Team. Base Theme By Blacktie.co.</p>
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
	  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	  <script src="{{ asset('/js/retina-1.1.0.js') }}"></script>
	  <script src="{{ asset('/js/jquery.hoverdir.js') }}"></script>
	  <script src="{{ asset('/js/jquery.hoverex.min.js') }}"></script>
	  <script src="{{ asset('/js/jquery.prettyPhoto.js') }}"></script>
  	<script src="{{ asset('/js/jquery.isotope.min.js') }}"></script>
		<!--jquery owl-carousel slider image-->
		<script src="{{ asset('/assets/owl-carousel/owl.carousel.min.js ') }}"></script>
		<script src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
  	<script src="{{ asset('/js/custom.js ') }}"></script>
		<script src="{{ asset('/js/script.js ') }}"></script>
<script>
//loading 
$('.btn').on('click', function() {
    setTimeout(function() {
   }, 8000);
});

//subscribe
$("#subscribe").click(function(e) {
	e.preventDefault();
	var $this = $(this);
	var email = $('#email').val();

	$this.button('loading');

	console.log(email);

  $.ajax({
    type: 'post',
    url: '/subscribtion',
    data: {
			_token:'{{ csrf_token() }}',
      email: email},
    success: function(data) {
			if (data == 200){
				$this.button('reset');
				$('#alert-email').replaceWith('<p id="alert-email" class="content-3 color-white font-center">Email has been sent</p>');
			}else{
				$this.button('reset');
				$('#alert-email').replaceWith('<p id="alert-email" class="content-3 color-white font-center">Email already exist, please try again</p>');
			}
	  },
  });
});

//Fade Header
$(window).scroll(function(){
    $(".top").css("opacity", 0 + $(window).scrollTop() / 650);
});

$(window).scroll(function(){
    $(".visible").css("opacity", 1 - $(window).scrollTop() / 650);
});

// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);

//AOS
AOS.init({
  duration: 1200
});
</script>
  </body>
</html>
