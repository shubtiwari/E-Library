<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
  <style>
    <?php include 'style.css';?>
  </style>
   <body>
    <?php include 'navbar.php';?>
    <br>
     <div class="container-fluid">
        <img class="img-fluid"  src="image/library.jpg" width="2500px" >
           <div class="centered">
             <form class="form-inline"  method="GET">
               <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>    
          </div>
     </div>
    
     <br> 
    
    <?php 
      include 'conn.php';
      if(isset($_GET['search']))
      {
          $value = $_GET['search'];
          $query = " SELECT * FROM books WHERE book LIKE '%$value%' OR author LIKE '%$value%' ";   
          $query_run = mysqli_query($con, $query);
          if(mysqli_num_rows($query_run) > 0)
               {
                 foreach($query_run as $items)
                 {
     ?>
                    <div class="container">
                      <div class="card-group" >
                          <div class="card text-white bg-success mb-3">
                            <img src="" class="card-img-top">
                              <div class="card-body">
                                <h5 class="card-title"><?= $items['book']; ?></h5>
                                <h6 class="card-title">by -<?= $items['author']; ?></h6>
                                <p class="card-text"><?= $items['discription']; ?></p>
                              </div>
                          </div>
                      </div>
                    <?php
                 }
             }
          else 
           {
            echo '<script> alert("Sorry No Book Found!") </script>';
           }    
      }
                    ?>            
<?php include 'footer.php';?>
</body>
</html>
  
  
