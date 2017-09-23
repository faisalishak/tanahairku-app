@extends('masterpage')

@section('content')
@if(!Auth :: guest())
      <!-- Container -->
      <form method="POST" action="{{ url('/checkout/create') }}" class="container padding-top-3x padding-bottom-2x">
        {{ csrf_field() }}
        <!--Variable Temporary-->
        <input name="id" value="{{Auth::user()->id}}" type="hidden">
        <input id="province" name="province" type="hidden">
        <input id="city" name="city" type="hidden">
        <input id="courier" name="courier" type="hidden">
        <input id="service" name="service" type="hidden">
        <input id="postal_fee" name="postal_fee" type="hidden">
        <div id="datatemp"></div>
        
        <h1 class="space-top-half">Checkout</h1>
        <div class="row padding-top">

          <!-- Checkout Form -->
          <div class="col-sm-8 padding-bottom">
            <div class="row">
              <div class="col-sm-6">
                <input value="{{ Auth::user()->first_name }}" style="box-shadow:none" style="box-shadow:none" type="text" class="form-control" name="first_name" placeholder="First name" required>
                <input value="{{ Auth::user()->last_name }}" style="box-shadow:none" type="text" class="form-control" name="last_name" placeholder="Last name" required>
                <input value="{{ Auth::user()->email }}" style="box-shadow:none" type="email" class="form-control" name="email" placeholder="Email" required>
                <input value="{{ Auth::user()->phone }}" style="box-shadow:none" type="number" class="form-control" name="phone" placeholder="Phone" required>
              </div>
              <div class="col-sm-6">
                <select style="box-shadow:none" id="provinces"  class="form-control" required>
                    <option id="province-option" value="">-Select province-</option>
                </select>
                <select style="box-shadow:none" id="citys"  class="form-control" required>
                    <option id="city-option" value="">-Select city-</option>
                </select>
                <select style="box-shadow:none" id="couriers"  class="form-control" required>
                    <option id="courier-option" value="">-Select courier-</option>
                </select>
                 <select style="box-shadow:none" id="services"  class="form-control" required>
                    <option id="service-option" value="">-Select service-</option>
                </select>
              </div>
            </div><!-- .row -->
            <input style="box-shadow:none" type="text" class="form-control" name="address" placeholder="Address" required>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-element form-select">
                  <select style="box-shadow:none" class="form-control" name="bank_transfer" required>
                    <option value="">-Bank Transfer-</option>
                    <option value="BNI">BNI</option>
                    <option value="BCA">BCA</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="BRI">BRI</option>
                    <option value="BTN">BTN</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <input style="box-shadow:none" type="number" class="form-control" name="postal_code" placeholder="Postal code" required>
              </div>
            </div><!-- .row -->
          </div><!-- .col-sm-8 -->

          <!-- Sidebar -->
          <div class="col-md-4 col-sm-4 padding-bottom">
            <aside>
              <h3>Cart total:</h3>
              <table data-toggle="table" data-sort-name="name" data-sort-order="desc">
                    <thead> 
                        <tr>
                            <th data-field="nama_bahan_baku" data-sortable="true"><b>Product</b></th>
                            <th data-field="stok"  data-sortable="true"><b>QTY</b></th>
                            <th data-field="stok"  data-sortable="true"><b>Sub total</b></th>
                        </tr>
                    </thead>
                    <tbody>
                    <input type="hidden" value="{{ $no = 1 }}">
                    <input type="hidden" value="{{ $sub_total_fee = 0 }}">
                    <input type="hidden" value="{{ $weight = 0 }}"> 
                        @foreach($product as $item)
                        <tr>
                            <td  data-sortable="true"> <p class="small">{{ $item->product_name }} </p></td>
                            <td  data-sortable="true"> <p class="small">{{ $quantity }} </p></td>
                            <td  data-sortable="true"> <p class="small">IDR. {{ $quantity * $item->price }} </p></td>
                            <input type="hidden" value="{{ $sub_total_fee = $sub_total_fee + ($quantity * $item->price) }}"> 
                            <input type="hidden" value="{{ $weight = $weight + ( $item->weight * $quantity ) }}">
                            <!--temp-->
                            <input name="id_product[]" type="hidden" value="{{ $item->id_product }}">
                            <input name="quantity[]" type="hidden" value="{{ $quantity }}">
                        </tr>
                        @endforeach
                        <input id="weight" name="weight" type="hidden" value="{{ $weight }}">
                    </tbody>
                </table>
              <input id="sub_total_fee" type="hidden" value="{{ $sub_total_fee }}">  
              <p class="small col-lg-offset-1 "><strong>Total</strong> : <span class="pull-right">IDR. {{ $sub_total_fee }}</span></p>
              <p class="small col-lg-offset-1"><strong>Postal Fee ( {{ $weight }} grams )</strong> : <span id="postalFee" class="pull-right">IDR. 0</span></p>
              <hr>
              <h4 id="totalprice">Total Price: 0</h4>
              <p class="text-sm text-gray">* Note: Complete your payment within 24 h</p>
              <button type="submit" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link">Checkout</button>
            </aside>
          </div><!-- .col-md-3.col-sm-4 -->
        </div><!-- .row -->
    </form><!-- .container -->


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
                    $('#datatemp').append('<input id="province'+ item.province_id +'" value="'+ item.province +'" type="hidden">');
                });
            },
        });

        $('#provinces').change(function() {
           var id_province = $(this).val();
           $('#province').val($('#province'+ id_province).val()); 

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

                    $('#citys').append('<select id="citys"  class="form-control"> <option id="city-option" value="">-Select city-</option> </select>');
                    $('#citys').empty('<select id="citys"  class="form-control"> <option id="city-option" value="">-Select city-</option> </select>');
                    $('#citys').append('<option id="city-option" value="">-Select city-</option> ');

                    results.forEach(function(item){
                        $('#citys').append('<option id="city-options" value="'+ item.city_id +'">'+ item.type +' '+ item.city_name +'</option>');
                        $('#datatemp').append('<input id="city'+ item.city_id +'" value="'+ item.type +' '+ item.city_name +'" type="hidden">');
                    });
                },
            });
        });

        $('#citys').change(function() {
            id_city = $(this).val();
            $('#city').val($('#city'+id_city).val()); 
            console.log(id_city);

            $('#couriers').empty('<select id="couriers"  class="form-control"> <option id="courier-option" value="">-Select courier-</option> <option id="courier-option" value="jne">JNE</option> <option id="courier-option" value="tiki">TIKI</option> <option id="courier-option" value="pos">POS</option> </select>');
            $('#couriers').append('<option id="courier-option" value="">-Select courier-</option>');
            $('#couriers').append('<option id="courier-option" value="jne">JNE</option>');
            $('#couriers').append('<option id="courier-option" value="tiki">TIKI</option>');
            $('#couriers').append('<option id="courier-option" value="pos">POS</option>');
        });

        $('#couriers').change(function() {
           var id_couries = $(this).val();
           $('#courier').val(id_couries);
           var weight_transaction = $('#weight').val();

           $.ajax({
                type: 'post',
                crossDomain: true,
                url: 'https://cors-anywhere.herokuapp.com/' + 'http://api.rajaongkir.com/starter/cost',
                data: {
                    key: "cbee6636ac2066e596ff27bee25c5f00",
                    origin: "23",
                    destination: id_city,
                    weight: weight_transaction,
                    courier: id_couries,
                },
                success: function(data) {
                    var results = data.rajaongkir.results;


                    $('#services').append('<select id="services" class="form-control"> <option id="service-option" value="">-Select service-</option> </select>');
                    $('#services').empty('');
                    $('#services').append('<option id="service-option" value="">-Select service-</option> ');

                    $i = 0;
                    results.forEach(function(items){
                        console.log(items['costs']);
                        items['costs'].forEach(function(item){
                            item['cost'].forEach(function(cost){
                                $('#services').append('<option value="'+ $i +'">'+ item.    service +'  IDR.'+ cost.value +'</option>');
                                $('#datatemp').append('<input id="postalfee'+$i+'" value="'+cost.value+'" type="hidden"><input id="service'+$i+'" value="'+'Courier: '+items.name+', Service: '+item.service+'" type="hidden">');
                                $i++;
                            });
                        });
                    });

                   //$('#alert-email').text(results);
                },
            });
        });


        $('#services').change(function() {
            var id = $(this).val();
            var postal_fee = parseInt($('#postalfee'+ id).val());
            var sub_total_fee = parseInt($('#sub_total_fee').val());
            $('#service').val($('#service'+ id).val());
            $('#postal_fee').val(postal_fee);

            console.log($('#service'+ id).val());

            $('#totalprice').replaceWith('<h4 id="totalprice">Total Price: '+ (postal_fee + sub_total_fee) +'</h4>');
            $('#postalFee').replaceWith('<span id="postalFee" class="pull-right">IDR. '+postal_fee+'</span>');
            $('#datatemp').append('<input name="total_fee" value="'+ (postal_fee + sub_total_fee) +'" type="hidden">');
        });    

     </script>
@else
 Please Login    
@endif     

@endsection
