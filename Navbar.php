

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid m-sm-auto">
    <a class="navbar-brand" href="index.php">E-Library</a>
          <div class="navbar-button">
        <?php
          if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) 
        {
          ?>
          <a href="add_admin.php" class="btn btn-outline-success " role="button" target="_blank" >Add Admin</a>
          <a href="login.php" class="btn btn-outline-success " role="button">Logout</a>
         
          <?php 
        }
        elseif (isset($_SESSION['role']) && ($_SESSION['role'] == 'user'))
        { 
          ?>
          <a href="Logout.php" class="btn btn-outline-success me-2" role="button">Logout</a>
        <?php
        }
        else 
        { 
            ?>
            <a href="Login.php" class="btn btn-outline-success me-2" role="button">Login</a>
            <a href="Signup.php" class="btn btn-outline-success me-2" role="button">Signup</a>
            <?php
        }
          ?>    
      </div>
  </div>
</nav>

