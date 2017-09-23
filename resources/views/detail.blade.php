@extends('masterpage')

@section('content')
<!-- *****************************************************************************************************************
	 Product Detail
	 ***************************************************************************************************************** -->
     <section id="service" class="fw-section padding-top-3x padding-bottom-3x" data-offset-top="67"> 
      <div class="container">
        <div class="row">
        <h2 class="block-title text-center space-bottom-3x">{{ $detail_product[0] -> product_name }}</h2>
            <div id="scroll-to-fixed" class="col-md-5 centered" data-aos="fade-right">
                <div id="img-large">
                    <img id="zoom_01" class="centered zoom-img" width="300px"
                        src="{{ url('img') }}/product_tumbnail/{{ $detail_product[0]->tumbnail }}" alt="{{ $detail_product[0] -> product_name }}">
                </div>
                <div id="img-small" class="owl-carousel owl-theme space-bottom-2x">
                @foreach ($detail_product as $item)
                    <div class="item">
                        <img id="img-item-{{ $item->id_photo }}" onclick="changeImage(this.id)" class="centered" width="25px" height="25px" src="/img/product_photo/{{ $detail_product[0]->id_product }}/{{ $item->photo_url }}" alt="">
                    </div>
                @endforeach    
                </div>
                <!--<a target="_blank" href="http://twitter.com/intent/tweet?text=&url=" class="buttons" tooltip="Share on">
                  <i class="fa fa-twitter"></i>
                </a>
                <a target="_blank" href="mailto:?subject=' + escape('Have a look at this website') + '&body=' + escape('')" class="buttons" tooltip="Share on">
                  <i class="fa fa-envelope"></i>
                </a>
                <a target="https://plus.google.com/share?url=" href="#" class="buttons" tooltip="Share on Plus">
                  <i class="fa fa-google-plus"></i>
                </a>
                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=" class="buttons" tooltip="Share on">
                  <i class="fa fa-linkedin-square"></i>
                </a>
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=" class="buttons" tooltip="Share on">
                  <i class="fa fa-facebook"></i>
                </a>-->
                <hr>
                <h4>IDR. {{ $detail_product[0] -> price }}</h4>                 
                <!--<p class=" ">
                    <div class="col-md-5 col-centered centered">
                        <p class=" "><b>Type  &emsp;&emsp;&emsp;&emsp;&thinsp;Price</b> </p>
                        <p class="content-3">Premium  &emsp;&emsp;&emsp;&thinsp;&thinsp;$27</p>
                        <p class="content-3">Usual  &emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;$16</p>
                        <p class="content-3">E-book  &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;$10</p>
                    </div>
                </p>-->
                <hr>
                @if( Auth :: guest())
                <form method="GET" action="/login">
                @else
                <form method="GET" action="/checkout">
                @endif
                {{ csrf_field() }}
                  <div id="checkout" class="col-md-4 col-centered centered">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="hidden" name="id_product" value="{{ $detail_product[0] -> id_product }}">
                    
                    @if($qty != 0)
                      <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="quantity" name="quantity" value="{{ $qty }}">
                    @else
                      <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="quantity" name="quantity" value="0">
                    @endif  
                      <label class="mdl-textfield__label" for="quantity">Quantity</label>
                      <span class="mdl-textfield__error">Input is not a number!</span>
                    </div>

                    <button type="submit" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                      Checkout
                    </button>
                    <!--<a href="#" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link">Checkout</a>-->
                  </div>
                </form>
            </div>

            <!-- Right Align -->
            <div id="main" class="col-md-6">
                <h4 class="header5 color-black">Description</h4>
                <p class=" ">{{ $detail_product[0] -> description }}</p></br></br>
                <object class="" width="100%" height="300px" data="http://www.youtube.com/v/UFBK6hVqmWE" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/UFBK6hVqmWE" /></object>
                {!! $detail_product[0] -> specification !!}
            </div>
            <br>			
        </div>
      </div><! --/container -->
    </section><! --/service -->

     <!-- *****************************************************************************************************************
	 Get TanahAirKu App
	 ***************************************************************************************************************** -->
   <div id="get-app" class="rectangle-get-app container">
        <div class="row">
            <h2 class="block-title space-bottom-1x color-white"><center>Get Tanah Airku App</center></h2>
            <br><br><br>
            <div class="col-md-4 col-lg-offset-1" data-aos="fade-right">
                <img class="" width="500px" src="{{ asset('/img/hpcopy@2x.png')}}" alt="">
            </div>
            <div class="col-md-6">
                <p class="color-white">"Tanah Airku” is a media to learn about culture using augmented reality and virtual reality technology we can view every object provided inside the book rise up from the book and how this product works? Let’s check out the book.</p>
                @if($detail_product[0] -> id_product == 121 || $detail_product[0] -> id_product == 131 || $detail_product[0] -> id_product == 3  )
                  <p><br/><br/><center><a href="https://play.google.com/store/apps/details?id=id.or.codelabs.tanahairkkuinternational&hl=en"><img class="" width="150px" height="19px" src="{{ asset('/img/google-play-badge@2x.png')}}" alt=""></a></center></p>
                @else
                  <p><br/><br/><center><a href="https://play.google.com/store/apps/details?id=id.or.codelabs.mboi&hl=en"><img class="" width="150px" height="19px" src="{{ asset('/img/google-play-badge@2x.png')}}" alt=""></a></center></p>
                @endif
            </div>		 				
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="{{ asset('js/sticky/sticky-kit.js')}}"></script>
  <script type="text/javascript">
    //$('#scroll-to-fixed').scrollToFixed();
   /* $("#scroll-to-fixed").stick_in_parent()
    .on("sticky_kit:stick", function(e) {
    console.log("has stuck!", e.target);
  })
  .on("sticky_kit:unstick", function(e) {
    console.log("has unstuck!", e.target);
  });*/

       /* $('#scroll-to-fixed').scrollToFixed( {
            limit: $('.get-app').offset().top - $(this).outerHeight(true) - 10
        });*/
  </script>
@endsection