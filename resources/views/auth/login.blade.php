@extends('masterpage')

@section('content')

<div id="background-ilustration" class="container padding-top-3x">
    <div class="row">
        <div class="">
            <!--<h4 class="login-flyer-header">Please login</h4>-->
        </div>
    </div>
    <div class="row row-centered padding-top-3x">
        <div class="col-md-5 col-centered">
            @if(Session::get('message'))
            <div class="alert bg-success" role="alert">
                {{ Session::get('message') }} <a href="#" class="pull-right" ><span class="glyphicon glyphicon-remove"></span></a>
            </div>
            @endif
            <div class="col-sm-12"> 
                <div id="login-flyer-box" class="login-flyer-wrapper" style="display: block;">
                    <h3 class="block-title text-center">Sign In</h3>
                    <div style="display:none" id="login-box-information" class="alert information-box error">
                        <button type="button" class="close" onclick="$(this).parent().fadeOut('slow')"><span aria-hidden="true">×</span></button>
                        <div id="login-content-information" class="information-box-content">
                        </div>
                    </div>
                    <form role="form" id="form-login-flyer" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                        <div class="login-flyer-body">
                            <input type="hidden" name="id_product" value="{{ $id_product }}">
                            <input type="hidden" name="quantity" value="{{ $qty }}">
                            <input type="email" name="email" placeholder="Your e-mail" class="form-control" required>
                            <input type="password" name="password" placeholder="Your Password" class="form-control" required>
                        </div>
                        <div class="login-flyer-footer">
                            <span id="login-btn-loading" class="loading-small loading-button" style="display: none;padding-right:10px;"></span>
                            <button type="submit" id="login-flyer-btn" data-form="#form-login-flyer" onclick="login(this.id)" name="submit" class="btn btn-ghost btn-sm btn-pill pull-left btn-primary waves-effect waves-light ajax-load-link">SIGN IN</button>
                        </div>
                        <div class="text-right">
                            <a href="javascript:void(1)" onclick="switchToggle('forgot')">Forgot password</a><br>
                            <a href="javascript:void(1)" onclick="switchToggle('reg')">Register an account</a>
                        </div>
                    </form>
                </div>

                <div id="register-flyer-box" class="login-flyer-wrapper" style="display: none;">
                    <h3 class="block-title text-center">Register New Account</h3>
                    <div style="display:none" id="register-box-information" class="alert information-box error">
                        <button type="button" class="close" onclick="$(this).parent().fadeOut('slow')"><span aria-hidden="true">×</span></button>
                        <div id="register-content-information" class="information-box-content">
                        </div>
                    </div>
                    <form id="form-register-flyer" action="{{ url('/register') }}" method="POST" enctype="multipart/form-data" role="form"  >
                        {{ csrf_field() }}
                        <div class="login-flyer-body">
                            <input type="text" id="reg_first_name" name="reg_first_name" placeholder="First name" class="form-control">
                            <input type="text" name="reg_last_name" placeholder="Last name" class="form-control">
                            <input type="text" id="reg_email" name="reg_email" placeholder="Email" class="form-control">
                            <input type="password" id="reg_password" name="reg_password" placeholder="Your password" class="form-control">
                            <input type="password" id="reg_re_password" name="reg_re_password" placeholder="Re-type password" class="form-control">
                        </div>
                        <div class="login-flyer-footer">
                            <span id="register-btn-loading" class="loading-small loading-button" style="display: none;padding-right:10px;"></span>
                            <button type="submit" id="register-flyer-btn" name="submit" class="pull-left btn btn-ghost btn-sm btn-pill btn-primary waves-effect waves-light ajax-load-link">REGISTER</button>
                        </div>
                        <div class="text-right">
                            <a href="javascript:void(1)" onclick="switchToggle('login')">Already have an account</a>
                        </div>
                    </form>
                </div>

                <div id="forgot-flyer-box" class="login-flyer-wrapper" style="display: none;">
                    <h3 class="block-title text-center">Forgot Password</h3>
                    <div style="display:none" id="forgot-box-information" class="alert information-box">
                        <button type="button" class="close" onclick="$(this).parent().fadeOut('slow')"><span aria-hidden="true">×</span></button>
                        <!--<div class="information-box-header"><i class="fa fa-warning"></i> Failed!</div>-->
                        <div id="forgot-content-information" class="information-box-content">
                        </div>
                    </div>
                    <form id="form-forgot-flyer" method="POST" action="https://www.octagonstudio.com/en/users/processForgot">
                        <div class="login-flyer-body">
                            <input type="text" name="forgot_email" placeholder="Email" class="form-control">
                        </div>
                        <div class="login-flyer-footer">
                            <span id="forgot-btn-loading" class="loading-small loading-button" style="display: none"></span>
                            <button type="submit" id="forgot-flyer-btn" data-form="#form-forgot-flyer" onclick="forgotpass(this.id)" name="submit" class="pull-left btn btn-ghost btn-sm btn-pill btn-primary waves-effect waves-light ajax-load-link">SUBMIT</button>
                        </div>
                        <div class="text-right">
                            <a href="javascript:void(1)" onclick="switchToggle('reg')">Register an account</a>
                        </div>
                    </form>
                </div>
            </div> <!--/endcol-->
        </div>
    </div>
