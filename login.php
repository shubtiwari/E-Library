<?php

include 'conn.php';
if (isset($_POST['done']))
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
    
   
     if($row["role"] =="admin" )
             {
                header('location:add_book.php');// echo("{$_SESSION['u_id']}"."<br />");// 
            }
         if($row["role"] =="user" )
            {
                header('location:user_dashboard.php');     // echo("{$_SESSION['u_id']}"."<br />");
            }
        else {
            echo '<script> alert("Invalid Credential") </script>';
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
    <title>Login</title>
</head>
<style>
 <?php include 'style.css';?>
</style>
    <body>
    <?php include 'navbar.php';?>
        <div class="container" >
            <h1>Login</h1>
                <form action="#" method="post">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control"  placeholder="Enter Email" required>
                            <label for="password">Password</label>
                            <input type="password" name="psw" class="form-control" placeholder="Enter password" required>
                            <br>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                            <p class="badge badge-pill badge-primary offset-6"> <a href="reset.php"> Forgot password?</a>></p>
                            <input type="submit" class="btn btn-outline-success offset-5" name="done" value="login">      
                            <a href="Signup.php" class="btn btn-outline-success offset-0" role="button">Signup</a>
                        </div>
                </form>
        </div>
    </body>
</html>