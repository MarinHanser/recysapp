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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Verkoop - Login</title>
    </head>
    <!-- Information-->
    <div style="background-color: white;width: 100%;height: 650px;" class="d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center container">
            <div class="d-flex align-items-center justify-content-center container">
                <div class="container">
                  <div class="row" style="text-align: left">
                      <div class="col">
                        <h5>Nieuwe klant</h5>
                        <h6>Een account aanmaken</h6>
                        <span>Door een account aan te maken kunt u sneller en makkelijker bestellen.</span>
                        <div><a href="registratie.php" class="btn btn-outline-success my-4 pm-3" type="submit" >Verder</a></div>
                      </div>
                      <div class="col">
                      </div>
                      <div class="col">
                        <h5>Terugkerende klant</h5>
                        <h6>Ik ben een terugkerende klant</h6>
                          <form method="post">
                            <div class="my-3">
                              <span>E-Mail</span>
                              <input type="text" id="fname" name="naam" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <div>
                            <span>Wachtwoord</span>
                              <input type="password" id="lname" name="passwd"style="border: 1px solid #ccc; padding: 12px 20px; width: 100%; margin-bottom: 10px">
                              <span><a href="#" style="color: inherit" >Wachtwoord vergeten</a></span>
                            </div>
                            <input class="btn btn-outline-success my-4 pm-3" type="submit" value="Inloggen"> </input>
                          </form>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <?php include("footer.php");?> -->
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
