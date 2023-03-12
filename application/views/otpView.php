

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive OTP Verification Form Using Bootstrap 5</title>
	<!-- Bootstrap 5 CDN Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS Link -->
	<link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>app_assets/vendors/toastify/toastify.css">
  <script src="<?php echo base_url()?>app_assets/vendors/toastify/toastify.js"></script>
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
    --light-white:#f5f8fa;
    --gray:#5e6278;
    --gray-1:#e3e3e3;
}
body{
    font-family:var(--primary-font-family);
    font-size: 14px;
    min-height:100vh;
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
    max-width:100%;
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

 <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body> 
<?php
if($status == 3)
{
    ?>
        <script>
				Toastify({
				  text: "Wrong Password ! Please try again",
                
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
    <section class="wrapper">
		<div class="image"  style="background-image:url('<?php echo base_url() ?>web_assets/img/saloonBG2.jpg')">
		<a href="<?php echo base_url()?>Main/mobilenoView"> <i class='far fa-arrow-alt-circle-left' style='font-size:48px;color:yellow'></i> </a>
     
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
            <div class="logo"  style="margin-top:150px">
					<img src="<?php echo base_url() ?>web_assets\img\logo.png" class="img-fluid" alt="logo">
				</div>
				<form class="rounded bg-white shadow p-5" action="<?php echo base_url() ?>CustCtrl/custLogin" method="post">
                
					<h3 class="text-dark fw-bolder fs-4 mb-2">Enter Password of your registered number</h3>

					<div class="fw-normal text-muted mb-4">
						
					</div>  

                    <div class="d-flex align-items-center justify-content-center fw-bold mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <span>
                            <?php 
                            $phno=substr($mobile,6,11);
                            echo $phno;
                            ?>
                        </span>
                    </div>

 <!--<input type="tel" minLength="6" maxLength="6" class="form-control w-100" placeholder="Enter OTP"> -->
        
                    <!-- <div class="otp_input text-start mb-2">
                        <label for="digit">Type your 6 digit security code</label>
						<div class="d-flex align-items-center justify-content-between mt-2">
                            <input type="tel" minLength=1 maxLength=1 class="form-control otp-input" placeholder="">
                            <input type="tel" minLength=1 maxLength=1 class="form-control otp-input" placeholder="">
                            <input type="tel" minLength=1 maxLength=1 class="form-control otp-input" placeholder="">
                            <input type="tel" minLength=1 maxLength=1 class="form-control otp-input" placeholder="">
                            <input type="tel" minLength=1 maxLength=1 class="form-control otp-input" placeholder="">
                            <input type="tel" minLength=1 maxLength=1 class="form-control otp-input" placeholder="">
                            
                        </div> 
					</div>   -->
                    <!-- <div class="fw-normal text-muted mb-4">
						<h5 >Enter Password</h5>
					</div>   -->
                    <div class="otp_input text-start mb-2 ">
						<div class="d-flex align-items-center justify-content-center mt-2">
                            <input type="hidden" name="cust_phno" value="<?= $mobile ?>">
                            <input type="password" class="form-control w-100" placeholder="Enter Password" style="max-width:300px" name="pwd"  value="" required >
                           
                        </div> 
					</div>  

					<button type="submit" class="btn btn-primary submit_btn my-4">Submit</button> 

                    <!-- <div class="fw-normal text-muted mb-2">
						Didn’t get the OTP? <a href="<?php echo base_url()?>Main/mobilenoView" class="text-primary fw-bold text-decoration-none">Resend</a>
					</div> -->
				</form>
			</div>
		</div>
	</section>
</body>
</html>

<script>
    $(document).ready(function(){
        $('.otp-input').first().focus()
        $(".otp-input").keyup(function () {
        if (this.value.length == 1) {
            $(this).next('.otp-input').focus();
            }
        });
    })
</script>

