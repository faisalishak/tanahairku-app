@extends('admin/main')
   @section('content')
                                <h4 class="title">Registered</h4>
                                <p class="category">List of registered device.</p>
                            
                            <div class="content table-responsive">
                                <table class="table table-hover table-striped" id="myTable">
                                    <thead>
                                        <th>Unique Code</th>
                                    	<th>Type</th>
                                    	<th>Device Registered</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query =    DB::table('registered')
                                                        ->join('unique_code','registered.unique_code', '=','unique_code.unique_code')
                                                        ->select(DB::raw('registered.unique_code, COUNT(registered.unique_code) AS count_unique_code, unique_code.type_unique_code'))
                                                        ->groupBy('registered.unique_code','unique_code.type_unique_code')
                                                        ->get();
                                                        

                                            $i=1;
                                            foreach ($query as $result){
                                                echo"<tr>";
                                                    echo"<td>$result->unique_code</td>";
                                                    echo"<td>$result->type_unique_code</td>";
                                                    echo"<td>$result->count_unique_code</td>";
                                                    echo"<td><a data-toggle=modal href=#detail$i>Detail</a>";
                                                echo"</tr>";
                                            ?>
                                           
                                        <?php
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                  



@stop
 <?php
                                            $query =    DB::table('registered')
                                                        ->join('unique_code','registered.unique_code', '=','unique_code.unique_code')
                                                        ->select(DB::raw('registered.unique_code, COUNT(registered.unique_code) AS count_unique_code, unique_code.type_unique_code'))
                                                        ->groupBy('registered.unique_code','unique_code.type_unique_code')
                                                        ->get();
                                                        

                                            $i=1;
                                            foreach ($query as $result){
                                              
                                            ?>
                                            <!-- Detail -->
                                            <div class="modal fade" id="detail<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Device Registered With <?php echo "$result->unique_code";?></h4>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <dl class="dl-vertical">
                                                                <?php
                                                                    $subQuery = DB::table('registered')
                                                                         ->where('unique_code', '=', $result->unique_code)
                                                                        ->get();
                                                                    
                                                                    $j = 1;
                                                                    foreach ($subQuery as $subResult){
                                                                        echo "<dd><b>ID Device</b> $subResult->id_device</dd>";
                                                                        echo "<dd><b>First Login</b> $subResult->created_at</dd>";
                                                                        echo "<dd><b>Last Login</b> $subResult->updated_at</dd>";
                                                                        echo"<dd><a data-toggle=modal href=#delete$j>Delete</a></dd>";
                                                                        echo "<br/>";
                                                                ?>
                                                                        <!-- Delete -->
                                                                        <div class="modal fade" id="delete<?php echo $j;?>" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header col-md-offset-3">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <?php echo Form::open(array('url'=>'admin/deleteregistered')); ?>
                                                                                <label class="modal-title" id="myModalLabel">Are you sure ?</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <input type="hidden" name="id_registered" value="<?php echo $subResult->id_registered;?>">
                                                                                    <input type="submit" value="Yes" class="btn btn-warning">
                                                                                <?php echo Form::close(); ?>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                            </div>
                                                                            </div><!-- /.modal-content -->
                                                                        </div><!-- /.modal-dialog -->
                                                                        </div><!-- /.Delete -->
                                                                <?php
                                                                        $j++;
                                                                    }
                                                                ?>
                                                            </dl>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.Detail -->
                                        <?php
                                                $i++;
                                            }
                                        ?>
<!--  Modal  -->
<script>
    <?php
        for($j= 0 ; $j <= $i; $j++){
    ?>
            $('#detail<?php echo $j;?>').appendTo("body")
    <?php
        }
    ?>
</script>

