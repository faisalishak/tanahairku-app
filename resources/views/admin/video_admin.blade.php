<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tanah Airku Asia - Video</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/admin.css" rel="stylesheet"/>

	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <img src="../assets/img/logo-white.png" width="120px" style="padding: 20px 0px;"/>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="code">
                        <p>Unique Code</p>
                    </a>
                </li>
                <li class="active">
                    <a href="video">
                        <p>Video</p>
                    </a>
                </li>
                <li>
                    <a href="registered">
                        <p>Registered</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Unique Code</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-extended">
                        <li>
                            <a href="dashboard">
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="code">
                                <p>Unique Code</p>
                            </a>
                        </li>
                        <li>
                            <a href="video">
                                <p>Video</p>
                            </a>
                        </li>
                        <li>
                            <a href="registered">
                                <p>Registered</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <a class="btn btn-fill btn-default pull-right" data-toggle="modal" href="#add">Add</a></h4>
                                    <!-- Tambah -->
                                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Add Video</h4>
                                                </div>
                                                        
                                                <div class="modal-body">
                                                    <?php echo Form::open(array('url'=>'admin/addvideo')); ?>
                                                    <dl class="dl-vertical">
                                                        <dt>Name</dt>
                                                        <dd><input type="text" class="form-control" name="video_name" placeholder="Name"/></dd>
                                                    </dl>
                                                    <dl class="dl-vertical">
                                                        <dt>Country</dt>
                                                        <dd>
                                                            <select name="id_country" class="form-control form-custom">
                                                                <?php
                                                                    $country = DB::table('country')->get();

                                                                    foreach ($country as $c)
                                                                    {
                                                                    ?>												
                                                                        <option value="<?php echo $c->id_country?>"><?php echo $c->country_name ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </dd>
                                                    </dl>
                                                    <dl class="dl-vertical">
                                                        <dt>URL</dt>
                                                        <dd><input type="text" class="form-control" name="video_url" placeholder="URL"/></dd>
                                                    </dl>
                                                    <dl class="dl-vertical">
                                                        <dt>Description</dt>
                                                        <dd><textarea class="form-control" name="video_desc" placeholder="Description"></textarea></dd>
                                                    </dl>
                                                </div>
                                                <div class="modal-footer">
                                                    <?php echo Form::submit('Add', array('class'=>'btn btn-primary')); ?>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <?php echo Form::close(); ?>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.Tambah -->
                                <h4 class="title">Video</h4>
                                <p class="category">Cultural video.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>URL</th>
                                        <th>Description</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = DB::table('video')
                                                ->join('country', 'video.id_country', '=', 'country.id_country')
                                                ->select('video.id_video', 'video.video_name', 'video.video_url', 'country.country_name', 'country.id_country', 'video.video_desc')
                                                ->orderBy('video.id_video','asc')->get();
                                            $i=1;
                                            foreach ($query as $result){
                                                echo"<tr>";
                                                    echo"<td>$result->video_name</td>";
                                                    echo"<td>$result->country_name</td>";
                                                    echo"<td>$result->video_url</td>";
                                                    echo"<td>$result->video_desc</td>";
                                                    echo"<td><a data-toggle=modal href=#edit$i>Edit</a>&nbsp;&nbsp;&nbsp;<a data-toggle=modal href=#delete$i>Delete</a></td>";
                                                echo"</tr>";
                                        ?>
                                            <!-- Edit -->
                                            <div class="modal fade" id="edit<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Video</h4>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <?php echo Form::open(array('url'=>'admin/updatevideo')); ?>
                                                            <input type="hidden" name="id_video" value="<?php echo $result->id_video;?>">
                                                            <dl class="dl-vertical">
                                                                <dt>Name</dt>
                                                                <dd><input type="text" value="<?php echo $result->video_name?>" class="form-control" name="video_name" placeholder="Name"/></dd>
                                                            </dl>
                                                            <dl class="dl-vertical">
                                                                <dt>Country</dt>
                                                                <dd>
                                                                    <select name="id_country" class="form-control form-custom">
                                                                        <?php
                                                                            $country = DB::table('country')->get();

                                                                            foreach ($country as $c)
                                                                            {
                                                                        ?>												
                                                                            <option value="<?php echo $c->id_country?>" <?php if($result->id_country==$c->id_country) echo "selected"; ?>><?php echo $c->country_name ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </dd>
                                                            </dl>
                                                            <dl class="dl-vertical">
                                                                <dt>URL</dt>
                                                                <dd><input type="text" value="<?php echo $result->video_url?>" class="form-control" name="video_url" placeholder="URL"/></dd>
                                                            </dl>
                                                            <dl class="dl-vertical">
                                                                <dt>Description</dt>
                                                                <dd><textarea class="form-control" name="video_desc" placeholder="Description"><?php echo $result->video_desc?></textarea></dd>
                                                            </dl>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <?php echo Form::submit('Update', array('class'=>'btn btn-primary')); ?>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <?php echo Form::close(); ?>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.Edit -->
                                            <!-- Delete -->
                                            <div class="modal fade" id="delete<?php echo $i;?>" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header col-md-offset-3">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <?php echo Form::open(array('url'=>'admin/deletevideo')); ?>
                                                    <label class="modal-title" id="myModalLabel">Are you sure ?</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="hidden" name="id_video" value="<?php echo $result->id_video;?>">
                                                        <input type="submit" value="Yes" class="btn btn-warning">
                                                    <?php echo Form::close(); ?>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                            </div><!-- /.Delete -->
                                        <?php
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    Made with <i class="fa fa-heart animated infinite pulse"></i> by CodeLabs Team &copy; 2016 <a href="#">Codelabs Team</a>
                </p>
            </div>
        </footer>

    </div>
</div>

<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Modal  -->
<script>
    <?php
        for($j= 0 ; $j <= $i; $j++){
    ?>
            $('#edit<?php echo $j;?>').appendTo("body")
            $('#delete<?php echo $j;?>').appendTo("body")
    <?php
        }
    ?>

    $('#add').appendTo("body")
</script>
</body>

</html>
