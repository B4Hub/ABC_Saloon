<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Stripe extends CI_Controller {
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('stripe_views/checkout');
    }
        
    public function create_checkout_session(){


        require 'vendor/autoload.php';

        $stripe = new \Stripe\StripeClient('sk_test_51MkUBlSCMoPdPSCi4v1KJVlRbbcVv3l2rqiozqEBvC1AjzzzQe5RwjLYmwGDoLuT964wWab3T1Ac1AVy9gntseyz00gD5YA5nC');

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'inr',
            'product_data' => [
                'name' => 'T-shirt',
            ],
            'unit_amount' => 2000,
            ],
            'quantity' => 1,
            
        ]],
        'mode' => 'payment',
        'success_url' => base_url().'Stripe/success?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => base_url().'Stripe/cancel?session_id={CHECKOUT_SESSION_ID}',
        ]);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);

    }

    public function success(){
        require 'vendor/autoload.php';
        $stripe = new \Stripe\StripeClient('sk_test_51MkUBlSCMoPdPSCi4v1KJVlRbbcVv3l2rqiozqEBvC1AjzzzQe5RwjLYmwGDoLuT964wWab3T1Ac1AVy9gntseyz00gD5YA5nC');

        $session_id = $_GET['session_id'];
        $checkout_session = $stripe->checkout->sessions->retrieve($session_id);
        $payment_intent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent);
        $payment_status = $payment_intent->status;
        $customer_details = $payment_intent->charges->data[0]->billing_details;
        if($payment_status == 'succeeded'){
            echo "Payment Success";
            echo "<pre>";
            print_r($payment_intent);
            echo "</pre>";
        }else{
            echo "Payment Failed";
        }

    }
    

}