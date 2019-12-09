<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>">

    <link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/fontawesome.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/solid.css' ?>">
    
  </head>
  <body style="font-family: cambria;">
<!-- <img src="<?php echo base_url().'assets/img/allusesr.JPG' ?>" style="position: absolute; width: 550px;"> -->
 <div class="container form">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4" id="form_login">
        <img class="rounded mx-auto d-block" style="width: 100px; text-align: center;" src="<?php echo base_url().'assets/img/user.png' ?>">
        <h3 class="login_text">Sistem Informasi</h3>
        <h3 class="login_text">Salesman</h3>
        <br>
        <?php
          if (isset($statuspesan)) {
            if ($statuspesan != "sukses") {
        ?>   
            <div class="alert alert-danger" role="alert"><?php echo $isipesan ?></div>
        <?php
          } else {
        ?>
            <div class="alert alert-success" role="alert"><?php echo $isipesan ?></div>
        <?php
            }
          }
        ?>
        <form action="<?php echo base_url().'C_login/login'; ?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="inputusername" placeholder="Username" name="username" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="inputpassword" placeholder="Password" name="password" autocomplete="off">
          </div>
          <button type="submit" class="btn btn-danger float-right" id="btn_login" name="btnlogin">Login</button>
        </form>
      </div>
    </div>
  </div>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url().'assets/js/jquery-3.2.1.slim.min.js' ?>" ></script>
  <script src="<?php echo base_url().'assets/js/popper.min.js' ?>" ></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.min.js' ?>" ></script>
  </body>
</html>