
<link rel="stylesheet" href="<?php echo base_url() ?>app_assets/vendors/choices.js/choices.min.css" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .table tr:hover{
        background: rgba(0,0,0,0.13);
    }
    .card{
        -webkit-box-shadow: 0px 0px 32px 10px rgba(0,0,0,0.06);
-moz-box-shadow: 0px 0px 32px 10px rgba(0,0,0,0.06);
box-shadow: 0px 0px 32px 10px rgba(0,0,0,0.06);

    }
    .detail-text{
        font-size: 0.9em;
    }
    .detail-desc{
        font-size: 1.1em;  
    }
    .border-3 {
         border-width:3px !important;
         }
    .slot{
    width:300px;
    }
    .slot-success label{
        padding:0.2em 0.4em; 
        border: solid 3px #12bb7a; 
        color:#12bb7a;
        border-radius:25px;
        font-weight:600;
        cursor: pointer;
    }
    
    .slot-warning label{
        padding:0.2em 0.4em;
        border: solid 3px #fb8500; 
        color:#fb8500;
        border-radius:25px;
        font-weight:600;
        cursor: pointer;
    }
    .slot-blocked label{
        padding:0.2em 0.4em;
        border: solid 3px #84888a; 
        color:#84888a;
        border-radius:25px;
        font-weight:600;
        cursor:no-drop;
    }
    .slot-selected label{
        padding:3px; 
        border: solid 3px #435ebe; 
        color:#fff;
        border-radius:25px;
        font-weight:600;
        background-color: #435ebe;
    }
    .slot-selected .slot-desc{
        
        color:transparent!important;
    }
    .slot-success .slot-desc{
        color:#12bb7a;
        font-size: 14px;
        font-weight:600px;
    }
    .slot-warning .slot-desc{
        color:#fb8500;
        font-size: 14px;
        font-weight:600px;
    }
    .slot-blocked .slot-desc{
        color:#84888a;
        font-size: 14px;
        font-weight:600px;
    }
    .appointments{
        font-family: 'Poppins',sans-serif;
    }
    .app-date{
        height:fit-content;
        aspect-ratio: 1/1;
        width: 60px;
        font-family: 'Poppins',sans-serif;
        padding: 1px;
    }
    .app-month{
        font-size: 0.8em;
        margin-bottom:-5px;
        font-family: 'Poppins',sans-serif;
    }
    .app-day{
        font-size: 1.5em;
        margin:-5px auto;
        font-family: 'Poppins',sans-serif;
    }
    .app-year{
        font-size: 0.8em;
        margin-top:-5px;
        font-family: 'Poppins',sans-serif;
    }
    .app-desc{
        font-size: 1.2em;
        color: #fb8500;
        text-align: left;
        font-weight: 600;
    }
    input[type="date"]::-webkit-calendar-picker-indicator {
    background: transparent;
    bottom: 0;
    color: transparent;
    cursor: pointer;
    height: auto;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
}
</style>

            
    <div class="page-heading">
        <h3>Book Appointment</h3>
    </div>
    <div class="page-content">
    <!-- Basic Tables start -->
    <section class="row">
        
            


        <div class="row">
            <div class="col-xl-7 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex">
                        
                        
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="profile-head d-flex justify-content-start align-items-center col-md-6 col-sm-12">
                                <div class="">
                                    <div class="avatar bg-primary avatar-xl">
                                        <div class="avatar-content" id="prof_name"><?php echo $customer[0]['cust_name'][0] ?></div>
                                    </div>
                                </div>
                                <div class="cust_name ms-3 align-items-center">
                                    <h3 style="" class=""id="cust_name"><?php echo $customer[0]['cust_name'] ?></h3>
                                    
                                </div>
                            </div>
                            <div class=" col-md-6 col-sm-12 d-flex justify-content-end">
                                <div class="badge ms-auto p-2 col-md-12 col-sm-12" style="border: solid 2px #51dda7; max-width:145px;max-height:35px;color:#51dda7;border-radius:25px;font-weight:900;">
                                <i style="font-size:0.8rem;" class="fa fa-user"></i> Active Customer
                                </div>
                            </div>
                        </div>
                        <div class="cust_details row p-4">
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Customer ID :</strong> </span>
                                <span class=" text-secondary detail-desc"id="cust_id"><?php echo $customer[0]['cust_id'] ?></span>
                            </div>
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Mobile :</strong></span>
                                <span class=" text-secondary detail-desc"id="cust_phno"><?php echo $customer[0]['cust_phno'] ?></span>
                            </div>
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Email :</strong></span>
                                <span class="text-secondary detail-desc"id="cust_email"><?php echo $customer[0]['cust_email'] ?></span>
                            </div>
                            
                        </div>
                        <div class="cust_details d-flex justify-content-between p-4">
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Gender :</strong></span>
                                <span class=" text-secondary detail-desc"id="cust_gender"><?php if($customer[0]['cust_gender'] == 'm'){ echo 'Male <i class="text-primary fa fa-mars"></i>';}else{echo 'Female <i style="color:#e83e8c" class="fa fa-venus"></i>';} ?></span>
                            </div>
                            <div class="detail col-8 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Customer Note :</strong></span>
                                <span class=" text-secondary detail-desc"id="cust_gender">He is very good customer take care of him...</span>
                            </div>
                            
                            
                        </div>
                        <div class="cust_details d-flex justify-content-between pt-4">
                            
                            
                            <button type="button" class="btn btn-light-secondary ms-auto me-3" data-bs-toggle="tooltip" data-bs-placement="right"
                                title="Download Customer Transaction Details">
                                <i class="fa fa-download"></i>
                            </button>
                            <button class="btn btn-primary">SEND PROMOTIONAL OFFER</button>
                            
                            
                        </div>
                    </div>
                </div>
            
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="card-title text-dark" style="font-weight: bold;">Services and Slots</div>
                        
                    </div>
                    
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>Admin/NewAppointment" name="serviceform" method="post">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">Branch :</label>
                                    <select class="form-select" id="slot_branch">
                                        <option selected>Choose...</option>
                                        <?php foreach($branch as $b){?>
                                            <option value="<?php echo $b['branch_id']?>" <?php if($user_data->branch_id ==$b['branch_id'] ) {echo "selected";} ?>><?php echo $b['branch_name']?>  :  <?php echo $b['city']?></option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="appointment_date">Appointment Date :</label>
                                    <div class="input-group date" for="appointment_date">
                                        <input type="date" class="form-control" id="appointment_date" value="<?php echo date('Y-m-d') ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="services-div">
                                    <label for="first-name-vertical">Services :</label>
                                    <select class=" form-select multiple-remove" id="services" multiple="multiple">
                                    <?php

                                    foreach($services as $service){
                                        ?>
                                        <option value="<?= $service['service_id'] ?>"><?= $service['service_name'] ?> ( ₹.<?= $service['service_cost'] ?> )</option>
                                        <?php
                                    }

                                    ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row col-12">
                                <label for="first-name-vertical">Time Slots :</label>
                                <div class="row slots m-0 p-0" id="slots">

                                    <?php

                                    foreach($timeslots as $timeslot){
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-sm-4 my-1 d-flex flex-column">
                                            <div class="slot m-auto <?php if(($timeslot['available_slots'])>0){echo "slot-success";}else{echo "slot-blocked";}  ?>">
                                                <input type="radio" class="d-none" name="timeslot" data-slot="<?= $timeslot['slot_time'] ?>" id="slot-<?= $timeslot['slot_id'] ?>" value="<?= $timeslot['slot_id'] ?>"<?php if(($timeslot['available_slots'])==0){echo "disabled";}  ?>>
                                                <label class="text-center" for="slot-<?= $timeslot['slot_id'] ?>"><?= $timeslot['slot_time'] ?></label>
                                            </div>
                                            
                                            <div class="slot-desc text-center"><?php if(($available_slots=$timeslot['available_slots'])>0){echo "$available_slots slots available";}else{echo "all slots booked";}  ?></div>
                                        </div>
                                        <?php
                                    }

                                    ?>
                                </div>
                                
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">Selected Slot :</label>
                                    <div id="selected-slot"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-md-12 col-sm-12">
                <!-- Invoice -->
                <div class="card mb-2 border border-primary border-2">
                    <div class="card-header d-flex">
                        <span class="card-title text-primary" style="font-weight: bold;">Invoice</span>
                        
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <div class="col-4" style="font-weight: bold;"> Invoice Date :</div>
                            <div class="col-8"><?=  date('D , d F Y') ?></div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4" style="font-weight: bold;"> Name :</div>
                            <div class="col-8"><?=  $customer[0]['cust_name'] ?></div>
                        </div>
                        <hr class="bg-primary border border-primary">
                        <div class="row my-2">
                            <div class="col-6" style="font-weight: bold;"> Appointment Date :</div>
                            <div class="col-6 text-decoration-underline" id="invoice-appointment-date"><?=  date('D , d F Y') ?></div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6" style="font-weight: bold;"> Services :</div>
                            <div class="col-6 text-decoration-underline" id="invoice-services">.</div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6" style="font-weight: bold;"> Selected Slot :</div>
                            <div class="col-6 text-decoration-underline" id="invoice-slot">.</div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Checkout -->
                <div class="card mb-2 border border-primary border-2">
                    <div class="card-header d-flex">
                        <span class="card-title text-primary" style="font-weight: bold;">Checkout</span>
                        
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6">Services Total Amount </div>
                            <div class="col-6 text-end "style="font-weight: bold;"> <i id="services-total-amount" >₹ 0 </i> </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">CGST (9%) </div>
                            <div class="col-6 text-end " style="font-weight: bold;"><i id="cgst-amount">₹ 0  </i></div>
                        </div>  
                        <div class="row mb-2">
                            <div class="col-6">SGST (9%) </div>
                            <div class="col-6 text-end " style="font-weight: bold;"><i id="sgst-amount">₹ 0  </i></div>
                        </div>  
                        <div class="row mb-2">
                            <div class="col-6">Miscellaneous Charges (2%) </div>
                            <div class="col-6 text-end " style="font-weight: bold;"><i id="misc-amount">₹ 0  </i></div>
                        </div>  
                        <div class="row mb-2">
                            <div class="col-6">Total Amount</div>
                            <div class="col-6 text-end " style="font-weight: bold;"><i id="total-amount">₹ 0  </i></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-success"  style="font-weight: bold;">Discounts /Offers</div>
                            <div class="col-6 text-end text-dark" style="font-weight: bold;"><i id="disc">- ₹ 0  </i></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"  style="font-weight: bold;">Grand Total</div>
                            <div class="col-6 text-end" style="font-weight: bold;"><i id="grand-amount"><del> ₹ 0  </del> ₹ 0  </i></div>
                        </div>
                    </div>
                </div>
                <!-- COnfirm -->
                <div class="card mb-2 border border-primary border-2">
                    <div class="card-header d-flex">
                        <span class="card-title text-primary" style="font-weight: bold;"></span>
                        
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="payment-mode">Payment Mode :</label>
                            </div>
                            <div class="col-6 text-end " style="font-weight: bold;">
                                <select name="payment_mode" form="serviceform" class="form-select" id="payment-mode">
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="upi">UPI</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="payment-mode">Remarks :</label>
                            </div>
                            <div class="col-6 text-end " style="font-weight: bold;">
                                <textarea type="textarea" name="remarks" form="serviceform" placeholder="..." id="remarks" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="payment-mode">Payable Amount :</label>
                            </div>
                            <div class="col-6 text-center" style="font-weight: bold;"><i id="pay-amount">  </i></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 text-end mt-2">
                                <button class="btn btn-primary" id="confirm-booking" type="button">Confirm Booking</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
                  
                
            </div>
        </div>

    </section>
        <!-- Basic Tables end -->
    </div> 
    <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
<!-- Include Choices JavaScript -->
<script src="<?php echo base_url() ?>app_assets/vendors/choices.js/choices.min.js"></script>
<script src="<?php echo base_url() ?>app_assets/js/pages/form-element-select.js"></script>
<script>
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];                 
    
    $(document).ready(()=>{
        selectslot()
        let services = <?php echo json_encode($services) ?>;
        const choices2 = new Choices(document.getElementById('services'),
        {
            delimiter: ',',
            editItems: true,
            maxItemCount: -1,
            removeItemButton: true,
        }); 
    
                    
    
        $('#slot_branch').on('change',function(){
            
            getTimeSlots()
            $('#invoice-slot').text(' '); 
            $('#invoice-services').text(' '); 
            $('#selected-slot').text(' '); 
            
        });
        $('#appointment_date').on('change',function(){
            
            getTimeSlots()
            const date = new Date($('#appointment_date').val());
            $('#invoice-appointment-date').text(days[date.getDay()] + ' , ' + date.getDate()  + ' ' + months[date.getMonth()] + ' ' + date.getFullYear()); 
            $('#invoice-slot').text(' '); 
            $('#invoice-services').text(' '); 
            $('#selected-slot').text(' '); 
        });
        function getTimeSlots(){
            const branch = $('#slot_branch').val()
             const date = $('#appointment_date').val()
            $('#slots').html('')
            $.ajax({
                url: '<?= base_url() ?>Admin/SlotsAndServices',
                method: 'POST',
                data:{branch_id : branch,date:date},
                success: (data)=>{
                    data['timeslots'].forEach((item)=>{
                        $('#slots').append($('<div class="col-lg-4 col-md-6 col-sm-6 my-1 '+((item.available_slots > 0)?'slot-success':'slot-blocked')+' d-flex flex-column"><input type="radio" class="d-none" name="timeslot" data-slot="'+item.slot_time+'" id="slot-'+item.slot_id+'" value="'+item.slot_id+'"'+((item.available_slots == 0)?'disabled':'')+'><label class="text-center" for="slot-'+item.slot_id+'">'+item.slot_time+'</label><div class="slot-desc text-center">'+((item.available_slots > 0)?item.available_slots+' slots available':'all slots booked')+' </div></div>'))
                    });
                    choices2.removeActiveItems();
                    choices2.clearChoices();
                    var options = []
                    services = []
                    data['services'].forEach((item)=>{
                        options.push({
                            id: item.service_id,
                            label: item.service_name+' ( ₹.'+item.service_cost+' )',
                            value: item.service_id,
                            service_name:item.service_name,
                            cost:item.service_cost
                        });
                        services.push({
                            service_id:item.service_id,
                            service_name:item.service_name,
                            branch_id:item.branch_id,
                            service_cost:item.service_cost
                        })
                        
                    });
                    choices2.setChoices(options);
                    selectslot()
                }
            })
        }
        function selectslot(){
            $('input[name=timeslot]').on('change', function() {
                $('#selected-slot').text($('input[name=timeslot]:checked').data('slot')); 
                $('#invoice-slot').text($('input[name=timeslot]:checked').data('slot')); 
                $('.slot-selected').removeClass('slot-selected')
                $(this).parent().addClass('slot-selected');
                
                
            } );
        }
        $('#services').on('change', function() {
             let service_label = ""
             let service_cost = 0
            
            $('#services').val().forEach((ele)=>{
                services.forEach((item)=>{
                    if(ele == item.service_id){
                        
                        service_label+=item.service_name+' , '
                    }
                    if(ele == item.service_id){
                        
                        service_cost+=parseInt(item.service_cost)
                    }
                })
            })
            let cgst = service_cost*0.09
            let sgst = service_cost*0.09
            let misc = service_cost*0.02
            let total = service_cost+cgst+sgst+misc
            let disc =0
            let grand = total-0
            let pay = total-0



            $('#invoice-services').html(service_label.slice(0,-2))
            $('#services-total-amount').html('₹ '+service_cost)
            $('#cgst-amount').html('₹ '+cgst)
            $('#sgst-amount').html('₹ '+sgst)
            $('#misc-amount').html('₹ '+misc)
            $('#total-amount').html('₹ '+total)
            $('#disc').html('₹ '+disc)
            $('#grand-amount').html('₹ '+grand)
            $('#pay-amount').html("₹ "+pay)
             
            
            selectslot()
        } );
        $('#confirm-booking').on('click',function(){
            const slot = $('input[name=timeslot]:checked').val()
            const services = $('#services').val()
            const date = $('#appointment_date').val()
            const branch = $('#slot_branch').val()
            const payment_mode = $('#payment-mode').val()
            const postData = {
                slot:slot,
                services:services,
                date:date,
                branch:branch,
                customer_id:<?= $customer[0]['cust_id'] ?>,
                payment_mode:payment_mode,
                remarks: $('#remarks').val()


            }
            if(slot == undefined){
                alert('Please select a slot')
                return false
            }
            if(services == undefined){
                alert('Please select atleast one service')
                return false
            }
            
            $.ajax({
                url: '<?= base_url() ?>Admin/NewAppointment',
                method: 'POST',
                data:postData,
                success: (data)=>{
                    if(data.status == 'appointment_booked'){
                        // Toastify({
                        //     text: "Appointment Booked Successfully",
                        //     duration: 10000,
                        //     destination: "",
                        //     newWindow: true,
                        //     close: true,
                        //     gravity: "top", // `top` or `bottom`
                        //     position: "center", // `left`, `center` or `right`
                        //     stopOnFocus: true,
                        //     backgroundColor: "#55a630",
                        //     onClick: function(){} // Callback after click
                        // }).showToast();
                        window.location.href = '<?= base_url() ?>Admin/Appointments'
                    }else if(data.status == 'slot_unavailable'){
                        Toastify({
                            text: "Slot that you selected is not available",
                            duration: 10000,
                            destination: "",
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "center", // `left`, `center` or `right`
                            stopOnFocus: true,
                            backgroundColor: "#fb5607",
                            onClick: function(){} // Callback after click
                        }).showToast();
                    }else{
                        Toastify({
                            text: "Something is wrong please try again",
                            duration: 10000,
                            destination: "",
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "center", // `left`, `center` or `right`
                            stopOnFocus: true,
                            backgroundColor: "#fb5607",
                            onClick: function(){} // Callback after click
                        }).showToast();
                    }
                }
            })

        } )

        function updateCheckout(){

        }
        
        
    })
        

 

</script>

/* Account Login Credentials
    Username : John@abcsaloon.com
    Password : 12345
*/


 