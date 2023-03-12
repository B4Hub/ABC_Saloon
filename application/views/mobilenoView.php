
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abc Saloon</title>
    <meta content="" name="description">
  <meta content="" name="keywords">
    <link href="<?php echo base_url()?>web_assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url()?>web_assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url()?>app_assets/vendors/toastify/toastify.css">
  <script src="<?php echo base_url()?>app_assets/vendors/toastify/toastify.js"></script>

	<!-- Bootstrap 5 CDN Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS Link -->
	<link rel="stylesheet" href="style.css">
    <link href="<?php echo base_url()?>web_assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url()?>web_assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <style>
    /* Google Poppins Font CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}

/* Variables */
:root{
    --primary-font-family: 'Poppins', sans-serif;
    --light-white:#D9DBE0;
    --gray:#5e6278;
    --gray-1:#e3e3e3;
}
body{
    font-family:var(--primary-font-family);
    font-size: 14px;
    background-image: url('<?php echo base_url() ?>web_assets/img/saloonBG.jpg');
  background-repeat: no-repeat;
    
} 

/* Main CSS OTP Verification New Changing */ 
.wrapper{
    padding:0 0 100px;
    background-image:url("images/bg.png");
    background-position:bottom center;
    background-repeat: no-repeat;
    background-size: contain;
    background-attachment: fixed;
    min-height: 100%;
    /* height:100vh;
    display:flex;
    align-items:center;
    justify-content:center; */
}
.wrapper .logo img{
    width:50%;
   
}
.wrapper input{
    background-color:var(--light-white);
    border-color:var(--light-white);
    color:var(--gray);
}
.wrapper input:focus{
    box-shadow: none;
}
.wrapper .password-info{
    font-size:10px;
}
.wrapper .submit_btn{
    padding:10px 15px;
    font-weight:500;
}
.wrapper .login_with{
    padding:8px 15px;
    font-size:13px;
    font-weight: 500;
    transition:0.3s ease-in-out;
}
.wrapper .submit_btn:focus,
.wrapper .login_with:focus{
    box-shadow: none;
}
.wrapper .login_with:hover{
    background-color:var(--gray-1);
    border-color:var(--gray-1);
}
.wrapper .login_with img{
    max-width:7%;
} 

/* OTP Verification CSS */
.wrapper .otp_input input{
    width:14%;
    height:70px;
    text-align: center;
    font-size: 20px;
    font-weight: 600;
}

@media (max-width:1200px){
    .wrapper .otp_input input{ 
        height:50px; 
    }
}
@media (max-width:767px){
    .wrapper .otp_input input{ 
        height:40px; 
    }
}   
    
.image{
    width: 100%;
  height: 400px;
  background-size: cover;
  border: 1px solid;

}

  </style>
</head>
<body>
    <section class="wrapper" >

		<div class="">
       <a href="<?php echo base_url()?>Main"> <i class='far fa-arrow-alt-circle-left' style='font-size:48px;color:yellow'></i> </a>
        <!-- <input style="background-color:green" value="home" class="btn btn-success btn-lg">	 -->
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
                <div class="logo"  style="margin-top:150px">
					<img src="<?php echo base_url() ?>web_assets\img\logo.png" class="img-fluid" alt="logo">
				</div>
				<form class="rounded bg-white shadow p-5" action="<?php echo base_url() ?>CustCtrl/getCust" method="post" >
					<h3  style="color:#89316c">Customer Login</h3>

					<div class="fw-normal text-muted mb-4">
						<h5 >Enter Your Email</h5>
					</div>  

					<div class="otp_input text-start mb-2 ">
						<div class="d-flex align-items-center justify-content-center mt-2">
                            <input type="tel" minLength="10" maxLength="10" class="form-control w-100" placeholder="" style="max-width:300px" name="cust_phno" id="phno" required >
                           
                        </div> 
					</div>  
                   <div class="fw-normal text-muted mb-4">
						<h5 >Enter Your Password</h5>
					</div>  

					<div class="otp_input text-start mb-2 ">
						<div class="d-flex align-items-center justify-content-center mt-2">
                            <input type="tel" minLength="10" maxLength="10" class="form-control w-100" placeholder="" style="max-width:300px" name="cust_phno" id="phno" required >
                           
                        </div> 
					</div> 

					<button type="submit" class="btn btn-primary submit_btn my-4">Next</button> 
				</form>
			</div>
		</div>
	</section>
        
    <?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($status == "invalid_mobile")
{
    ?>
        <script>
				Toastify({
				  text: "This Mobile Number is not Registered!",
                
				  duration: 4000,
				  destination: "",
				  newWindow: true,
				  close: true,
				  gravity: "top", // `top` or `bottom`
				  position: "center", // `left`, `center` or `right`
				  stopOnFocus: true,
				  backgroundColor: "red",
				  onClick: function(){} // Callback after click
				}).showToast();
		</script>

    <?php
}

    ?>
</body>
</html>

