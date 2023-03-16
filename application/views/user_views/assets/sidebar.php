<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

<link href="http://fonts.cdnfonts.com/css/circular-std" rel="stylesheet">

    
    <link rel="stylesheet" href="<?php echo base_url() ?>app_assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>app_assets/vendors/fontawesome/all.min.css">
    
<link rel="stylesheet" href="<?php echo base_url() ?>app_assets/vendors/iconly/bold.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>app_assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>app_assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>app_assets/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>app_assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>app_assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url()?>app_assets/vendors/toastify/toastify.css">
    <script src="<?php echo base_url() ?>app_assets/vendors/apexcharts/apexcharts.js"></script>
        <script src="<?php echo base_url()?>app_assets/vendors/toastify/toastify.js"></script>
        <script src="<?php echo base_url()?>app_assets/js/extensions/toastify.js"></script>
<style>
    *{
        font-family: 'Circular Std', sans-serif;
    }
    .card{
        -webkit-box-shadow: 0px 0px 32px 10px rgba(0,0,0,0.06);
-moz-box-shadow: 0px 0px 32px 10px rgba(0,0,0,0.06);
box-shadow: 0px 0px 32px 10px rgba(0,0,0,0.06);
        
    }

    .menu li a i{
        display: flex;
        align-items: center;
    }
</style>
<script>
    $(document).ready(()=>{
        $('#<?php echo $li_id ?>').addClass('active');
        $('#<?php echo $li_id ?> .submenu').addClass('active');
        $('#<?php echo $li_id ?> .submenu-item:eq(<?php echo $li_eq ?>)').addClass('active');
    });
</script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="<?php echo base_url() ?>app_assets/images/logo/logo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li id="dashboard-li" class="sidebar-item">
                <a href="<?php echo base_url() ?>Customer/Dashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Customer Details</span>
                </a>
            </li>
            
            
            <li id="appointmentslist-li"
                class="sidebar-item ">
                <a href="<?php echo base_url() ?>Customer/BookAppointment" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                    <span>Book Appointment</span>
                </a>
            </li>

           <!--  <li id="payments-li"
                class="sidebar-item ">
                <a href="<?php echo base_url() ?>Customer/Payments" class='sidebar-link'> 
                    <i class="bi bi-megaphone-fill"></i>
                    <span>Payments</span>
                </a>
            </li>

             -->
           
            
           
     <!--       <li class="sidebar-title">Customer Responses</li>
             
            <li id="feedback-li"
                class="sidebar-item">
                <a href="<?php echo base_url() ?>Customer/Feedback" class='sidebar-link'>
                    <i class="bi bi-pentagon-fill"></i>
                    <span>Feedback</span>
                </a>
                
            </li> -->
            
            
            
            
            
            
            
            <li class="sidebar-title">Account Settings</li>
<!--             
            <li id="profile-li"
                class="sidebar-item  ">
                <a href="<?php echo base_url() ?>Customer/Profile" class='sidebar-link'>
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li> -->
            
            <li id="passchange-li"
                class="sidebar-item  ">
                <a href="<?php echo base_url() ?>Customer/ChangePass" class='sidebar-link'>
                    <i class="bi bi-shield-lock"></i>
                    <span>Change Password</span>
                </a>
            </li>
            
            
            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url() ?>Customer/Logout" class='sidebar-link text-danger'>
                    <i class="bi bi-box-arrow-left text-danger"></i>
                    <span>Logout</span>
                </a>
            </li>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>