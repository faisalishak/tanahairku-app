@extends('admin/main')
   @section('content')

                                <a class="btn btn-default pull-right" data-toggle="modal" href="#add">Add</a></h4>
                                   
                                <h4 class="title">Unique Code</h4>
                                <p class="category">Unique Code for Registering the App.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="myTable">
                                    <thead>
                                        <th>Unique Code</th>
                                        <th>Type</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                       
                                            @foreach ($data as $result)
                                                <tr>
                                                    <td>{{$result->unique_code}}</td>
                                                    <td>{{$result->type_unique_code}}</td>
                                                    <td><a data-toggle="modal" href="#edit{{$result->unique_code}}">Edit</a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" href="#delete{{$result->unique_code}}">Delete</a></td>
                                                </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stop
         <!-- Tambah -->
                                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Add Unique Code</h4>
                                                </div>
                                                        
                                                <div class="modal-body">
                                                    {!! Form::open(array('url'=>'admin/addcode'))!!}
                                                    <dl class="dl-vertical">
                                                        <dt>Unique Code</dt>
                                                        <dd><input type="text" class="form-control" name="unique_code" placeholder="Unique Code"/></dd>
                                                    </dl>

                                                    <dl class="dl-vertical">
                                                        <dt>Type</dt>
                                                        <dd>
                                                            <select name="type_unique_code" class="form-control form-custom">
                                                                <option value="Family">Family</option>
                                                                <option value="Personal">Personal</option>
                                                            </select>
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <div class="modal-footer">
                                                    {!! Form::submit('Add', array('class'=>'btn btn-primary')) !!}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.Tambah -->
 <!-- Edit -->
  @foreach ($data as $result)
                                            <div class="modal fade" id="edit{{$result->unique_code}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Unique Code</h4>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                             {!!Form::open(array('url'=>'admin/updatecode'))!!}
                                                            <input type="hidden" name="unique_code" value="{{$result->unique_code}}">
                                                            <dl class="dl-vertical">
                                                                <dt>Unique Code</dt>
                                                                <dd><input type="text" value=" {{$result->unique_code}}" class="form-control" name="unique_code_update" placeholder="Unique Code"/></dd>
                                                            </dl>
                                                        </div>
                                                        <div class="modal-footer">
                                                             {!!Form::submit('Update', array('class'=>'btn btn-primary'))!!}
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                             {!!Form::close()!!}
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.Edit -->
                                            <!-- Delete -->
                                            <div class="modal fade" id="delete{{$result->unique_code}}" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header col-md-offset-3">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                     {!!Form::open(array('url'=>'admin/deletecode')) !!}
                                                    <label class="modal-title" id="myModalLabel">Are you sure ?</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="hidden" name="unique_code" value=" {{$result->unique_code}}">
                                                        <input type="submit" value="Yes" class="btn btn-warning">
                                                     {!!Form::close()!!}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                            </div><!-- /.Delete -->
 @endforeach                                           
<script>
      @foreach ($data as $result)
            $('#edit{{$result->unique_code}}').appendTo("body");
            $('#delete e{{$result->unique_code}}').appendTo("body");
      @endforeach
    

    $('#add').appendTo("body");
</script>
