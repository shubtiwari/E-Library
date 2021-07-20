<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<style>
  <?php include 'style.css';?>
</style>
<body>
    <?php include 'navbar.php';
          include 'sidenav.php';?>
          <br>
           <h1> Dashboard </h1>
            <br>
              <div class="container"> 
                  <div class="row">
                      <div class="col-9 offset-2">
                          <form action="" method="GET">
                              <div class="input-group mb-3">
                                  <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                  <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                              </div>
                          </form>
                          <!-- Card group -->
                            <?php 
                              include 'conn.php';
                               if(isset($_GET['search']))
                                  {
                                    $value = $_GET['search'];        
                                    $query = " SELECT * FROM books WHERE book LIKE '%$value%' OR author LIKE '%$value%' ";   
                                    $query_run = mysqli_query($con, $query);
                                    $row= mysqli_fetch_array($query_run);
                                    $_SESSION['b_id'] = $row['book_id'];
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                            ?>                                  
                                <div class="card-group" >
                                  <div class="card text-white bg-success mb-3">
                                    <img src="" class="card-img-top" >
                                        <div class="card-body">
                                          <h5 class="card-title"><?= $row['book']; ?></h5>
                                             <h6 class="card-title">by -<?= $row['author']; ?></h6>             
                                            <p class="card-text"><?php echo $row['discription'] ?></p>
                                        </div>
                                            <div class="btn-group" role="group" >
                                              <a href="reading.php?book_id=<?= $row['book_id']; ?>" class="btn btn btn-primary offset-0" role="button"><i class="fa fa-book"></i></a> 
                                              <a href="wishlist.php?book_id=<?=$_SESSION['b_id']; ?>" class="btn btn btn-primary offset-0" role="button"><i class="fa fa-heart"></i></a>
                                            </div>
                                   </div> 
                                 </div>
                                    <?php
                              }
                            }
                      }
                      ?>                          
                </div>
           </div>
        </div>
</body>
</html>