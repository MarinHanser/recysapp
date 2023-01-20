<?php
include("config.php");
include("header.php");
if($_POST){

$v=$db->prepare("insert into user set name=?, password=?, email=?, telephone=?, balance=50");
$naam = htmlspecialchars($_POST['naam'], ENT_QUOTES);
$telephone = htmlspecialchars($_POST['telephone'], ENT_QUOTES);
$wachtwoord = sha1(addslashes($_POST['wachtwoord']));
$email= htmlspecialchars($_POST['email'], ENT_QUOTES);

$stmt = $db->prepare("SELECT * FROM user");
$stmt->execute([$naam]); 
$user = $stmt->fetch();

if(!$naam || !$wachtwoord || !$email || !$telephone){
  echo '<BODY onLoad="myFunction()">';  
}
else
{
  $x=$v->execute(array($naam,$wachtwoord,$email,$telephone));
  if($x){
    echo '<BODY onLoad="myFunction2()">';  
    header("refresh:2; url=login.php");
    }
  }
}

 
 ?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Verkoop - Registratie</title>
  </head>
  <body class="p-0 bg-white">
    <!-- Information-->
    <div style="background-color: white;width: 100%;height: 650px;" class="d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center container">
            <div class="d-flex align-items-center justify-content-center container">
                <div class="container">
                  <div class="row" style="text-align: left">
                      <div class="col">
                        <h5>Uw persoonlijke gegevens</h5>
                        <h6>Vul hier uw gegevens in</h6>
                          <form method="post">
                            <div class="my-3">
                              <span>Volledige naam*</span>
                              <input type="text" id="fname" name="naam" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <div class="my-3">
                            <span>E-Mailadres*</span>
                              <input type="text" id="email" name="email" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <div class="my-3">
                            <span>Telefoonnummer*</span>
                              <input type="text" id="telephone" name="telephone" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                          <h5>Wachtwoord</h5>
                            <div class="my-3">
                            <span>Wachtwoord*</span>
                              <input type="password" id="password" name="wachtwoord" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <input class="btn btn-outline-success my-4 pm-3" type="submit" value="Inloggen"> </input>
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
        <div id="snackbar" >Niet alle velden zijn ingevuld!</div>
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
          <div id="snack2">Account aangemaakt!</div>
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
