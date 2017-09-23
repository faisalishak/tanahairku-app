@extends('master');

@section('content')
<!-- *****************************************************************************************************************
	 Work With Us
	 ***************************************************************************************************************** -->
     <div id="service"> 
            <div class="container">
                <div class="row-centered">
                <h3 class="header3"><center>Work With Us</center></h3>
                <br><br><br>
                    <div class="col-md-8 col-centered">  
                        <p class="content-2 font-center">
                            Tanah Airku have successfully worked with some of the most recognisable brands in the world to amaze audiences and capture the imaginations of their customers to drive their marketing efforts in never before seen ways. Our core technologies include world first patented features that have put Tanah Airku globally at the front of Augmented Reality. We have a number of options including custom content creation, SDK licensing and whitelabeling that can be tailored to meet your business goals.
                        </p>
                    </div>	 				
                </div>
	 	</div><! --/container -->
	 </div><! --/service -->

     <div id="">
        <div class="rectangle-work-withus"> 
            <div class="container mtb">
                <div class="row">
                    </div>
                    </div>  
	 	</div><! --/container -->
	 </div><! --/service -->

<!-- *****************************************************************************************************************
	 Have the same interest with us ? just contact
	 ***************************************************************************************************************** -->
     <div id="service"> 
            <div class="container">
                <div class="row-centered">
                <h3 class="header3"><center>Have the same interest with us ? just contact</center></h3>
                <br><br><br>
                    <div class="col-md-8 col-centered">  
                        <p class="content-2 font-center">
                            We collaborate with all sorts of creative people to develop leading-edge AR solutions. The possibilities are endless, and we’d love to explore some of them with you – to give you a taste of what is possible just take a look below to see a few recent projects we’ve worked on.
                        </p>
                    </div>	 				
                </div>
	 	</div><! --/container -->
	 </div><! --/service -->

     <div id="service"> 
            <div class="container">
                <div class="row-centered">
                    <div class="col-md-5 col-centered centered">
                        <form id="formw" role="form">
                                <div class="form-group">
                                    <input id="name"  type="text" class="form-control resizedTextbox border-no"  placeholder="Name" required>
                                    <div class="hline" ></div>
                                </div>
                                </br>
                                 <div class="form-group">
                                    <input id="emailw"  type="email" class="form-control resizedTextbox border-no"  placeholder="Email Address" required>
                                    <div class="hline" width="300px"></div>
                                </div>
                                </br>
                                 <div class="form-group">
                                    <input id="company"  type="text" class="form-control resizedTextbox border-no"  placeholder="Company" required>
                                    <div class="hline" width="300px"></div>
                                </div>
                                </br>
                                 <div class="form-group">
                                    <input id="phone"  type="number" class="form-control resizedTextbox border-no"  placeholder="Phone" required>
                                    <div class="hline" width="300px"></div>
                                </div>
                                </br>
                                <div class="form-group">
                                    <textarea id="desc" type="textarea"  cols="num" rows="4" class="form-control border-no" placeholder="Tell Us About Your Idea" required></textarea>
                                    <div class="hline" width="300px"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="send" style="background: #46ec46;" class="btn btn-subscribe" data-loading-text="Processing">Submit</button>
                                </div>
                                <p id="alert-emailw" class="content-3 color-white font-center"></p>
                        </form>
                    </div>			
                </div>
	 	</div><! --/container -->
	 </div><! --/service -->

     <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
     <script>
         
         //subscribe
        $("#send").click(function(e) {
            e.preventDefault();
            var $this = $(this);
            var name = $('#name').val();
            var email = $('#emailw').val();
            var company = $('#company').val();
            var phone = $('#phone').val();
            var desc = $('#desc').val();

            $this.button('loading');

            console.log(email);

        $.ajax({
            type: 'post',
            url: '/workwithus/send',
            data: {
                    _token:'{{ csrf_token() }}',
                    name: name,
                    email: email,
                    company: company,
                    phone: phone,
                    desc: desc
                  },
            success: function(data) {
                    if (data == 200){
                        $this.button('reset');
                        $('#alert-emailw').replaceWith('<p id="alert-emailw" class="content-3 font-center">Data has been sent</p>');
                    }else{
                        $this.button('reset');
                        $('#alert-emailw').replaceWith('<p id="alert-emailw" class="content-3 font-center">Email already exist, please try again</p>');
                    }
            },
        });
        });

     </script>
@endsection