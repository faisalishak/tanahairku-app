 @extends('/admin/main')
    @section('content')

                                <a href="{{url('/admin/product/create')}}"><button type="button" class="btn btn-default pull-right">
                                TAMBAH PRODUCT</button></a>
                                <h4 class="title">Product</h4>
                                <p class="category">Manage product that you have</p>

                                        <!-- Modal -->
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                             <em> 

                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         {!! session('success') !!}
                                            </em>
                                            </div>
                                     @endif

                                    <table class="table table-striped" id="myTable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product as $data)
                                            <tr>
                                                <td>{{$data->product_name}}</td>
                                                <td>{{$data->price}}</td>
                                                <td>
                                                    <a data-toggle="modal" href="#product{{$data->id_product}}" data-target="#product{{$data->id_product}}">
                                                        Detail
                                                    </a>
                                                     <a href="{{url('/admin/product')}}/{{$data->id_product}}">
                                                        Edit
                                                    </a>


                                                    <a data-toggle="modal" data-target="#delete{{$data->id_product}}">
                                                        Delete
                                                    </a>

                                                </td>

                                            </tr>
                                         @endforeach

                                        </tbody>
                                    </table>
                               

                              
                                  

    @stop
  <!-- modal edit-->
                                @foreach ($product as $x)
                                <div class="modal fade modal-success" id="product{{$x->id_product}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Detail Product</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <img src="{{url('img')}}/{{$x->tumbnail}}" width="200px" height="200px">

                                                        </div>
                                                         <div class="form-group">
                                                            <label><strong>Product Name</strong></label>
                                                            {{$x->product_name}}
                                                         </div>
                                                         <div class="form-group">
                                                            <label>Product Deskription</label>
                                                            {{$x->description}}
                                                         </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                   @endforeach