<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
</head>
<body style="font-family: cambria;">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h1 class="mt-2" align="center" style="font-size: 3vw;">Tambah Salesman Bantul</h1>
    <hr style="border: 1px solid; width: 10vw; margin-top: 0px; margin-bottom: 30px;">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
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
      <form action="<?php echo base_url().'C_bantul/savesales' ?>" method="post">
        <div class="form-group row">
          <label for="empcode" class="col-sm-2 col-form-label">Emp_Code</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="empcode" value="" autocomplete="off">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="" autocomplete="off">
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="status" value="" autocomplete="off">
          </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value="" autocomplete="off">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="password" value="" autocomplete="off">
          </div>
        </div>
        <div class="form-group row">
          <label for="conces" class="col-sm-2 col-form-label">Conces</label>
          <div class="col-sm-10">
            <select class="form-control mb-1" id="conces" name="conces" autocomplete="off">
              <option value="3">Bantul</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
           <input type="submit" class="btn btn-block btn-danger" value="Simpan" name="save" autocomplete="off">
          </div>
        </div>
      </form>
      <div class="form-group row">
        <div class="col-sm-12">
          <a type="submit" class="btn btn-block btn-danger" href="<?php echo base_url().'C_bantul/updatesales' ?>">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url().'assets/js/jquery-3.2.1.slim.min.js' ?>" ></script>
<script src="<?php echo base_url().'assets/js/popper.min.js' ?>" ></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js' ?>" ></script>
</body>
</html>