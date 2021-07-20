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
  <?php include 'navbar.php';?>
    <h1> Reading </h1>
      <?php     
         include 'sidenav.php';
         include 'conn.php';
            $b_id = $_SESSION['b_id'];
            $u_id = $_SESSION['u_id'];
            $status = "reading";
            $sql_Check = "SELECT * FROM records where user_id = $u_id AND book_id = $b_id";
            $result_check = mysqli_query($con, $sql_Check);
            $current_date = date("d-m-Y ");

            if (mysqli_num_rows($result_check) == 1)  { 
                 echo '<script> alert("product already exist in Reading list") </script>';
             }
            else {
                        // Data insert into records table
                    $insertWishlist = "INSERT INTO records (user_id, book_id, status, issue) VALUES ('$u_id', '$b_id','$status','$current_date')";   
                    mysqli_query($con, $insertWishlist); 
                 }
                    $q = " SELECT book,author,discription  FROM `books` INNER JOIN records ON books.book_id = records.book_id WHERE status= 'reading' AND user_id= '$u_id'";
                    $result = mysqli_query($con, $q);
                    $counter =0;
                    while($row = mysqli_fetch_assoc($result)){   
        ?>         
                    <div class="container">
                            <div class="row">
                                <div class="col-9 offset-2">
                                  <div class="card-group">
                                   <div class="card text-white bg-success mb-3">
                                     <img src="" class="card-img-top" alt="...">
                                       <div class="card-body">
                                         <h5 class="card-title"><?php echo $row['book'] ?></h5>
                                           <h6 class="card-title">by - <?php echo $row['author'] ?> </h6>
                                           <p class="card-text"><?php echo $row['discription'] ?></p>
                                      </div>
                                    <div class="btn-group" role="group" >          
                                        <a href="history.php?book_id=<?=$_SESSION['b_id']; ?>" class="btn btn btn-primary offset-0"  role="button"  target="_blank">Complete</a>  
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <?php } ?>
                    </div>  
   </body>
</html>