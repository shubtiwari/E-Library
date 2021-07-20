<?php
session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $db = "e-library";
   // Create connection
   $con = mysqli_connect($servername, $username, $password, $db);
   if(!$con)
      {
         die("sorry" . mysqli_connect_error());
      }
?>