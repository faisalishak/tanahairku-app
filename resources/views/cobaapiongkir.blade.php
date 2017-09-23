@extends('master');

@section('content')
<!-- *****************************************************************************************************************
	 Work With Us
	 ***************************************************************************************************************** -->  
 <div id="">
    <div class="rectangle-subscribe">   
        <div class="container">
            <div class="row-centered">
            <h3 class=""><center>Ongkos Kirim API</center></h3>
                <div class="col-md-5 col-centered centered" data-aos="fade-right">
                    <form role="form">
                            <center>
                                <div class="form-group">
                                   <select id="provinces" name="province" class="form-control"> 
                                        <option id="province-option" value="0">Select province</option> 
                                   </select>
                                </div>
                                <div class="form-group">
                                   <select id="citys" name="city" class="form-control"> 
                                        <option id="city-option" value="0">Select city</option> 
                                   </select>
                                </div>
                                <div class="form-group">
                                   <select id="couriers" name="courier" class="form-control">
                                        <option id="courier-option" value="jne">Select courier</option> 
                                   </select>
                                </div>
                                <div class="form-group">
                                   <select id="services" name="service" class="form-control">
                                        <option id="service-option" value="jne">Select service</option> 
                                   </select>
                                </div>
                                <p id="alert-email" class="content-3 color-white font-center"></p>
                            </center>
                        </form>                    
                    </div>	 				
                </div>
            </div>
	 	</div><! --/container -->
	 </div><! --/service -->


<script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
     <script>
        var id_city;

        $.ajax({
            type: 'get',
            crossDomain: true,
            url: 'https://cors-anywhere.herokuapp.com/' + 'http://api.rajaongkir.com/starter/province',
            data: {
                key:"cbee6636ac2066e596ff27bee25c5f00"
            },
            success: function(data) {
                var results = data.rajaongkir.results;
                
                results.forEach(function(item){
                    $('#provinces').append('<option id="province-option" value="'+ item.province_id +'">'+ item.province +'</option>');
                });                
            },
        });

        $('#provinces').change(function() {
           var id_province = $(this).val();
            $.ajax({
                type: 'get',
                crossDomain: true,
                url: 'https://cors-anywhere.herokuapp.com/' + '	http://api.rajaongkir.com/starter/city',
                data: {
                    key:"cbee6636ac2066e596ff27bee25c5f00",
                    province: id_province
                },
                success: function(data) {
                    var results = data.rajaongkir.results; 

                    $('#citys').append('<select id="citys" name="city" class="form-control"> <option id="city-option" value="0">Select city</option> </select>');
                    $('#citys').empty('<select id="citys" name="city" class="form-control"> <option id="city-option" value="0">Select city</option> </select>');
                    $('#citys').append('<option id="city-option" value="0">Select city</option> ');

                    results.forEach(function(item){
                        $('#citys').append('<option id="city-options" value="'+ item.city_id +'">'+ item.type +' '+ item.city_name +'</option>');
                    });                
                },
            });
        });

        $('#citys').change(function() {
            id_city = $(this).val();
            console.log(id_city);
            
            $('#couriers').empty('<select id="couriers" name="courier" class="form-control"> <option id="courier-option" value="0">Select courier</option> <option id="courier-option" value="jne">JNE</option> <option id="courier-option" value="tiki">TIKI</option> <option id="courier-option" value="pos">POS</option> </select>');
            
            $('#couriers').append('<option id="courier-option" value="0">Select courier</option>');
            $('#couriers').append('<option id="courier-option" value="jne">JNE</option>');
            $('#couriers').append('<option id="courier-option" value="tiki">TIKI</option>');
            $('#couriers').append('<option id="courier-option" value="pos">POS</option>');
        });

        $('#couriers').change(function() {
           var id_couries = $(this).val();
           $.ajax({
                type: 'post',
                crossDomain: true,
                url: 'https://cors-anywhere.herokuapp.com/' + 'http://api.rajaongkir.com/starter/cost',
                data: {
                    key: "cbee6636ac2066e596ff27bee25c5f00",
                    origin: "23",
                    destination: id_city,
                    weight: 700,
                    courier: id_couries, 
                },
                success: function(data) {
                    var results = data.rajaongkir.results;


                    $('#services').append('<select id="services" name="service" class="form-control"> <option id="service-option" value="0">Select service</option> </select>');
                    $('#services').empty('');
                    $('#services').append('<option id="service-option" value="0">Select service</option> ');

                    results.forEach(function(items){
                        console.log(items['costs']);
                        items['costs'].forEach(function(item){
                            item['cost'].forEach(function(cost){
                                $('#services').append('<option id="service-option" value="'+ cost.value +'">'+ item.service +'  RP.'+ cost.value +'</option>');
                            }); 
                        });     
                    }); 

                   //$('#alert-email').text(results); 
                },
            });
        });

       
     </script>
@endsection