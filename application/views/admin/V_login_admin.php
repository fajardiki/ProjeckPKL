<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>">

    <title>Halaman Login</title>
  </head>
  <body style="background-image: url();">

 <div class="container form">
    <div class="row">
    <div class="col-sm-4"></div>
      <div class="col-sm-4" id="form_login">
        <h1 class="login_text">Form Admin</h1>
        <br>
        <form action="<?php echo base_url().'C_login_admin/login'; ?>" method="post">
          <div class="form-group">
            <label for="inputAddress">Username</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Input Username" name="username">
          </div>
          <div class="form-group">
            <label for="inputAddress">Password</label>
            <input type="password" class="form-control" id="inputAddress" placeholder="Input Password" name="password">
          </div>
          <button type="submit" class="btn btn-primary" id="btn_login" name="btnlogin">Sign in</button>
        </form>
      </div>
    </div>
  </div>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>