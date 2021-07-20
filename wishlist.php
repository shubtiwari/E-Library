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
      include 'conn.php';  
      include 'navbar.php';
      include 'sidenav.php';
          $b_id = $_SESSION['b_id'];
          $u_id = $_SESSION['u_id'];
          $status = "wishlist";
          $sql_Check = "SELECT * FROM records where user_id = $u_id AND book_id = $b_id";
          $result_check = mysqli_query($con, $sql_Check);
           if (mysqli_num_rows($result_check) == 1) { 
              echo '<script> alert("product already exist in wishlist") </script>';
            
          }
          else{
               $insertWishlist = "INSERT INTO records (user_id, book_id, status) VALUES ('$u_id', '$b_id','$status')";   
               mysqli_query($con, $insertWishlist);
              }
     ?>

<h1> Wishlist </h1>
    <div class="container">
            <div class="row">
            <div class="col-9 offset-0">
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
                        $q = " SELECT book,author  FROM `books` INNER JOIN records ON books.book_id = records.book_id WHERE status= 'wishlist' AND user_id= '$u_id'";
                        $result = mysqli_query($con, $q);
                        $counter =0;
                        while($row = mysqli_fetch_assoc($result)){   
                  ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo ++$counter; ?></th>
                          <td><?php echo $row['book'] ?></td>
                              <td><?php echo $row['author'] ?></td>                            
                          <td><a href="#" class="btn btn-outline-success me-2"  role="button">Read </a></td>
                        <td><a href="#" class="btn btn-outline-success me-2"  role="button">Remove </a></td>
                        </tr>
                    </tbody>
                    <?php }?>
              </table>
            </div>
            </div>
       </div>
  </body>
</html>