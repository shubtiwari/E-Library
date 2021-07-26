<?php  include 'conn.php';
     session_start();
if(isset($_POST['check'])){
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM user WHERE otp = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['otp'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE user SET otp = $code, status = '$status' WHERE otp = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if($update_res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
           header('location:login.php');
           echo '<script> alert("OTP Verified") </script>';
         
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating code!";
        }
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
    
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
        <h1>Verification</h1>
          <form  action="otp_verification.php" method="POST" >
                    <div class ="form-group">
                    <input  class="form-control" name="otp" placeholder="Enter verification code " required>
                    </div> <br>
                    <div class="form-group">
                        <input class="btn btn-outline-success offset-5" type="submit" name="check" value="Submit">
                    </div>
           </form>
   
</body>
</html>

