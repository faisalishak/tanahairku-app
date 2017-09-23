@extends('masterpage')

@section('content')
<nav class="col-lg-2" data-spy="affix" id="myScrollspy">
 <!-- <ul class="nav nav-pills nav-stacked"> -->
 <ul class="nav nav-pills nav-stacked">
   <li class="active"><a href="#home"></a></li>
   <li><a href="#brand-new-way"></a></li>
   <li><a href="#how-to-use"></a></li>
   <li><a href="#portfolio"></a></li>
   <li><a href="#features"></a></li>
   <li><a href="#accessories"></a></li>
   <li><a href="#video"></a></li>
   <li><a href="#feedback"></a></li>
 </ul>
</nav>

<div class="page">
   <!-- Hero Section -->
   <section id="home" class="fw-section full-height padding-top-3x padding-bottom-3x" style="background-color: #f5f5f5;" data-offset-top="0">
     <div class="container padding-top">
       <div class="row">
         <div class="col-lg-6 col-md-7 col-sm-9 mobile-center">
           <h1>Tanah Airku </h1>
           <h2>is a culture learning media that uses Augmented Reality and Virtual Reality technology which make it more interactive and interesting.</h2>
           <a href="#" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link">Order Now</a>
           <a href="#" class="btn btn-pill btn-ghost btn-default ajax-load-link">Check Specs</a>
         </div>
       </div><!-- .row -->
       <div class="padding-top visible-sm visible-xs"></div>
       <!-- Remove class ".layer-parallax" to disable mouse parallax effect. -->
       <div class="layer-parallax">
         <div class="layer" data-depth="0.15">
           <img style="transform:scale(1.5); margin-right:50px; margin-top: -170px;" src="img/buku@2x.png" class="block-center" alt="Oculus Rift">
         </div>
       </div>
     </div><!-- .container -->
   </section><!-- .fw-section#home -->

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
                  <a href="#" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link">See Tanah Airku Books</a>
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
          <div data-aos="fade-up" class="col-md-4">
            <img width="200px" src="{{ asset('/img/step-1@2x.png')}}" alt="">
            <h4 class="header4">Scan</h4>
            <p class="content-2 width-200">
                Open Tanah Airku Application
            </p>
          </div>
          <div data-aos="fade-up" class="col-md-4">
            <img width="200px" src="{{ asset('/img/step-2@2x.png')}}" alt="">
            <h4 class="header4">Navigate</h4>
            <p class="content-2 width-200">
                Navigate the smartphone to the book or the card
            </p>
          </div>
          <div data-aos="fade-up" class="col-md-4">
            <img width="200px" src="{{ asset('/img/step-3@2x.png')}}" alt="">
              <h4 class="header4">View</h4>
              <p class="content-2 width-200">
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
    <section id="portfolio" class="fw-section" data-offset-top="67">
      <object class="youtube-full-layer" data="http://www.youtube.com/v/UFBK6hVqmWE" type="application/x-shockwave-flash">
        <param name="src" value="http://www.youtube.com/v/UFBK6hVqmWE" />
      </object>
    </section><! --/fw-section#portfolio -->

 <!-- *****************************************************************************************************************
	 Our Feature
	 ***************************************************************************************************************** -->

       <div id="service">
	 	<div class="container">
 			<div class="row centered">
             <h3 class="header3"><center>Our Feature</center></h3>
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
	 </div><! --/service -->
   <!-- Accessories -->
   <section id="accessories" class="fw-section padding-top-3x padding-bottom-3x" data-offset-top="67">
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
                  <img src="{{url('img')}}/{{ $product->tumbnail }}" style="min-height:285px;" alt="{{ $product->product_name }}">
                </div>
                <div class="shop-item-footer">
                  <div class="shop-item-details">
                    <h3 class="shop-item-title">{{ $product->product_name }}</h3>
                    <span class="shop-item-price">
                     {{ $product->price}}
                    </span>
                  </div>
                  <div class="shop-item-order-btn">
                    <a href="#" class="btn btn-ghost btn-sm btn-pill btn-primary waves-effect waves-light ajax-load-link">Add to cart</a>
                  </div>
                </div>
             </div>
           </div>
        @endforeach

      </div><!-- .row -->
   </div><!-- .container -->
   </section><!-- .fw-section#accessories -->

   <!-- Video Showcase -->
     <section id="video" class="fw-section no-cover padding-top-3x padding-bottom-3x" style="background-image: url(img/video-bg.jpg);" data-offset-top="67">
       <div class="container text-center padding-top-3x padding-bottom-3x">
         <div class="padding-top-2x hidden-xs"></div>
         <div class="row">
           <div class="col-lg-6 col-md-7 col-sm-8">
             <h2 class="block-title padding-bottom">
               Want to see Oculus in action?
               <small>Watch our short video presentation.</small>
             </h2>
             <a href="https://www.youtube.com/watch?v=pN6YCFlS8nU" class="video-popup-btn">
               <i class="material-icons play_arrow"></i>
             </a>
           </div>
         </div><!-- .row -->
         <div class="padding-bottom-3x hidden-xs"></div>
       </div><!-- .container -->
     </section><!-- .fw-section#video -->

  <!-- Testimonials -->
   <section id="feedback" class="fw-section padding-top-3x padding-bottom" data-offset-top="67">
       <div class="container-fluid">
        <h2 class="block-title text-center space-bottom-2x">
           What Our Buyers Have To Say
           <small>Experienced and enjoyed by thouthands people. Here’s what they think.</small>
        </h2>
        <div class="row">
           <div class="col-lg-10 col-lg-offset-1">
             <div class="row">
              <!-- Testimonial -->
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="testimonial">
                   <div class="testimonial-body">
                     <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                   </div>
                   <footer class="testimonial-author">
                     <div class="testimonial-author-ava">
                       <img src="img/testimonials/01.jpg" alt="Author">
                     </div>
                     <div class="testimonial-author-info">
                       Susan Barker, CEO Comp Ltd.
                     </div>
                   </footer>
                 </div>
              </div>
              <!-- Testimonial -->
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="testimonial">
                   <div class="testimonial-body">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                   </div>
                   <footer class="testimonial-author">
                     <div class="testimonial-author-ava">
                       <img src="img/testimonials/02.jpg" alt="Author">
                     </div>
                     <div class="testimonial-author-info">
                       Andy Trump, Founder Game
                     </div>
                   </footer>
                 </div>
              </div>
              <!-- Testimonial -->
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="testimonial">
                   <div class="testimonial-body">
                     <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.</p>
                   </div>
                   <footer class="testimonial-author">
                     <div class="testimonial-author-ava">
                       <img src="img/testimonials/03.jpg" alt="Author">
                     </div>
                     <div class="testimonial-author-info">
                       Joseph Bran, Dean MIT
                     </div>
                   </footer>
                 </div>
              </div>
              <!-- Testimonial -->
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="testimonial">
                   <div class="testimonial-body">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                   </div>
                   <footer class="testimonial-author">
                     <div class="testimonial-author-ava">
                       <img src="img/testimonials/04.jpg" alt="Author">
                     </div>
                     <div class="testimonial-author-info">
                       Nick Coleman, Developer
                     </div>
                   </footer>
                 </div>
              </div>
              <!-- Testimonial -->
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="testimonial">
                   <div class="testimonial-body">
                     <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.</p>
                   </div>
                   <footer class="testimonial-author">
                     <div class="testimonial-author-ava">
                       <img src="img/testimonials/05.jpg" alt="Author">
                     </div>
                     <div class="testimonial-author-info">
                       Emma Power, Housewife
                     </div>
                   </footer>
                 </div>
              </div>
              <!-- Testimonial -->
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="testimonial">
                   <div class="testimonial-body">
                     <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                   </div>
                   <footer class="testimonial-author">
                     <div class="testimonial-author-ava">
                       <img src="img/testimonials/06.jpg" alt="Author">
                     </div>
                     <div class="testimonial-author-info">
                       Jimm Napkin, Plumber
                     </div>
                   </footer>
                 </div>
              </div>
             </div>
           </div>
        </div><!-- .row -->
       </div><!-- .container -->
   </section><!-- .fw-section#feedback -->

   <!-- CTA -->
   <section class="fw-section padding-bottom-3x">
     <div class="container text-center">
      <hr>
      <h2 class="block-title padding-top-2x space-bottom-1x">
         Enjoyed What You See?
         <small>It’s the right time to buy. Oculus at discounted price.</small>
      </h2>
      <a href="ajax/oculus_rift.html" class="btn btn-ghost btn-pill btn-primary waves-effect waves-light ajax-load-link">Order Oculus Rift Now</a>
     </div>
   </section><!-- .fw-section -->

   <!-- Footer -->
   <footer class="footer">
     <div class="column">
      <p class="text-sm">Need support? Call <span class="text-primary">001 (917) 555-4836</span></p>
      <div class="social-bar text-center space-bottom">
         <a href="#" class="sb-skype" data-toggle="tooltip" data-placement="top" title="Skype">
           <i class="socicon-skype"></i>
         </a>
         <a href="#" class="sb-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
           <i class="socicon-facebook"></i>
         </a>
         <a href="#" class="sb-google-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google+">
           <i class="socicon-googleplus"></i>
         </a>
         <a href="#" class="sb-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
           <i class="socicon-twitter"></i>
         </a>
         <a href="#" class="sb-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
           <i class="socicon-instagram"></i>
         </a>
      </div><!-- .social-bar -->
      <p class="copyright">&copy; 2016. Made with <i class="text-danger material-icons favorite"></i> by rokaux.</p>
     </div><!-- .column -->
     <div class="column">
      <h3 class="widget-title">
         Subscription
         <small>To receive latest offers and discounts from the shop.</small>
      </h3>
      <form action="//rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;id=1194bb7544" method="post" target="_blank" class="subscribe-form" novalidate>
         <input type="email" class="form-control" name="EMAIL" placeholder="Your e-mail">
         <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
         <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1" value=""></div>
         <button type="submit"><i class="material-icons send"></i></button>
      </form>
     </div><!-- .column -->
     <div class="column">
      <h3 class="widget-title">
         Payment Methods
         <small>We support one of the following payment methods.</small>
      </h3>
      <div class="cards"><img src="img/cards.png" alt="Cards"></div>
      <!-- Scroll To Top Button -->
      <div class="scroll-to-top-btn"><i class="material-icons trending_flat"></i></div>
     </div><!-- .column -->
   </footer><!-- .footer -->
</div>

@endsection