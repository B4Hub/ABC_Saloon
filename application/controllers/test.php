<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    // email test
    public function email(){
        $this->load->library('phpmailer_lib') or die("error");
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'escrteam@gmail.com';
        $mail->Password = 'xodwtivaobdovhcb';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('escrteam@gmail.com', 'Team Innovative');

        // Add a recipient
        $mail->addAddress('limspaolgb@karenkey.com');

        // Add cc or bcc


        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

        // Set email format to HTML

        $mail->isHTML(true);

        // Email body content

        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email has sent using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;

        // Send email

        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }





}

}


?>