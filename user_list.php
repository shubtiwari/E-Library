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
    <title>Login</title>
</head>
    <style>
        <?php include 'style.css';?>
     </style>
<body>
  <?php include 'navbar.php';
        include 'sidenav.php';?>
            <div class="container">
              <div class="row">
              <div class="col-xl-10 offset-xl-2 col-lg-9 offset-lg-2 col-md-10 offset-md-2 col-sm-9 offset-sm-3">
              <h1>User List</h1>
                  <table class="table table-striped" >
                        <thead>
                          <tr>
                            <th scope="col">S.No</th>
                              <th scope="col">Name</th>
                              <th scope="col">ID</th>
                            <th scope="col">Action</th>  
                          </tr>
                        </thead>
                          <?php
                             
                              $q = " SELECT * FROM `user` WHERE role= 'user' ";
                              $result = mysqli_query($con, $q);
                              $counter =0;
                              while($row = mysqli_fetch_assoc($result)){   
                          ?>
                        <tbody>
                          <tr>
                            <th scope="row"><?php echo ++$counter; ?></th>
                              <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['user_id'] ?></td>                        
                            <td><a href="user_list_remove.php?user_id= <?php echo $row['user_id'];?>" class="btn btn-outline-success me-2 " role="button" >Remove</a></td>
                          </tr>
                      </tbody>
                    <?php } ?>
                  </table>
              </div>
            </div>
            </div>
</body>
</html>