<?php
      
      include("config.php");
      include("header.php");
      
      if($_POST){
        $v=$db->prepare("select * from user where name=? and password=?");
        $naam = $_POST['naam'];
        $password = sha1(addslashes($_POST['passwd']));

        $v->execute(array($naam,$password));
        $x = $v->fetch(PDO::FETCH_ASSOC);
        $d = $v->rowCount();
        
        if($d)
        {
            $_SESSION['user'] = $x['name'];
            $_SESSION['id'] = $x['id'];
        }
        else
        {
          echo '<BODY onLoad="myFunction()">';
        }
        if($_SESSION)
        {
          header("Location: index.php");
        }
      }
      ?>
      
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verkoop - Login</title>
  </head>
  <body class="p-0 bg-white">
    <!-- Information-->
    <div
      style="
        background-image: url('/assets/img/login.png');
        width: 100%;
        height: 650px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 300px;
      "
      class="d-flex align-items-center justify-content-center"
    >
    <div style="width: 100%;height: 650px;" class="d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center container">
            <div class="d-flex align-items-center justify-content-center container">
                <div class="container">
                  <div class="row" style="text-align: left">
                      <div class="col">
                        <h5 class="text-light">Inloggen</h5>
                        <h6 class="text-light">U dient zich eerst in te loggen</h6>
                        <span class="text-light">Klik hier om naar de inlog pagina te gaan</span>
                        <div><a href="login.php" class="btn btn-outline-light my-4 pm-3" type="submit" >Verder</a></div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>

    <!-- Footer-->
    <?php include("footer.php");?>
    <script>
      function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      }
      </script>
    
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script type="module" src="assets/js/starter.js"></script>
  </body>
</html>
