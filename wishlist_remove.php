<?php
    include 'conn.php';
    $wishlist_remove =$_GET['wishlist_remove_id'];
    $q ="DELETE  FROM records WHERE book_id= $wishlist_remove ";
    $result = mysqli_query($con, $q);
    header("Location:wishlist.php");     
?>

