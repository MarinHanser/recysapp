<?php
include("config.php");
include("header.php");
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
  $url = "https://"; 
}
else{
  $url = "http://";   
  $url.= $_SERVER['HTTP_HOST'];   
  $url.= $_SERVER['REQUEST_URI'];    
  $surl =  (explode("=",$url));
}  
// Getting ad post name
$id = $_GET['id'];
$c = $db->prepare("select * from post where id=?"); 
$c->execute(array($id));
$x = $c->fetch(PDO::FETCH_ASSOC);
// Get product info using ID in url
$nid = $x['user_id'];
$getn = $db->prepare("select * from user where id=$nid"); 
$getn->execute(array($nid));
$d = $getn->fetch(PDO::FETCH_ASSOC);
// Get ID for user bidding.
$stmt = $db->prepare("SELECT * FROM user WHERE id=?");
@$stmt->execute(array($_SESSION['id'])); 
$data = $stmt->fetchAll();
foreach ($data as $row) {
}
// Select biddings desc. (high to low)
$stmt = $db->prepare("SELECT * FROM bidding where post_id=? ORDER BY Recys DESC");
$stmt->execute(array($id)); 
$data = $stmt->fetchAll();



// Delete as admin or owner of ad.
if(isset($_POST['delete'])) {
  // $stmt = $db->prepare("DELETE FROM post WHERE id = $id;");
  // $stmt->execute(array($id)); 
  // $data = $stmt->fetchAll();
  // header("refresh:0; url=product.php");
}
$cart = array();

if(isset($_POST['bid'])) {
foreach($data as $bidding){
  if ($bidding['Recys'] < $_POST['bid_price']){
    array_push($cart, $_POST['bid_price']);
  }
}
}
$cities = array("London", "Paris", "New York");
echo $cart["1"]; // Outputs: London
// $price= htmlspecialchars($_POST['bid_price'], ENT_QUOTES);
//     $s=$db->prepare("insert into bidding set post_id=?, user_id=?, Recys=?");
//     $bx=$s->execute(array($x["id"],$nid,$price));
//     header("Refresh:0");
//     }
//     else{
//       echo("2");
//     }
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
            <h2 style="color: black"><?php echo $x['Product']?></h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Products-->
    <div class="container p-3 " style="text-align: center">
      <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
        </div>
        <div class="col-sm"></div>
      </div>
    </div>
    <div class="container p-3" style="text-align: center">
      <div class="row">
        <div class="col-sm p-3">
        <div class="card">
          <?php
            
            if(@$_SESSION['id'] == $nid || @$row['role'] == 1){
          ?>
            <form method="post">
              <input type="submit" class="btn btn-outline-danger" name="delete" value="Verwijderen"/>
            </form>
            <img class="card-img-top" src="/assets/img/etalage/<?php echo $x["foto"];?>" alt="Card image cap" onerror="this.src='/assets/img/recyclelogo_empty.png';this.onerror='';" style="background-position: center; background-repeat: no-repeat; background-size: cover;"/>
          <?php } 
            else{ ?>
              <img class="card-img-top" src="/assets/img/etalage/<?php echo $x["foto"];?>" alt="Card image cap" onerror="this.src='/assets/img/recyclelogo_empty.png';this.onerror='';" style="background-position: center; background-repeat: no-repeat; background-size: cover;"/>
          <?php 
            } 
          ?>
        </div>
        </div>
        <div class="col-sm p-3">
          <div class="divider"></div>
          <div class="row">
            <div class="col-sm" style="text-align: left;">
              <p><b>Naam:</b></p>
            </div>
            <div class="col-sm" style="text-align: left;">
              <span><?php echo $x['Product']?></span>
            </div>
            <div class="col-sm"></div>
          </div>
          <div class="row">
            <div class="col-sm" style="text-align: left;">
              <p><b>Datum:</b></p>
            </div>
            <div class="col-sm" style="text-align: left;">
              <span><?php echo $x['dateposted']?></span>
            </div>
            <div class="col-sm"></div>
          </div>
          <div class="row">
            <div class="col-sm" style="text-align: left;">
              <p><b>Geplaats door:</b></p>
            </div>
            <div class="col-sm" style="text-align: left;">
              <span><?php echo $d['name']?></span>
            </div>
            <div class="col-sm"></div>
          </div>
          <div class="row" >
            <div class="col-sm" style="text-align: left; margin-top: 65px;">
              <div class="form-outline">
                <h2 class="text-success"><?php echo $x['Recys']?> Recys</h2>
              </div>
             <?php 
             foreach ($data as $row) {
              ?> 
              <?php echo $row['Recys']?> Recys</h2><br>
             <?php
             }
             ?>
            </div>
          </div>
          <div class="row" style="margin-top: 85px">
          <form method="post">
            <div class="col-sm" style="text-align: left;">
              <div class="form-outline">
                <input type="number" id="bid_price" name="bid_price" class="form-control" value="1"/>
              </div>
            </div>
            <div class="col-sm" style="text-align: left;">
              <input type="submit" class="btn btn-outline-success" name="bid" value="Bieden" />
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  
    <!-- Product information-->
    <div class="container" style="text-align: center; margin-top: 100px;">
      <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
          <h2 class="text-dark">Beschrijving</h2>       
          <div class="divider"></div> 
        </div>
        <div class="col-sm">
        </div>
      </div>
    </div>
    <div style="width: 100%; margin-bottom: 100px" class="d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center container">
        <div class="d-flex align-items-center justify-content-center container" style="text-align: center;">
          <span style="color: black"><?php echo $x['Beschrijving']?></span>
        </div>
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
    <!-- Powered by-->
    <div class="p-3 bg-dark text-white" style="text-align: center; width: 100% !important">
      <span>POWERED BY <b>0SV1</b></span>
    </div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script type="module" src="assets/js/starter.js"></script>
  </body>
</html>
