<?php
  include 'conn.php';
  if(isset($_POST['done']))
  {
      $username = $_POST['username'];
      $Email = $_POST['email'];
      $Mobile = $_POST['mobile'];
      $password = $_POST['psw'];
      $role = 'user';
      $q = " INSERT INTO `user`(`name`, `email`, `mobile`, `password`, `role`) VALUES ('$username','$Email','$Mobile','$password','$role')";
      $result = mysqli_query($con, $q);
      header("location:index.php");        
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
        <h1>Signup</h1>
          <form action="#"method = "post">
                    <label for="Name"> Name: </label>
                    <input type="Name" class="form-control" name="username"placeholder="Enter Your Name " required>
                      <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"required>
                      <label for="Mobile">Mobile:</label>
                    <input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile Number"required>
                  <label for="password">Password:</label>
                <input type="password" class="form-control" name="psw" placeholder="Enter password"required>
              <br>
                <div class="clearfix">
                    <button type="reset" class="btn btn-outline-success offset-5">Cancel</button>            
                      <button type="submit" name ="done" class="btn btn-outline-success "> Signup </button>
                 </div>
           </form>
     </div>
</body>
</html>