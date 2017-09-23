 @extends('/admin/main')
    @section('content')
                <script type="text/javascript">

                     $(function(){
                             meja();
                       });          
                      function meja() 
                      {
                        $.ajax({                                      
                          url: '{{url('/log/cluster')}}',                  //the script to call to get data          
                          data: "",                        //you can insert url argumnets here to pass to api.php
                                                           //for example "id=5&parent=6"
                          dataType: 'json',                //data format      
                          success: function(data)          //on recieve of reply
                          {
                            var item = data;
                            var output = item.datas;
                            console.log(output);
                            $('#tits').text('Customer Cluster ('+output.length+' User)');
                            $('#ones').text('Category 1 : '+data.jml.zero+' users');
                            $('#two').text('Category 2 : '+data.jml.one+' users');
                            for (var i = 0; i < output.length; i++) {
                                var item = output[i];
                                //console.log(item);
                                     $('#logs').append("<tr><td>"+(item.id_device)+"</td><td>"+(parseInt(item.Assignments)+1)+"</td></tr>"); 
                                
                            }   
                             $('#table_log').DataTable();

                            var open = data.open0;
                            
                               $('#maxOpen').text(open.max);
                               $('#avgOpen').text(open.avg);
                               $('#minOpen').text(open.min);
                            var scan = data.os0;
                                $('#maxScan').text(scan.max);
                                $('#avgScan').text(scan.avg);
                                $('#minScan').text(scan.min);
                            var scan = data.om0;
                                $('#maxMinute').text(scan.max);
                                $('#avgMinute').text(scan.avg);
                                $('#minMinute').text(scan.min);
                            var scan = data.oc0;
                                $('#maxC').text(scan.max);
                                $('#avgC').text(scan.avg);
                                $('#minC').text(scan.min);    
                            var scan = data.ow0;
                                $('#maxW').text(scan.max);
                                $('#avgW').text(scan.avg);
                                $('#minW').text(scan.min);

                           var open = data.open1;
                            
                               $('#maxOpen1').text(open.max);
                               $('#avgOpen1').text(open.avg);
                               $('#minOpen1').text(open.min);
                            var scan = data.os1;
                                $('#maxScan1').text(scan.max);
                                $('#avgScan1').text(scan.avg);
                                $('#minScan1').text(scan.min);
                            var scan = data.om1;
                                $('#maxMinute1').text(scan.max);
                                $('#avgMinute1').text(scan.avg);
                                $('#minMinute1').text(scan.min);
                            var scan = data.oc1;
                                $('#maxC1').text(scan.max);
                                $('#avgC1').text(scan.avg);
                                $('#minC1').text(scan.min);    
                            var scan = data.ow1;
                                $('#maxW1').text(scan.max);
                                $('#avgW1').text(scan.avg);
                                $('#minW1').text(scan.min);  

                          } 
                        });
                      }

                </script>
                                <h4 class="title" id="tits"></h4>

                                        

                                    <table class="table table-striped" cellspacing="0" width="100%" id="table_log">
                                        <thead>
                                            <tr>
                                                <th>Id device</th>
                                                <th>Category</th>
                                            </tr>

                                        </thead>
                                        <tbody id="logs">
                                       

                                        </tbody>
                                    </table>

               
                      <table class="table table-striped" cellspacing="0" width="30%" style="margin-top:20px">
                         <thead>
                             <tr>
                              <th colspan="2"><h3 id="ones"></h3></th>
                          </tr>
                          <tr>
                              <th></th><th>Open App</th><th>Object Scanned</th><th>Trivia Correct Answer</th><th>Trivia Wrong Answer</th>
                          </tr>
                         </thead>
                          
                          <tr>
                              <td>Maximum</td>
                              <td id="maxOpen"></td>
                              <td id="maxScan"></td>
                              <td id="maxC"></td>
                              <td id="maxW"></td>
                          </tr>
                          <tr>
                              <td>Average</td>
                              <td id="avgOpen"></td>
                              <td id="avgScan"></td>
                              <td id="avgC"></td>
                              <td id="avgW"></td>
                          </tr>
                          <tr>
                              <td>Minimum</td>
                              <td id="minOpen"></td>
                              <td id="minScan"></td>
                              <td id="minC"></td>
                              <td id="minW"></td>
                          </tr>
                          
                      </table>
                      <table class="table table-striped" cellspacing="0" width="30%" style="margin-top:20px">
                         <thead>
                             <tr>
                              <th colspan="2"><h3 id="two"></h3></th>
                          </tr>
                          <tr>
                              <th></th><th>Open App</th><th>Object Scanned</th><th>Trivia Correct Answer</th><th>Trivia Wrong Answer</th>
                          </tr>
                         </thead>
                          
                          <tr>
                              <td>Maximum</td>
                              <td id="maxOpen1"></td>
                              <td id="maxScan1"></td>
                              <td id="maxC1"></td>
                              <td id="maxW1"></td>
                          </tr>
                          <tr>
                              <td>Average</td>
                              <td id="avgOpen1"></td>
                              <td id="avgScan1"></td>
                              <td id="avgC1"></td>
                              <td id="avgW1"></td>
                          </tr>
                          <tr>
                              <td>Minimum</td>
                              <td id="minOpen1"></td>
                              <td id="minScan1"></td>
                              <td id="minC1"></td>
                              <td id="minW1"></td>
                          </tr>
                          
                      </table>
                     

                              
                                  

    @stop
                               