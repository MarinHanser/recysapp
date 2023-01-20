<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Verkoop - Home</title>
  </head>
  <body class="p-0 bg-white">
    <!-- Header Image-->
    <div
      style="
        background-image: url('/assets/img/header.jpg');
        width: 100%;
        height: 650px;
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
            <h2 style="color: white">WIJ VERKOPEN SPULLEN</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Products-->
    <div class="container p-3" style="text-align: center">
      <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
          <h2>AANBEVOLEN</h2>
        </div>
        <div class="col-sm"></div>
      </div>
    </div>
    <div class="container p-3" style="text-align: center">
      <div class="row">
        <div class="col-sm p-3">
          <div class="card">
            <img class="card-img-top" src="/assets/img/product1.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">{productname}</h5>
              <p class="card-text">{description}</p>
              <a href="#" style="color: inherit">MEER INFO</a>
            </div>
          </div>
        </div>
        <div class="col-sm p-3">
          <div class="card">
            <img class="card-img-top" src="/assets/img/product1.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">{productname}</h5>
              <p class="card-text">{description}</p>
              <a href="#" style="color: inherit">MEER INFO</a>
            </div>
          </div>
        </div>
        <div class="col-sm p-3">
          <div class="card">
            <img class="card-img-top" src="/assets/img/product1.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">{productname}</h5>
              <p class="card-text">{description}</p>
              <a href="#" style="color: inherit">MEER INFO</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("footer.php");?>
   <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script type="module" src="assets/js/starter.js"></script>
  </body>
</html>
