<?php
     $query = DB::table('video')
                ->join('country', 'video.id_country', '=', 'country.id_country')
                ->select('video.id_video', 'video.video_name', 'video.video_url', 'country.country_name', 'video.video_desc')
                ->where('id_video', '=', $id)
                ->orderBy('video.id_video','asc')->first();
?>

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

    <div class="content" style="overflow: hidden; padding-top: 90px;">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <iframe width="100%" height="400" src="http://youtube.com/embed/<?php echo $query->video_url;?>" frameborder="0" allowfullscreen></iframe>
                </div>  
                 <div class="col-md-12" style="padding: 30px 7%; margin: 0 auto;">
                     <div class="card" style="padding: 30px 5%">
                         <div class="header">
                            <h4 class="title"><?php echo $query->video_name;?></h4>
                            <p style="font-size: 14px; font-weight: 300;"><small><?php echo $query->country_name;?></small></p>
                        </div>
                        <div class="content content-desc">
                            <br/>
                            <p><?php echo $query->video_desc;?></p>
                        </div>
                     </div>
                 </div>        
            </div>
        </div>
    </div>

    <div class="footer">
		<hr>
        Made with <i class="fa fa-heart animated infinite pulse"></i> by CodeLabs Team &copy; 2016 <a href="#">Codelabs Team</a>
	</div>
</body>