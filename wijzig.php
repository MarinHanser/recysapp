<?php

include("config.php");
include("header.php");

$c = $db->prepare("select * from user where id=?"); 
$id = $_GET['id'];

$c->execute(array($id));

$x = $c->fetch(PDO::FETCH_ASSOC);

$z=$db->prepare("update user set name=?, email=?, telephone=?, password=?  where id=?");
if($_POST)
{
$naam = htmlspecialchars($_POST['naam'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$telephone = htmlspecialchars($_POST['telephone'], ENT_QUOTES);
$passwd = (addslashes($_POST['passwd']));
$password = (sha1($passwd));

if(!$naam || !$passwd || !$telephone || !$email){
  echo '<BODY onLoad="myFunction()">';  
}
  else{
      $zz=$z->execute(array($naam, $email, $telephone, $password, $id));
      echo '<BODY onLoad="myFunction2()">';  
  }
}

if($_SESSION)
{
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Verkoop - Mijn Gegevens</title>
  </head>
  <body class="p-0 bg-white">
    <!-- Information-->
    <div style="background-color: white;width: 100%;height: 650px;" class="d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center container">
            <div class="d-flex align-items-center justify-content-center container">
                <div class="container">
                  <div class="row" style="text-align: left">
                      <div class="col">
                        <h5>Product toevoegen</h5>
                        <h6>Vul uw gegevens in</h6>
                          <form method="post" enctype="multipart/form-data">
                            <div class="container m-0">
                              <div class="row">
                                <div class="col-8 p-0 my-4" >
                                  <span>Naam</span>
                                  <input type="text" id="name" name="naam" value="<?php echo $x['name'] ?>" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                                </div>
                                <div class="col-4 p-0 my-4" >
                                  <span>Saldo</span>
                                  <input type="text" id="name" readonly name="naam" value="<?php echo $x['balance'] ?>" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                                </div>
                              </div>
                            </div>
                            <div class="my-0">
                                <span>Email</span>
                                <input type="text" id="email" name="email" value="<?php echo $x['email'] ?>" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <div class="my-4">
                                <span>Telefoon</span>
                                <input type="text" id="telephone" name="telephone" value="<?php echo $x['telephone'] ?>" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <div class="my-4">
                                <span>Wachtwoord</span>
                                <input type="password" id="passwd" name="passwd" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <input class="btn btn-outline-success my-4 pm-3" type="submit" value="Wijzigen"> </input>
                          </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products-->
    
    <!-- Footer-->
    <div
      class=" bg-light"
      style="text-align: center; width: 100% !important;"
    >
    <div class="p-3" style="text-align: center; width: 100% !important; background-color: #e7e7e7;">
      <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
          <h6>KLANTENSERVICE</h6>
        </div>
        <div class="col-sm">
          <h6>MIJN ACCOUNT</h6>
        </div>
        <div class="col-sm"></div>
      </div>
      <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
          <a href="#" style="color: inherit">Contact</a>
        </div>
        <div class="col-sm">
          <a href="#" style="color: inherit">Mijn account</a>
        </div>
        <div class="col-sm"></div>
      </div>
      <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
          <a href="#" style="color: inherit">Voorwaarden</a>
        </div>
        <div class="col-sm">
          <a href="#" style="color: inherit">Bestelhistorie</a>
        </div>
        <div class="col-sm"></div>
      </div>
      <div class="row" style="padding-bottom: 10px ;">
        <div class="col-sm"></div>
        <div class="col-sm"></div>
        <div class="col-sm">
          <a href="#" style="color: inherit">Mijn biedingen</a>
        </div>
        <div class="col-sm"></div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-2">
        </div>
        <div class="col-md-auto">
        <div id="snackbar">Niet alle velden zijn ingevuld!</div>
        </div>
        <div class="col col-lg-2">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-md-center">
          <div class="col col-lg-2">
          </div>
          <div class="col-md-auto">
          <div id="snack2">Gegevens bijgewerkt!</div>
          </div>
          <div class="col col-lg-2">
          </div>
        </div>
    </div>
    <!-- Powered by-->
    <div class="p-3 bg-dark text-white" style="text-align: center; width: 100% !important">
      <span>POWERED BY <b>0SV1</b></span>
    </div>


    <script>
      function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      }
    </script>
    <script>
      function myFunction2() {
        var x2 = document.getElementById("snack2");
        x2.className = "show";
        setTimeout(function(){ x2.className = x2.className.replace("show", ""); }, 3000);
      }
    </script>
  

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script type="module" src="assets/js/starter.js"></script>
  </body>
</html>
<?php 
}
else{
  header("Location: post-login.php");
}
?>