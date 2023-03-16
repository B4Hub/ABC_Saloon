<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51MkUBlSCMoPdPSCi4v1KJVlRbbcVv3l2rqiozqEBvC1AjzzzQe5RwjLYmwGDoLuT964wWab3T1Ac1AVy9gntseyz00gD5YA5nC'; 
$config['stripe_publishable_key'] = 'pk_test_51MkUBlSCMoPdPSCi44yHi0hBjIM2BDyL1f42mEDCJTJh18W6r99WyplOrtLynSoGDKWmc7pAYj9K0QUNmBrrJgxQ00QIaLqxjx'; 
$config['stripe_currency']        = 'inr';