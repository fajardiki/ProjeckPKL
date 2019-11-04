<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>">

    <title>Halaman Login</title>
  </head>
  <body style="font-family: cambria;">
<!-- <img src="<?php echo base_url().'assets/img/allusesr.JPG' ?>" style="position: absolute; width: 550px;"> -->
 <div class="container form">
    <div class="row">
    <div class="col-sm-4"></div>
      <div class="col-sm-4" id="form_login">
        <h1 class="login_text">Form Login</h1>
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
            <label for="inputAddress">Username</label>
            <input type="text" class="form-control" id="inputusername" placeholder="Username" name="username" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="inputAddress">Password</label>
            <input type="password" class="form-control" id="inputpassword" placeholder="Password" name="password" autocomplete="off">
          </div>
          <button type="submit" class="btn btn-danger" id="btn_login" name="btnlogin">Sign in</button>
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