</div>
<script src="https://www.octagonstudio.com/javascripts/custom/jquery.validate.min.js"></script>

<script>
    $(function() {
    })
    
    function switchToggle(value){
        if(value == 'reg'){
            $('.login-flyer-wrapper').fadeOut('fast', function(){
                $('#register-flyer-box').fadeIn('fast', function(){
                    $.colorbox.resize()
                });
            })
        }
        else if(value == 'login'){
            $('.login-flyer-wrapper').fadeOut('fast', function(){
                $('#login-flyer-box').fadeIn('fast', function(){
                   $.colorbox.resize() 
                });
            })
        }
        else{
            $('.login-flyer-wrapper').fadeOut('fast', function(){
                $('#forgot-flyer-box').fadeIn('fast', function(){
                    $.colorbox.resize();
                });
            })
        }
    }
    
    function login(btnID){
        $('#form-login-flyer').validate({
            rules: {
              email: {
                required: true,
                email: true
              },
              password: {
                required: true
              }
            },
            submitHandler: function(form){
                var $btn = $('#' + btnID);
                $btn.attr('disabled', 'disabled');
                $('#login-btn-loading').fadeIn();
                
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    dataType: 'JSON',
                    data: $(form).serialize(),
                    success: function(res) {
                        $('#login-btn-loading').fadeOut();
                        if (res.stat == true) {
                            $btn.removeAttr('disabled');
                            $.colorbox.close();
                            window.location.reload();
                        }else{
                            $('#login-content-information').html(res.message);
                            $('#login-box-information').fadeIn();
                            $.colorbox.resize();
                            $btn.removeAttr('disabled');
                        }
                    }
                });
            },
            invalidHandler: function() {
                setTimeout(function(){
                    $.colorbox.resize();
                }, 100)
            }
        });
    }
    
    function register(btnID){
        $('#form-register-flyer').validate({
            rules: {
              reg_first_name: 'required',
              reg_email: {
                required: true,
                email: true
              },
              reg_password: {
                required: true,
                minlength: 6
              },
              reg_re_password: {
                required: true,
                equalTo: "#reg_password"
              }
            },
            submitHandler: function(form){
                var $btn = $('#' + btnID);
                $btn.attr('disabled', 'disabled');
                $('#register-btn-loading').fadeIn();

                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    dataType: 'JSON',
                    data: $(form).serialize(),
                    success: function(res) {
                        $('#register-btn-loading').fadeOut();
                        if (res.stat == true) {
                            
                            if(res.from == "tss") {
                                
                                switchToggle('login');
                                $('#login-content-information').html(res.msg);
                                $('#login-box-information').fadeIn();
                                $.colorbox.resize();
                                
                            } else {
                                $btn.removeAttr('disabled');
                                $.colorbox.close();
                                window.location.href = res.url;
                            }
                        }else{
                            $('#register-content-information').html(res.message);
                            $('#register-box-information').fadeIn();
                        }
                    }
                });
            },
            invalidHandler: function() {
                setTimeout(function(){
                    $.colorbox.resize();
                }, 100)
            }
          });
        
    }
    
    function forgotpass(btnID){
        $('#form-forgot-flyer').validate({
            rules: {
              forgot_email: {
                required: true,
                email: true
              }
            },
            submitHandler: function(form){
                var $btn = $('#forgot-flyer-btn');
                $btn.attr('disabled', 'disabled');
                $('#forgot-btn-loading').show();
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    dataType: 'JSON',
                    data: $(form).serialize(),
                    success: function(res) {
                        if (res.stat == true) {
                            $btn.removeAttr('disabled');
                            $('#forgot-content-information').html(res.message);
                            $('#forgot-box-information').removeClass('error').addClass('success').fadeIn();
                            $.colorbox.resize();
                        }else{
                            $('#forgot-content-information').html(res.message);
                            $('#forgot-box-information').removeClass('success').addClass('error').fadeIn();
                            $.colorbox.resize();
                        }
                        
                        $('#forgot-btn-loading').hide();
                    }
                });
            },
            invalidHandler: function() {
                setTimeout(function(){
                    $.colorbox.resize();
                }, 100)
            }
          });
    }
</script>
@endsection