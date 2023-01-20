<?php
include("config.php");
include("header.php");
if($_POST){
$v=$db->prepare("select * from user where name=? and password=? and id=?");
$naam = $_POST['naam'];
$password = sha1(addslashes($_POST['passwd']));

$v->execute(array($naam,$password,$id));
$x = $v->fetch(PDO::FETCH_ASSOC);
$d = $v->rowCount();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Verkoop - Producten</title>
  </head>
  <body class="p-0 bg-white">
    <!-- Header Image-->
    <div
      style="
        background-color: lightgrey;
        width: 100%;
        height: 350px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 300px;
      "
      class="d-flex align-items-center justify-content-center"
    >
      <div class="d-flex align-items-center justify-content-center container">
        <div
          class="d-flex align-items-center justify-content-center container"
          style="display: flex; align-items: center"
        >
          <div class="d-flex align-items-center justify-content-center container">
            <h2 style="color: black">ETALAGE</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Products-->
    <div class="container p-3" style="text-align: center">
      <div class="row">
        <?php
        $v = $db->prepare("select * from post");
        $v-> execute(array());
        $x = $v->fetchALL(PDO::FETCH_ASSOC);
        foreach($x as $z)
        {
        ?>
            <div class="col-4 p-3">
              <div class="card">
                <img class="card-img-top" src="/assets/img/etalage/<?php echo $z["foto"];?>" alt="Card image cap" onerror="this.src='/assets/img/recyclelogo_empty.png';this.onerror='';" style="background-position: center; background-repeat: no-repeat; background-size: cover;"/>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $z["Product"];?></h5>
                  <p class="card-text" style="white-space: normal;"><?php echo $z["Beschrijving"];?></p>
                  <a href="product_info.php?id=<?php echo $z['id']; ?>" style="color: inherit" >MEER INFO</a>
                </div>
              </div>
            </div>
          <?php
        }
        ?>
      
      </div>  
    </div>
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
          <a href="wijzig.php?id=<?php echo $_SESSION['id'] ?>" style="color: inherit">Mijn account</a>
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
    <!-- Powered by-->
    <div class="p-3 bg-dark text-white" style="text-align: center; width: 100% !important">
      <span>POWERED BY <b>0SV1</b></span>
    </div>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script type="module" src="assets/js/starter.js"></script>
  </body>
</html>
