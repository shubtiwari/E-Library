<?php
                    include 'conn.php';  
                    include 'session.php';
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
    <?php
     include 'navbar.php';
     include 'sidenav.php';
     ?>
     <br>
    <div class="container">
            <div class="row">
            <div class="col-xl-10 offset-xl-1 col-lg-9 offset-lg-2 col-md-10 offset-md-2 col-sm-9 offset-sm-3">
            <h1> Wishlist </h1>
              <table class="table table-striped" >
                  <thead>
                      <tr>
                        <th scope="col-4">S.No</th>
                          <th scope="col-4">Book Name</th>
                            <th scope="col-4">Autho Name </th>
                          <th scope="col-4">Read</th>
                        <th scope="col-4">Remove</th>
                      </tr>
                  </thead> 
                  <?php
                               
                  // var_dump($u_id);
                        $q = " SELECT * FROM `books` INNER JOIN records ON books.book_id = records.book_id WHERE status= 'wishlist' AND user_id= '{$_SESSION['u_id']}'";
                        $result = mysqli_query($con, $q);
                        $counter =0;
                        while($row = mysqli_fetch_assoc($result)){   
                  ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo ++$counter; ?></th>
                          <td><?php echo $row['book'] ?></td>
                              <td><?php echo $row['author'] ?></td>                                             
                          <td> <a href="wishlist_read.php?wishlist_read_id=<?= $row['book_id'];?>" class="btn btn-outline-success me-2" name= wishlist_read role="button" >Read</a> </td>
                          <td> <a href="wishlist_remove.php?wishlist_remove_id=<?= $row['book_id'];?>" class="btn btn-outline-success me-2" name= wishlist_remove role="button" >Remove</a> </td>
                        </tr>
                    </tbody>
                    <?php }
                    
                    
                    
                    
                    
                    
                    ?>
              </table>
            </div>
            </div>
       </div>
  </body>
</html>