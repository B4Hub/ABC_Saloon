<?php

if($status == 'success'){
    ?>
<script>
Toastify({
  text: "Login Succesful..",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#55a630",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}elseif($status == 'payment_success'){

    ?>
<script>
Toastify({
  text: "Payment Succesful.. and Appointment Booked",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#55a630",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}elseif($status == 'payment_failed'){

    ?>
<script>
Toastify({
  text: "Payment Failed.. and Appointment Not Booked",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#ff0000",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}elseif($status == 'failed'){

    ?>
<script>
Toastify({
  text: "Login Failed..",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#ff0000",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}


?>
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
        <h3>Personal Information</h3>
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
                                        <div class="avatar-content" id="prof_name"><?php echo strtoupper($user_data->cust_name[0]) ?></div>
                                    </div>
                                </div>
                                <div class="cust_name ms-3 align-items-center">
                                    <h3 style="" class=""id="cust_name"><?php echo $user_data->cust_name ?></h3>
                                    
                                </div>
                            </div>
                            <div class=" col-md-6 col-sm-12 d-flex justify-content-end">
                                <div class="badge ms-auto p-2 col-md-12 col-sm-12" style="border: solid 2px #51dda7; max-width:160px;max-height:35px;color:#51dda7;border-radius:25px;font-weight:900;">
                                <i style="font-size:0.8rem;" class="fa fa-user"></i> Active Customer
                                </div>
                            </div>
                        </div>
                        <div class="cust_details row p-4">
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Customer ID :</strong> </span>
                                <span class=" text-secondary detail-desc"id="cust_id"><?php echo $user_data->cust_id ?></span>
                            </div>
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Mobile :</strong></span>
                                <span class=" text-secondary detail-desc"id="cust_phno"><?php echo $user_data->cust_phno ?></span>
                            </div>
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Email :</strong></span>
                                <span class="text-secondary detail-desc"id="cust_email"><?php echo $user_data->cust_email ?></span>
                            </div>
                            
                        </div>
                        <div class="cust_details d-flex justify-content-between p-4">
                            <div class="detail col-4 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Gender :</strong></span>
                                <span class=" text-secondary detail-desc"id="cust_gender"><?php if($user_data->cust_gender == 'm'){ echo 'Male <i class="text-primary fa fa-mars"></i>';}else{echo 'Female <i style="color:#e83e8c" class="fa fa-venus"></i>';} ?></span>
                            </div>
                            <div class="detail col-8 d-flex flex-column">
                                <span class="text-dark detail-text mb-1"><strong>Customer Note :</strong></span>
                                <span class=" text-secondary detail-desc"id="cust_gender">He is very good customer take care of him...</span>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                </div>

                
            </div>

            <div class="col-xl-3">
            <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            

                        </div>
                    </div>
                </div>
            </div>
            

        </div>

    </section>
        <!-- Basic Tables end -->
    </div> 
    

/* Account Login Credentials
    Username : John@abcsaloon.com
    Password : 12345
*/


 