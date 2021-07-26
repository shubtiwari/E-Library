<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "e-library";
// Create connection
$con = mysqli_connect($servername, $username, $password, $db);
if(!$con)
   {
      die("sorry" . mysqli_connect_error());
   }

$email = "";
$name = "";
$errors = array();

// For signup button
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
      $_SESSION['email'] = $email;
      $status = "notverified"; 
      $insert_data =  "INSERT INTO `user`(`name`, `email`, `mobile`, `password`, `role`, `otp`, `status`) VALUES ('$username','$email','$mobile','$password','$role','$otp','$status')";
      $data_check = mysqli_query($con, $insert_data);
      if($data_check){           
              //echo $email;
          header('Location:mail.php');
}
            exit();
        }else{
            $errors['otp-error'] = "Failed while sending code!";
        }
    }


    // Login button
    include 'conn.php';
if (isset($_POST['login']))
{
    $email =$_POST["email"];
    $password =$_POST["psw"];
    $query=" SELECT * FROM `user` WHERE email='$email' AND password='$password'";
    $result= mysqli_query($con,$query);
    $row= mysqli_fetch_array($result);
    $dbpassword = $row['password'];
    $_SESSION['email'] = $email;
    $_SESSION['u_id'] = $row['user_id'];
    $_SESSION['role'] = $row['role'];
        if($row["status"]== "verified")
    {
      if($row["role"] =="admin"  )
             {
                header('location:add_book.php');// echo("{$_SESSION['u_id']}"."<br />");// 
            }
         elseif($row["role"] =="user")
            {
                header('location:user_dashboard.php');     // echo("{$_SESSION['u_id']}"."<br />");
            }          
}
else {
   
    echo '<script> alert("Invalid Credential") </script>';
}
}

?>