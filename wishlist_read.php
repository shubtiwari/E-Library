<?php
    include 'conn.php';
    $wishlist_read_id =$_GET['wishlist_read_id'];
    $q = "UPDATE records SET status = 'reading' where  book_id = $wishlist_read_id";
    $result = mysqli_query($con, $q);
    header("Location:wishlist.php");     
?>