 @extends('admin/main')
    @section('content')
 
                    @if ($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Warning!</strong> {!! $error !!} 
                        </div>
                                                            
                @endforeach
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success"><em> {!! session('success') !!}</em></div>
            @endif
            <form action="{{url('/admin/product/create')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

                <div class="form-group">
                    <input type="text" name="product_name" class="form-control"  placeholder="Product name">
                </div>
                
                <div class="form-group">
                    <input type="number" name="price" class="form-control" placeholder="Product price">
                </div>
                <div class="form-group">
                    <input type="number" name="weight" class="form-control" placeholder="Product weight">
                </div>
                    <div class="form-group">
                    <label>Product Thumnail</label>
                    <input type="file" name="tumbnail">
                    <p class="help-block">Maximum 2MB</p>
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image[]" multiple>
                    <p class="help-block">You can choose multiple image</p>
                </div>
                <div class="form-group">
                    <label >Product Description</label>
                    <textarea class="form-control" rows="4" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label >Product Specification</label>
                    <textarea class="form-control" rows="4" name="specification"></textarea>
                </div>
                
                <input type="submit" class="btn btn-info" value="Save">
            </form>

            <script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
            <script language="javascript" src="js/myplugin/plugin.js"></script>
            <script>
                //CKEDITOR.config.extraPlugins = 'lineheight';
                //enable plugin
                CKEDITOR.replace( 'specification', {
                on: {
                    instanceReady: function( ev ) {
                        // Output paragraphs as <p>Text</p>.
                        this.dataProcessor.writer.setRules( 'p', {
                            indent: false,
                            breakBeforeOpen: false,
                            breakAfterOpen: false,
                            breakBeforeClose: false,
                            breakAfterClose: false
                        });
                    }
                }
            });

            </script>
    @stop
