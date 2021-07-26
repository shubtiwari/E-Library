<?php
 include 'conn.php';
 include 'session.php';
?>


<?php
 // include 'conn.php';
  if(isset($_POST['done']))
  {
      $username = $_POST['username'];
      $Email = $_POST['email'];
      $Mobile = $_POST['mobile'];
      $password = $_POST['psw'];
      $role = 'admin';
      $status ='verified';
      $q = " INSERT INTO `user`(`name`, `email`, `mobile`, `password`, `role`,`status`) VALUES ('$username','$Email','$Mobile','$password','$role','$status')";
      $result = mysqli_query($con, $q);     
      echo '<script> alert("Admin Added Successfully") </script>';       
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
   <?php include 'sidenav.php';?>
    <h1>Add Admin</h1>
     <div class="container">
      <div class="row">
         <div class="col-xl-9 offset-xl-1 col-lg-9 offset-lg-2 col-md-10 offset-md-2 col-sm-9 offset-sm-3 "> 
            <form action="#"method = "post">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Name " required>
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email"  placeholder="Enter Email " required>
                <label for="Mobile">Mobile:</label>
                <input type="tel" class="form-control" name="mobile"  placeholder="Enter Mobile Number" required>
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="psw"  placeholder="Enter password" required>
                <br>
                <button type="submit" name ="done" class="btn btn-outline-success offset-4"> Add </button>
            </form>
         </div>
      </div>
     </div>
</body>
</html>