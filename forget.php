<?php
  include 'conn.php';
  session_start();

  if(isset($_POST['send']))
  {  
      $reset_email = mysqli_real_escape_string($con, $_POST['reset_email']);
      $q = " SELECT * FROM user WHERE email = '$reset_email'";
      $result = mysqli_query($con, $q);
      $row= mysqli_fetch_array($result);
      var_dump( $_SESSION['reset_email']) ;    
      if ($row == 0) 
          { 
            echo '<script> alert("It seems like you are not a user of E-Library. Please signup!") </script>';
          }
      else
          {
      $row= mysqli_fetch_array($result);   
        $otp = rand(999999, 111111);
        $_SESSION['reset_email'] = $reset_email;
          
        $data =  "UPDATE `user` SET `otp`= '$otp' where `email` = '$reset_email'";
        $forget_check = mysqli_query($con, $data);    
       // echo $otp;
        if($forget_check)
        {
              // echo $_SESSION['email'];      
                require  "C:\wamp64\www\E-Library\PHPMailer\PHPMailerAutoload.php ";            
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
            $mail->addAddress($_SESSION['reset_email']);                 
            $mail->addReplyTo('shubham.tiwari00077@gmail.com' );

            //Content
            $mail->isHTML(true);                               
            $mail->Subject = 'Email Verification Code';
            $mail->Body    = "Your verification code for E-Library is $otp";
            $mail->AltBody = '';
            if($mail->send())
            {    
                 
            
             header('location:reset.php');
            }
            else 
            {  
              echo"error"; 
            
            }     
  }
}
  
}      
;?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
          <?php include 'style.css';?>
        </style>
</head>
<body>
  <?php include 'navbar.php';?>
   <br>
     <div class="container" >
       <h1>Forgot Password</h1>
       <form action=forget.php method = "POST">
       <label for="email">Email:</label>
        <input type="email" class="form-control" name="reset_email" placeholder="Enter Email"required> 
        <br>
        <button type="submit" name="send" role="button" class="btn btn-outline-success offset-6 ">Send</button>            
       </form>
     </div>
</body>
</html>