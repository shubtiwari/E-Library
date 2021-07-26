<?php
  include 'conn.php';
  session_start();
  $errors = array();
  if(isset($_POST['done']))
  {
     
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
      $password = mysqli_real_escape_string($con, $_POST['psw']);
      $cpassword = mysqli_real_escape_string($con, $_POST['cpsw']);
      $role = "user";
      if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
      $q = " SELECT * FROM user WHERE email = '$email'";
      $result = mysqli_query($con, $q);
      if(mysqli_num_rows($result) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
      $otp = rand(999999, 111111);
      $_SESSION['otp'] =$otp;
      $_SESSION['email'] = $email;
      $status = "notverified"; 
      $insert_data =  "INSERT INTO `user`(`name`, `email`, `mobile`, `password`, `role`, `otp`, `status`) VALUES ('$username','$email','$mobile','$password','$role','$otp','$status')";
      $data_check = mysqli_query($con, $insert_data);
     
      if($data_check){
          require  "C:\wamp64\www\E-Library\PHPMailer\PHPMailerAutoload.php "; 
          $_SESSION['otp'];
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
        $mail->Body    = "Your verification code for E-Library is '{$_SESSION['otp']}'";
        $mail->AltBody = '';
        if($mail->send()){  
           
              // echo $_SESSION['email'];
           header('location:otp_verification.php');
        }
        else {
          
          echo"error"; 
            echo $_SESSION['email'];
        }
              
         
}
            exit();
        }else{
            echo $_SESSION['otp'];
            echo '<script> alert("You are already a member of E-Library ") </script>';
            
           
        }
    }else{
        $errors['db-error'] = "Failed while inserting data into database!";
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Signup</title>
</head>
<style>
  <?php include 'style.css';?>
</style>
<body>
 <?php include 'navbar.php';?> 
    <div class= "container">
      <br>
        <h1>Signup</h1>
        <p class="para"> It's quick and easy</p>
          <form action="signup.php" method = "post">
                    <label for="Name"> Name: </label>
                    <input type="Name" class="form-control" name="username"placeholder="Enter Your Name " required>
                      <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"required>
                      <label for="Mobile">Mobile:</label>
                    <input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile Number"required>
                  <label for="password">Password:</label>
                <input type="password" class="form-control" name="psw" placeholder="Enter password"required>
                <label for="password">Confirm Password:</label>
                <input type="password" class="form-control" name="cpsw" placeholder="Enter password"required>
              <br>
                <div class="clearfix">
                    <button type="reset" class="btn btn-outline-success offset-5">Cancel</button>   
                    <button type="submit" name="done" role="button" class="btn btn-outline-success ">Signup</button>            
                  
                 </div>
           </form>
     </div>
</body>
</html>

