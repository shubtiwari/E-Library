<?php
    include 'conn.php';
    $u_id =$_GET['user_id'];
    $q = "DELETE  FROM user WHERE user_id= $u_id ";
    if ($con->query($q) === TRUE)
      { 
       header("Location:admin_list.php");
      }
    else 
      {
       echo "Error deleting record: " ;
      }
?>
