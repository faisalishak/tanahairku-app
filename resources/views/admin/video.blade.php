<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Tanah Airku Asia</title>

	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<link href="../assets/css/main.css" rel="stylesheet">

	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,600,800,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css">
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>-->
				<a class="navbar-brand"><img class="responsive-img" width="150px" src="../assets/img/logo-white.png"/></a>
			</div>
		</div>
	</div>

    <div class="body-content">
        <div class="container-fluid">
            <div class="row">
                <div class="center">
                <?php
                    $query = DB::table('video')
                                ->join('country', 'video.id_country', '=', 'country.id_country')
                                ->select('video.id_video', 'video.video_name', 'video.video_url', 'country.country_name')
                                ->orderBy('video.id_video','asc')->get();
                    foreach($query as $result) {
                ?>
                    <div class="col-md-4">
                        <a href="video/<?php echo $result->id_video;?>">
                            <div class="card">
                                <div class="image">
                                    <img style="transform: scale(1.5, 1.5);" src="http://img.youtube.com/vi/<?php echo $result->video_url;?>/hqdefault.jpg" alt=""/>
                                </div>
                                <div class="video-desc">
                                    <h4 class="title"><?php echo $result->video_name;?><br/>
                                        <small><?php echo $result->country_name;?></small>
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>  
                <?php
                    }
                ?>    
                </div>         
            </div>
        </div>
    </div>

    <div class="footer">
		<hr>
        Made with <i class="fa fa-heart animated infinite pulse"></i> by CodeLabs Team &copy; 2016 <a href="#">Codelabs Team</a>
	</div>

    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
</body>