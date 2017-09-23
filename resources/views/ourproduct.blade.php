@extends('master');

@section('content')
<!-- *****************************************************************************************************************
	 The Evolution of tanahairku
	 ***************************************************************************************************************** -->
     <div id="service"> 
            <div class="container">
                <div class="row centered">
                <h3 class="header3"><center>Our Products</center></h3>
                <br><br><br>
                    <div class="col-md-4" data-aos="fade-up">
                        <img class="" width="230px" src="{{ asset('/img/buku-1@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Tanah Airku Indonesia
                        </p>
                        <br/><br/><center><a href="{{ url('ourproduct/detail/1') }}" class="btn btn-theme btn-radius-border"><p class="text-red">Know More</p></a></center>
                    </div>
                    <div class="col-md-4" data-aos="fade-up">
                        <img class="" width="250px" src="{{ asset('/img/tanah-airku-2@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Tanah Airku Asia
                        </p>
                         <br/><br/><center><a href="{{ url('ourproduct/detail/2') }}" class="btn btn-theme btn-radius-border"><p class="text-red">Know More</p></a></center>
                    </div>
                    <div class="col-md-4" data-aos="fade-up">
                        <img class="" width="250px" src="{{ asset('/img/book-3@2x.png')}}" alt="">
                        <p class="content-2 font-center">
                            Tanah Airku
                        </p>
                         <br/><br/><center><a href="{{ url('ourproduct/detail/3') }}" class="btn btn-theme btn-radius-border"><p class="text-red">Know More</p></a></center>
                    </div>		 				
                </div>
	 	</div><! --/container -->
	 </div><! --/service -->

@endsection