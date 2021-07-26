<?php
  include 'conn.php';
  session_start();  
  if(isset($_POST['reset']))
  {  
      $new_psw = mysqli_real_escape_string($con, $_POST['new_psw']);
      $gen_otp = mysqli_real_escape_string($con, $_POST['gen_otp']);
      $reset_email = $_SESSION['reset_email'];
      $q = " SELECT * FROM user WHERE email = '$reset_email'";
      $result = mysqli_query($con, $q);
      $row= mysqli_fetch_array($result);
      //$dbotp= $row['otp'];
        if ($row['otp']==$gen_otp AND $row['email'] ==$reset_email ) {
          $reset_query =  "UPDATE `user` SET `otp` = '0', `password`='$new_psw', `status`='verified' WHERE `email` ='$reset_email'";   
          $reset_check = mysqli_query($con, $reset_query);    
          echo '<script> alert("Password Update") </script>';
          header('location:login.php');
        }
        else{
        
          
          echo '<script> alert("Invalid OTP") </script>';

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
         <form action=reset.php method = "POST">
           <div class="form-group">
           <label for="text">Enter Generated OTP</label>
               <input type="text" class="form-control" name="gen_otp" placeholder="Enter Generated OTP ">
               <br>
              <label for="text">New Password</label>
               <input type="text" class="form-control"  name="new_psw" placeholder="New Password ">
               <br>
              
              <button type="submit" name="reset" role="button" class="btn btn-outline-success offset-2 ">Reset</button>            
          </div>
       </form>
     </div>
</body>
</html>