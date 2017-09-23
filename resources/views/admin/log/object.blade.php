 @extends('/admin/main')
    @section('content')
                <script type="text/javascript">

                     $(function(){
                             meja();
                       });          
                      function meja() 
                      {
                        $.ajax({                                      
                          url: '{{url('/log/object')}}',                  //the script to call to get data          
                          data: "",                        //you can insert url argumnets here to pass to api.php
                                                           //for example "id=5&parent=6"
                          dataType: 'json',                //data format      
                          success: function(data)          //on recieve of reply
                          {
                            var item = data;
                            var result = item.Results;
                            var output = result.output1;
                            console.log(output);

                            for (var i = 0; i < output.length; i++) {
                                var item = output[i];
                                if(item.lhs != null){
                                     $('#logs').append("<tr><td> If user access <b>"+(item.lhs)
                                      .replace("{","").replace("}","")+"</b> then user access <b>"+(item.rhs)
                                      .replace("{","")
                                      .replace("}","")+"</b> Too</td><td>"+item.support+"</td><td>"+item.confidence+"</td><td>"+item.lift+"</td></tr>"); 
                                }
                            }     
                                $('#table_log').DataTable();
                            
                          } 
                        });
                      }

                </script>
                                <h4 class="title">Log Marker Object</h4>

                                        

                                    <table class="table table-striped" cellspacing="0" width="100%" id="table_log">
                                        <thead>
                                            <tr>
                                                <th>Category Access</th>
                                                <th>Support</th> 
                                                <th>Confidence</th> 
                                                <th>Lift</th> 
                                            </tr>

                                        </thead>
                                        <tbody id="logs">
                                       

                                        </tbody>
                                    </table>
                               

                              
                                  

    @stop
                               