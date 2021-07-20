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
       <h1>Forget Password</h1>
         <form>
           <div class="form-group">
              <label for="email">Email address</label>
               <input type="email" class="form-control" id="forget_email" placeholder="Enter Email ">
               <br>
              <a href="#" class="btn btn-outline-success me-2" id ="forgetbtn" role="button"> Send </a>
          </div>
       </form>
     </div>
</body>
</html>