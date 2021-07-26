<?php 
include 'conn.php';
include 'session.php';

 // for reading//                        
 if(isset($_GET['reading_book_id']))
 {
   $read_b_id = $_GET['reading_book_id'];
   $status = "reading";
   $sql_Check = "SELECT * FROM records where user_id = '{$_SESSION['u_id']}' AND book_id = $read_b_id";
   $result_check = mysqli_query($con, $sql_Check);

   if (mysqli_num_rows($result_check) == 1) 
    { 
      echo '<script> alert("product already exist in your list") </script>';
    }
       else 
       {
           // Data insert into records table
           $current_date = date("Y-m-d ");
           $insertWishlist = "INSERT INTO records (user_id, book_id, status, issue) VALUES ('{$_SESSION['u_id']}', '$read_b_id','$status','$current_date')";   
           mysqli_query($con, $insertWishlist); 
           //header('location:reading.php');  
        }
 }
              // For wishlist //
  if(isset($_GET['wish_book_id']))
  {
     $b_id = $_GET['wish_book_id'];
     $_SESSION['b_id'] = $_GET['wish_book_id'];
     $status = "wishlist";       
     $insertWishlist = "INSERT INTO records (user_id, book_id, status) VALUES ('{$_SESSION['u_id']}', '$b_id','$status')";   
     $result= mysqli_query($con, $insertWishlist);
                          
  }
  ?>

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
                     <div class="col-xl-10 offset-xl-1 col-lg-9 offset-lg-2 col-md-10 offset-md-2 col-sm-9 offset-sm-3">
                         <form action="" method="GET">
                             <div class="input-group mb-5">
                                  <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                  <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                              </div>
                          </form>
        <!-- Card group -->
          <?php          
         if(isset($_GET['search']))
            {
                  $value = $_GET['search'];        
                  $query = " SELECT * FROM books WHERE book LIKE '%$value%' OR author LIKE '%$value%' ";   
                  $query_run = mysqli_query($con, $query);
                  $row= mysqli_fetch_array($query_run);      
                  if(mysqli_num_rows($query_run) > 0)
                  {                       
                      foreach($query_run as $row)
                      { 
                        ?>                                          
                          <div class="card-group" >
                            <div class="card text-white bg-success mb-3">
                              <h5 class="card-title"><?= $row['book']; ?></h5>
                              <br>
                              <h6 class="card-title">by -<?= $row['author']; ?></h6>             
                                  <p class="card-text"><?php echo $row['discription'] ?></p>
                                  <p class="card-text">Book ID -<?php echo $row['book_id'] ?></p>
                                  <p class="card-text"><?php echo $_SESSION['u_id'] ?></p>
                                <div class="btn-group" role="group" > 
                                    <a href="user_dashboard?reading_book_id=<?=$row['book_id']; ?>" class="btn btn btn-primary offset-0" type ="submit" name="reading" role="button"><i class="fa fa-book"></i></a> 
                                    <a href="user_dashboard?wish_book_id=<?=$row['book_id']; ?>" class="btn btn btn-primary offset-0" name="wish" type ="submit" role="button"><i class="fa fa-heart"></i></a>
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