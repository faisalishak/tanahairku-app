<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Tanah Airku Asia - Login</title>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,800,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
		
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

		<link href="../assets/css/login.css" rel="stylesheet">
	</head>

	<body>
		<div class="container">
			<div class="login-text">				
				<h3 style="margin-top: 50px;" >Admin Page</h3>
				<p><font size="2">Please Login to Your Account</font></p>
			</div>
			  {!! Form::open(array('url'=>'admin/login', 'class'=>'form-signin')) !!}
				<img src="{{asset('assets/img/logo-grey.png')}}" width="130px" style="margin-bottom: 10px"/>
				{!! Form::email('email', null, array('class'=>'form-control form-custom', 'placeholder'=>'Email', 'required')) !!}
				{!! Form::password('password', array('class'=>'form-control form-custom', 'placeholder'=>'Password', 'required')) !!}
				{!! Form::submit('Login', array('class'=>'btn btn-large btn-primary-grey', 'style'=>'padding: 14px 20px; margin-top: 20px;')) !!}
				{!! Form::close() !!}
		</div>
		<div class="container">
			 @if(Session::has('message'))
			<div class="alert alert-danger fade in" style="max-width: 350px; margin: 0px auto;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 {!! session('message') !!}
			</div>
			@endif
		</div>
 
		<footer class="footer">
		</footer>
		
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/jquery.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/alert.js"></script>
	</body>
</html>