<div class="sidebar">
   <?php
      if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) 
      {
         ?>
            <a href="add_book.php"> Add Book</a>
            <a href="admin_list.php"> Admin List</a>
            <a href="book_list.php"> Book List</a>
            <a href="user_list.php"> User List</a>
         <?php
      }
      else 
       { 
          ?>
            <a href="user_dashboard.php"></i> Dashboard</a>
            <a href="reading.php"> Reading</a>
            <a href="wishlist.php"> Wishlist</a>
            <a href="history.php"></i> History</a>
            <?php
       }
         ?>  
  
</div>