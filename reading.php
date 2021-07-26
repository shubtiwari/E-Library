<?php
     include 'conn.php';   
     include 'session.php';
     if(isset($_GET['complete_book_id']))
     {
       $cb_id = $_GET['complete_book_id'];
       $sql_Check = "UPDATE records SET status = 'completed' where  book_id = $cb_id";
       $result_check = mysqli_query($con, $sql_Check);
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
        <div class="container">
            <div class="row">
              <div class="col-xl-10 offset-xl-1 col-lg-9 offset-lg-2 col-md-10 offset-md-2 col-sm-9 offset-sm-3">
               <h1> Reading </h1>


             <?php          
                $q = " SELECT * FROM `books` INNER JOIN records ON books.book_id = records.book_id WHERE status= 'reading' AND user_id= '{$_SESSION['u_id']}'";           
                $result = mysqli_query($con, $q);
                $counter =0;                  
                while($row = mysqli_fetch_assoc($result))
                {   
            ?>               
                                <div class="card-group">
                                 <div class="card text-white bg-success mb-3">                   
                                    <br> 
                                    <h5 class="card-title"><?php echo ++$counter; ?></h5>
                                     <h6 class="card-title"><?php echo $row['book'] ?></h6>
                                     <h7 class="card-title">by - <?php echo $row['author'] ?> </h7>
                                     <p class="card-text"><?php echo $row['discription']  ?></p>
                                     <p class="card-text"> Book ID <?php echo $row['book_id']  ?></p>  
                                    
                                     <div class="btn-group" role="group" >          
                                     <a href="reading.php?complete_book_id=<?= $row['book_id'];?>" class="btn btn btn-primary offset-0"  role="button" >Complete</a>  
                                  </div>
                                </div>
          <?php }  ?>
          </div>
                          </div>
      </div>  
   </body>
</html>