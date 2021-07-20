<?php
 include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
          <title>Booklist</title>
    </head>
      <style>
        <?php include 'Style.css';?>
      </style>

<body>
      <?php include 'navbar.php';?>
      <?php include 'sidenav.php';?>
      <div class="container">
         <div class="row">
            <div>
               <h1>Book List</h1>
                   <table class="table table-striped" >
                      <thead>
                        <tr>
                          <th scope="col">S.No</th>
                          <th scope="col">Book Name</th>
                          <th scope="col">Author Name</th>
                          <th scope="col">ID</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>

                          <?php
                             $q = " SELECT * FROM `books` ";
                             $result = mysqli_query($con, $q);
                             $counter =0;
                             while($row = mysqli_fetch_assoc($result)){   
                            ?>
                                  <tbody>
                    
                            <tr>
                              <th scope="row"><?php echo ++$counter; ?></th>
                                <td><?php echo $row['book'] ?></td>
                                <td><?php echo $row['author'] ?></td>
                                <td><?php echo $row['book_id'] ?></td>
                                <td><a href="book_list_remove.php?book_id= <?php echo $row['book_id'];?>" class="btn btn-outline-success me-2 " role="button" >Remove</a></td>
                            </tr>
                          </tbody>
                  <?php } ?>
              </table>
        </div>
      </div>
      </div>
     </body>
</html>
