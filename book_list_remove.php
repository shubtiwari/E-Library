<?php
    include 'conn.php';
    $book_id =$_GET['book_id'];
    $q = "DELETE FROM `books` WHERE book_id= $book_id;";
    $result = mysqli_query($con, $q);
    header("Location:book_list.php");     
?>