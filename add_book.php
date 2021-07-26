<?php
 include 'conn.php';
 include 'session.php';
  if(isset($_POST['done']))
  {
      $book = $_POST['book'];
      $author = $_POST['author'];
      $disc = $_POST['disc'];
      $url = $_POST['url']; 
      $q = " INSERT INTO `books`(`book`, `author`, `discription`, `img_url`) VALUES ('$book','$author','$disc','$url')";
      $result = mysqli_query($con, $q);
    
  }
?>
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
    <?php include 'sidenav.php';?>
      <h1>Add Book</h1>
        <div class="container">
          <div class="row">    
       
           
            <div class="col-xl-9 offset-xl-1 col-lg-9 offset-lg-2 col-md-10 offset-md-2 col-sm-9 offset-sm-3 ">
             <form action="#" method = "post">
               <div class="form-group">
                    <label for="Book">Enter Book Name:</label>
                    <input type="text" class="form-control"  name ="book" placeholder="Enter Book Name ">
                    <label for="Author">Enter Author Name:</label>
                    <input type="text" class="form-control"  name ="author" placeholder="Enter Author Name ">
                    <label for="Description">Discription:</label>
                    <input type="text" class="form-control"  name ="disc" placeholder="Enter Book Discription ">
                    </div>
                    <br>
                    <button type="submit" name ="done" class="btn btn-outline-success offset-4 "> Add </button>
            </form>
         </div>
        </div>
</body>
</html>