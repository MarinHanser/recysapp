<?php
session_start();
include("config.php");
include("includes/include.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body class="p-0 bg-white">
    <!-- Nav Bar-->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="z-index: 999">
      <a class="navbar-brand" href="index.php"><img src="assets/img/recyclelogosmall.png" width="64" height="64" /> </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex" id="navbarNav">
        <ul class="navbar-nav position: relative; float: right;">
          <li class="nav-item m-4">
            <a class="nav-link text-dark" href="index.php">Home </a>
          </li>
          <li class="nav-item m-4">
            <a class="nav-link text-dark" href="product.php">Etalage </a>
          </li>
          <li class="nav-item m-4">
            <a class="nav-link text-dark" href="post.php">Posten</a>
          </li>
          <li class="nav-item m-4">
            <a class="nav-link text-dark" href="#">Transacties</a>
          </li>
        </ul>
      </div>
      <!-- Account information-->
      <div style="margin-right: 6%">
        <div class="dropdown">
          <?php
          if($_SESSION)
            {
             ?>
              <div style="margin-right: 2%">
                <div class="dropdown">
                <a class="btn dropdown-toggle btn-outline-success" style="color: inherit" data-toggle="dropdown"><?php echo $_SESSION['user']?></a>
                  <ul class="dropdown-menu" style="text-align: center">
                    <li class="p-1"><a href="" style="color: inherit">Mijn biedingen</a></li>
                    <li class="p-1"><a href="wijzig.php?id=<?php echo $_SESSION['id'] ?>" style="color: inherit">Mijn gegevens</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="p-1"><a href="uitloggen.php" style="color: inherit">Uitloggen</a></li>
                  </ul>
                </div>
              </div>
             <?php
            }
            else{
              ?>
                <a class="btn btn-outline-success" href="login.php" style="color: inherit">Inloggen</a>
              <?php
            }
          ?>
        </div>
      </div>
    </nav>
</body>
</html>
