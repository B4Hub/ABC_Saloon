<style>
    .checkbox-select:disabled :checked{
        background-color: #435ebe;
        opacity: 1;
    }
    input[type="checkbox"][readonly] {
        pointer-events: none;
    }
</style>
<div class="page-heading">
        <h3>FEEDBACK</h3>
</div>
<div class="card">
    <form action="sendalert1" method="post" id="alertform">
            <div class="card-header d-flex">
                    
                    <!-- <div class="" style="margin-left:auto ;">
                        <button class="btn btn-primary" id="alertbtn" type="button" onclick="checkbtn()" >Send Alert</button>
                    </div> -->
            </div>
            <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Sl . No</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Rating</th>
                                <th>Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $cnt=0;
                                foreach($feedbacks as $feedback){
                                    $cnt++;
                                    echo "<tr>";
                                    echo "<td>".$cnt."</td>";
                                    echo "<td>".$feedback['cust_name']."</td>";
                                    echo "<td>".$feedback['feedback_title']."</td>";
                                    echo "<td>".$feedback['feedback_description']."</td>";
                                    echo "<td>";
                                    for($i=0;$i<$feedback['rating'];$i++){ echo '<i class="bi bi-star-fill text-warning"></i> ';}
                                    echo "</td>";
                                    echo "<td>".$feedback['appoint_id']."</td>";
                                    echo "</tr>";
                                }

                            ?> 
                        </tbody>
                    </table>
            </div>
    </form>            
</div>  

<script src="<?php echo base_url() ?>app_assets/vendors/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>app_assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>app_assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script>
// Jquery Datatable
let jquery_datatable = $("#table1").DataTable();
    
    
    function checkbtn(){
        var checked = false;
        $('.checkbox').each(function(){
            if($(this).is(':checked')){
                checked = true;
            }
        });
        if(checked){
            $('#alertform').submit();
        }else{
            alert('Please select atleast one customer');
        }
    }
    

    function select_customer(id){
        if($('#customer'+id).is(":checked")){
            
            $('#customer'+id).removeAttr('checked')
        }else{
            $('#customer'+id).attr('checked','checked')
        }
    }
    $(document).ready(function(evt){
        
        let all_selected = false;
        $('#select_all_btn').on('click',function(){
        if(all_selected){
            $('.checkbox-select').attr('checked',false)
            $('#select_all_btn').text('Select All')
            all_selected = false;
        }else{
            $('.checkbox-select').attr('checked',true)
            $('#select_all_btn').text('Unselect All')
            all_selected = true;
        }
        })
       
        

    })
</script>
