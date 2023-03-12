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
        <h3>Customers</h3>
</div>
<div class="card">
    <form action="sendalert1" method="post" id="alertform">
            <div class="card-header d-flex">
                    <div class="" style="margin-right:auto ;">
                        <button type="button" id="select_all_btn" class="btn btn-secondary">Select All</button>
                    </div>
                    <div class="" style="margin-left:auto ;">
                        <button class="btn btn-primary" id="alertbtn" type="button" onclick="checkbtn()" >Send Alert</button>
                    </div>
            </div>
            <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-center">Gender</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $cnt=0;
                                foreach($customers as $employee){
                                    ?>
                                    
                                    <tr role="button" onclick="select_customer(<?php echo $cnt ?>)">
                                        <td><input type="checkbox"
                                                class="form-check-input form-check-primary checkbox form-check-glow checkbox-select" 
                                                name="customCheck" form="alertform" value="<?= $cnt ?>" id="customer<?php echo $cnt ?>" readonly ></td>
                                               
                                        <td><?php echo $employee['cust_name'] ?></td>
                                        <td><?php echo $employee['cust_email'] ?></td>
                                        <td><?php echo $employee['cust_phno'] ?></td>
                                        <td class="text-center"><?php if($employee['cust_gender'] == 'm'){ echo 'Male <i class="text-primary fa fa-mars"></i>';}else{ echo ' Female <i style="color:#e83e8c" class="fa fa-venus"></i>';} ?></td>
                                        <td>
                                            <span class="badge bg-success"><?php echo $employee['cust_status'] ?></span>
                                        </td>
                                
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                            ?> 
                        </tbody>
                    </table>
            </div>
    </form>            
</div>  
<script>
    
    
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
