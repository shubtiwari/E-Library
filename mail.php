<?php
include 'session.php';
if(isset($_POST['done']))
  {
        include 'conn.php';
        require  "C:\wamp64\www\E-Library\PHPMailer\PHPMailerAutoload.php "; 
         $otp=  $_POST['otp'];
        $_SESSION['email'];  
        $mail = new PHPMailer;                      
        $mail->isSMTP(); 
        $mail ->Host="smtp.gmail.com"; 
        $mail->SMTPAuth   = true;                                          
        $mail->Username   = 'shubham.tiwari00077@gmail.com';                   
        $mail->Password   = 'yummchoco4@@';                                                                                                                             
        $mail->SMTPSecure = 'tls';       
        $mail->Port       = 587;                                   
                //Recipients
        $mail->setFrom('shubham.tiwari00077@gmail.com');
        $mail->addAddress($_SESSION['email']);                 
        $mail->addReplyTo('shubham.tiwari00077@gmail.com' );

        //Content
        $mail->isHTML(true);                               
        $mail->Subject = 'Email Verification Code';
        $mail->Body    = "Your verification code for E-Library is $otp";
        $mail->AltBody = '';
        if($mail->send()){
           
           
           echo $_SESSION['otp'];     // echo $_SESSION['email'];
           header('location:otp_verification.php');
        }
        else {
          
          echo"error"; 
            echo $_SESSION['email'];
        }
}
else{
        echo"error"; 
}
      
?>

