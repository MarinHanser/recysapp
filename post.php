<?php
include("config.php");
include("header.php");
if($_POST){
$v=$db->prepare("insert into post set user_id=?, Product=?, Beschrijving=?, Recys=?, foto=?, dateposted=?");
$product = htmlspecialchars($_POST['product'], ENT_QUOTES);
$description = htmlspecialchars($_POST['description'], ENT_QUOTES);
$recys= htmlspecialchars($_POST['recys'], ENT_QUOTES);
$dateposted = date("Y-m-d");
$dateend = strtotime('+2 weeks');
$target_dir = "assets/img/etalage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST)) {
  move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
}
$stmt = $db->prepare("SELECT * FROM post");
$stmt->execute([$product]); 
$user = $stmt->fetch();

if(!$product || !$description || !$recys){
  echo '<BODY onLoad="myFunction()">';  
}
else
{
    $x=$v->execute(array($_SESSION['id'],$product,$description,$recys,$_FILES['fileToUpload']['name'],$dateposted));
    
    if($x){
        // header("refresh:2; url=product.php");
      }
  }
}
if($_SESSION)
{
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Verkoop - Product Toevoegen</title>
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
                            <div class="my-3">
                              <span>Product naam*</span>
                              <input type="text" id="product" name="product" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <div class="my-3">
                                <span>Beschrijving*</span>
                                <input type="text" id="description" name="description" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <div class="my-3">
                                <span>Prijs in recy's*</span>
                                <input type="text" id="recys" name="recys" style="border: 1px solid #ccc; padding: 12px 20px; width: 100%;">
                            </div>
                            <span>Upload foto*</span>
                            <div class="custom-file">
                                <input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile02"/>
                                <label class="custom-file-label" for="inputGroupFile02"></label>
                            </div>
                            <input class="btn btn-outline-success my-4 pm-3" type="submit" value="Toevoegen"> </input>
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
    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
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