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
      include 'sidenav.php';
?>
  <h1> History </h1>
    <div class="container">
        <div class="row">
          <div class="col-9 offset-0">
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Book Name</th>
                  <th scope="col">Author Name </th>
                  <th scope="col">Issue Date</th>
                </tr>
              </thead>
                  <?php
                      include 'conn.php';
                      $b_id = $_SESSION['b_id'];
                      $u_id = $_SESSION['u_id'];
                      $sql_Check = "UPDATE records SET status = 'completed' where  book_id = $b_id";
                      $result_check = mysqli_query($con, $sql_Check);
                      $q = " SELECT book,author,discription,issue  FROM `books` INNER JOIN records ON books.book_id = records.book_id WHERE status= 'completed' AND user_id= '$u_id'";
                      $result = mysqli_query($con, $q);
                      $counter =0;
                      while($row = mysqli_fetch_assoc($result))
                      {   
                  ?>        
                      <tbody>
                          <tr>
                          <th scope="row"><?php echo ++$counter; ?></th>
                          <td><?php echo $row['book'] ?></td>
                          <td><?php echo $row['author'] ?></td> 
                          <td><?php echo $row['issue'] ?></td> 
                      </tbody>
                    <?php }?>
           </div>
        </div>
    </div>
 </body>
</html>