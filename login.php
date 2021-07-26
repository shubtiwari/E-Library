<?php         
    include 'conn.php'; 
if (isset($_POST['login']))
{   
    $email =$_POST["email"];
    $password =$_POST["psw"];
    $query=" SELECT * FROM `user` WHERE email='$email' AND password='$password'";
    $result= mysqli_query($con,$query);
    $row= mysqli_fetch_array($result) ;
    $db_password = $row['password'];  
    $status = $row['status'];
    session_start();
    $_SESSION['u_id'] =$row['user_id'];
    $_SESSION['role'] =$row['role'];

   if($db_password == $password)
   { 
         if($row["role"] =="admin" )
              {
              
                 header('location:add_book.php');
             }
               elseif( $row["role"] =="user" and $status =="verified" )
                    {         
                    header('location:user_dashboard.php');   
                     }    
               else 
                     {
                    echo '<script> alert("It seems like you are not verified yet. So please click on forgot password to verify yourself..") </script>';
                    }
   }
      else{
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
            <br>
            <h1>Login</h1>  
            <form action="#" method="post">
                <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control"  placeholder="Enter Email" required>
                <label for="password">Password</label>
                <input type="password" name="psw" class="form-control" placeholder="Enter password" required>
                <br>
                <input type="checkbox" checked="checked" name="remember"> Remember me 
                <br>
                <p class="badge badge-pill badge-primary "> <a href="forget.php"> Forgot password?</a>></p>
                <br>
                <input type="submit" class="btn btn-outline-success offset-5" name="login" value="login">      
                <a href="Signup.php" class="btn btn-outline-success offset-0" role="button">Signup</a>
                </div>
            </form>
        </div>
    </body>
</html>


     