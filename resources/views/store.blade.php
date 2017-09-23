@extends('masterpage')

@section('content')
<nav class="col-lg-2" data-spy="affix" id="myScrollspy">
 <!-- <ul class="nav nav-pills nav-stacked"> -->
 <ul class="nav nav-pills nav-stacked">
    <li><a href="#home" data-toggle="tooltip" title="Home"></a></li>
    <li><a href="#brand-new-way" data-toggle="tooltip" title="Brand New Way of Cultural Learning"></a></li>
    <li><a href="#how-to-use" data-toggle="tooltip" title="How To Use"></a></li>
    <li><a href="#video" data-toggle="tooltip" title="Video"></a></li>
    <li><a href="#our-feature" data-toggle="tooltip" title="Our Features"></a></li>
    <li><a href="#content" data-toggle="tooltip" title="Contents"></a></li>
    <li><a href="#our-product" data-toggle="tooltip" title="Our Products"></a></li>
    <li><a href="#testimony" data-toggle="tooltip" title="Testimony"></a></li>
 </ul>
</nav>

<div class="page">
   <!-- Hero Section -->
   <div id="home" class="fw-section full-height" style="background-color: #f5f5f5;" data-offset-top="0">
     <div class="rectangle-home">
        <div class="container padding-top">
          <div class="row">
            <div class="col-lg-6 pull-right padding-top-120 text-right col-md-7 col-sm-9 mobile-center">
              <h1 class="color-white">Tanah Airku</h1>
              <h2>is a culture learning media that uses Augmented Reality and Virtual Reality technology which make it more interactive and interesting.</h2>
              <a href="#our-product" data-toggle="tooltip"  class="btn btn-pill btn-ghost btn-default waves-effect waves-light ajax-load-link">Order Now</a>
            </div>
          </div><!-- .row -->
          <div class="padding-top visible-sm visible-xs"></div>
          <!-- Remove class ".layer-parallax" to disable mouse parallax effect. -->
          
        </div><!-- .container -->
      </div>  
   </div><!-- .fw-section#home -->

   <!-- *****************************************************************************************************************
	 Brand New Way of Cultural Learning
	 ***************************************************************************************************************** -->
   <section id="brand-new-way" class="fw-section padding-top-3x padding-bottom-3x" data-offset-top="67">
       <div class="container">
         <div class="padding-top-2x hidden-xs"></div>
         <div class="row">
          <h2 class="block-title text-center">
            Brand New Way of Cultural Learning
          </h2>
          <div class="padding-top-2x hidden-xs"></div>
           <div class="col-md-4 col-lg-offset-1" data-aos="fade-right">
              <img class="" width="300px" height="19px" src="{{ asset('/img/buku@2x.png')}}" alt="Buku Tanah Airku">
            </div>
            <div class="col-md-7">
              <p class="content-2 margin-top-50">For the local tourist or international tourist who want to learn about Indonesian culture with an interactive way, "Tanah Airku" is an interactive learning book that introduces Indonesian culture with augmented reality technology. Unlike a conventional book "Tanah Airku" is a book with augmented reality that can increase attractiveness people to reading a book, "Tanah Airku" that implement augmented reality technology which allows the users can see the 3D object like the traditional musical instrument, monument, and iconic buildings in a country inside the book.</p>
              <p>
                <br/><br/>
                <center>
                  <a href="#our-product" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link">See Tanah Airku Books</a>
                </center>
              </p>
            </div>
         </div><! --/row -->
         <div class="padding-top-3x hidden-xs"></div>
       </div><! --/container -->
     </section><!-- .fw-section#brand-new-way -->

   <!-- *****************************************************************************************************************
	  How To Use
	  ***************************************************************************************************************** -->	  
    <section id="how-to-use" class="fw-section padding-top-3x padding-bottom-3x" data-offset-top="67">
      <div class="container">
        <div class="row centered">
          <h2 class="block-title text-center">
            How To Use
          </h2>
          <div class="padding-top-2x hidden-xs"></div>
          <div data-aos="fade-up" class="col-md-4 ">
            <img width="200px" src="{{ asset('/img/step-1@2x.png')}}" alt="">
            <h4 class="header4">Scan</h4>
            <p class="content-2 width-200 col-centered">
                Open Tanah Airku Application
            </p>
          </div>
          <div data-aos="fade-up" class="col-md-4 ">
            <img width="200px" src="{{ asset('/img/step-2@2x.png')}}" alt="">
            <h4 class="header4">Navigate</h4>
            <p class="content-2 width-200 col-centered">
                Navigate the smartphone to the book or the card
            </p>
          </div>
          <div data-aos="fade-up" class="col-md-4 ">
            <img width="200px" src="{{ asset('/img/step-3@2x.png')}}" alt="">
              <h4 class="header4">View</h4>
              <p class="content-2 width-200 col-centered">
                  See the magic appeared in your smartphone
              </p>
          </div>	 				
        </div><! --/row -->
        <div class="padding-bottom-3x hidden-xs"></div>
      </div><! --/container -->
    </section><! --/fw-section#brand-new-way -->

    <!-- *****************************************************************************************************************
    Youtube TanahAirku
    ***************************************************************************************************************** -->
    <section id="video" class="fw-section" data-offset-top="67">
      <object class="youtube-full-layer" data="http://www.youtube.com/v/UFBK6hVqmWE" type="application/x-shockwave-flash">
        <param name="src" value="http://www.youtube.com/v/UFBK6hVqmWE" />
      </object>
    </section><! --/fw-section#portfolio -->

 <!-- *****************************************************************************************************************
	 Our Feature
	 ***************************************************************************************************************** -->
   <section id="our-feature" class="fw-section padding-top-3x padding-bottom-3x" data-offset-top="67">
	 	<div class="container">
 			<div class="row centered">
             <h2 class="block-title text-center">Our Features
               <small>We have some feature for you</small>
             </h2>
             <br><br><br>
 				<div class="col-md-3">
                     <div data-aos="fade-left">
                        <h4 class="header4">3D Object</h4>
                        <center>
                            <p class="content-2 width-200">
                                Our content can be viewed in 3D Object by navigating your smatphone to the marker
                            </p>
                        </center>
                     </div>
                     <div data-aos="fade-left">   
                        <h4 class="header4">Coloring Object</h4>
                        <center>
                            <p class="content-2 width-200">
                                You can be able to coloring the object in the book and view it in your smartphone in 3D Object
                            </p>
                        </center>  
                     </div>
                     <div data-aos="fade-left">       
                        <h4 class="header4">Play a Song</h4>
                        <center>
                            <p class="content-2 width-200">
                                You can hear the do re mi sound and some song from traditional instuments
                            </p>
                        </center>  
                    </div>     
 				        </div>
                 <div class="col-md-6">
 					<img class="margin-top-100" width="670px" src="{{ asset('/img/hpcopy@2x.png')}}" alt="">
 				</div>
          <div class="col-md-3">
              <div data-aos="fade-right">
                <h4 class="header4">Trivia Quiz</h4>
                <center>
                    <p class="content-2 width-200">
                        To test you, we provide a trivia quiz to test knowledge that you've got
                    </p>
                </center>
              </div>
              <div data-aos="fade-right">   
                <h4 class="header4">VR View</h4>
                <center>
                    <p class="content-2 width-200">
                        Our content can be viewed in virtual reality view, you can use google cardboard or othe VR headset.
                    </p>
                </center>  
              </div>
              <div data-aos="fade-right">   
                <h4 class="header4">Share</h4>
                <center>
                    <p class="content-2 width-200">
                        You can share what you see (the magic!) to your social media
                    </p>
                </center>
              </div>        
        </div>	 				
	 		</div>
	 	</div><! --/container -->
	 </section><! --/fw-section#ourfeature -->

   <!-- *****************************************************************************************************************
	 Contents
	 ***************************************************************************************************************** -->
     <section id="content" class="fw-section padding-bottom-3x">
            <div class="container">
               <h2 class="block-title text-center">Contents
                    <small>We have some contents for you</small>
                </h2>
                <div class="row centered">
                <br><br><br>
                    <div class="col-md-2 col-centered margin-right" >
                        <img class="" width="200px" src="{{ asset('/img/traditional-clothes@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Traditonal Clothes
                        </p>
                    </div>
                    <div class="col-md-2 col-centered margin-right" >
                        <img class="" width="200px" src="{{ asset('/img/traditional-food@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Traditonal Foods
                        </p>
                    </div>
                    <div class="col-md-2 col-centered margin-right" >
                        <img class="" width="200px" src="{{ asset('/img/traditional-instrument@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Traditonal Instruments
                        </p>
                    </div>
                     <div class="col-md-2 col-centered margin-right" >
                        <img class="" width="200px" src="{{ asset('/img/traditional-music@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Traditonal Musics
                        </p>
                    </div>
                     <div class="col-md-2 col-centered margin-right" >
                        <img class="" width="200px" src="{{ asset('/img/landmark@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Landmark
                        </p>
                    </div>		 				
                </div>
	 	</div><! --/container -->
	 </section><! --/fw-section#contents -->

   <!-- ourproduct -->
   <section id="our-product" class="fw-section padding-top-3x padding-bottom-3x" data-offset-top="67">
   <div class="container">
      <h2 class="block-title text-center">
        Our Products
        <small>We have some product for you</small>
      </h2>
      <div class="row space-top-2x">

        @foreach($products as $product)
           <div class="col-md-4 col-sm-6">
             <div class="shop-item">
                <div class="shop-thumbnail">
                  <img src="{{url('img')}}/product_tumbnail/{{ $product->tumbnail }}" style="min-height:285px;" alt="{{ $product->product_name }}">
                </div>
                <div class="shop-item-footer">
                  <div class="shop-item-details">
                    <h3 class="shop-item-title">{{ $product->product_name }}</h3>
                    <span class="shop-item-price">
                     IDR  {{ $product->price}}
                    </span>
                  </div>
                  <div class="shop-item-order-btn">
                    <a href="product/{{$product->id_product}}/0/" class="btn btn-ghost btn-sm btn-pill btn-primary waves-effect waves-light ajax-load-link">Preview</a>
                  </div>
                </div>
             </div>
           </div>
        @endforeach

      </div><!-- .row -->
   </div><!-- .container -->
   </section><!-- .fw-section#accessories -->

  <!-- Testimonials -->
   <section id="testimony" class="fw-section padding-top-3x padding-bottom" data-offset-top="67">
       <div class="container-fluid">
        <h2 class="block-title text-center space-bottom-2x">
           <small>Experienced and enjoyed by thouthands people. Here’s what they think.</small>
        </h2>
        <div class="row">
           <div class="col-lg-10 col-lg-offset-1">
             <div class="row">
              <!-- Testimonial -->
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="testimonial">
                   <div class="testimonial-body">
                     <p>"Compared with other media, Tanah Airku can afford to give more."</p>
                   </div>
                   <footer class="testimonial-author">
                     <div class="testimonial-author-ava">
                       <img src="{{ asset('/img/girl.jpg')}}" alt="Author">
                     </div>
                     <div class="testimonial-author-info">
                       Dian Dharmayanti - Parent
                     </div>
                   </footer>
                 </div>
              </div>
             </div>
           </div>
        </div><!-- .row -->
       </div><!-- .container -->
   </section><!-- .fw-section#feedback -->
   
@endsection