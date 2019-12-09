<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
</head>
<body style="font-family: cambria; height: 100%; background-color: #D3D3D3">
<div class="container-fluid">
  <div class="row">
  	<div class="col-sm-2"></div>
  	<div class="col-sm-8">
  		<h1 class="mt-2" align="center" style="font-size: 4vw;">Update User</h1>
		<hr style="border: 1px solid; width: 20vw; margin-top: 0px; margin-bottom: 30px;">
  	</div>
  </div>
  <div class="row">
    <div class="col-sm-12">
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
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form action="<?php echo base_url().'C_dasbord/updateuser' ?>" method="post">
        <div class="form-group row">
          <label for="empcode" class="col-sm-2 col-form-label">Id_User</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" name="iduser" value="<?php echo $upuser[0]['id_user'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="<?php echo $upuser[0]['nama_user'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <select class="form-control mb-1" id="status" name="status">
              <option value="<?php echo $upuser[0]['id_status'] ?>"><?php echo $upuser[0]['status'] ?></option>
              <option value="1">Admin</option>
              <option value="2">Ouner</option>
              <option value="3">HRD</option>
              <option value="4">Oprational Manager</option>
              <option value="5">Supervisor</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value="<?php echo $upuser[0]['username'] ?>">
          </div>
        </div>
       	<div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="password" value="<?php echo $upuser[0]['password'] ?>">
          </div>
        </div>
        <div class="form-group row">
        	<label for="conces" class="col-sm-2 col-form-label">Conces</label>
        	<div class="col-sm-10">
        		<select class="form-control mb-1" id="conces" name="conces">
              <option value="<?php echo $upuser[0]['id_conces'] ?>"><?php echo $upuser[0]['nama_conces'] ?></option>
              <option value="1">Jogja</option>
			        <option value="2">Magelang</option>
              <option value="3">Bantul</option>
              <option value="4">Klaten</option>
			      </select>
        	</div>
        </div>
        <div class="form-group row">
    		  <div class="col-sm-12">
    		   <input type="submit" class="btn btn-block btn-danger" value="Perbarui" name="update" onclick="return confirm('Anda yakin ingin memperbarui data user ini ?')">
    		  </div>
    		</div>
      </form>
        <div class="form-group row">
          <div class="col-sm-12">
            <a type="submit" class="btn btn-block btn-danger" href="<?php echo base_url().'C_dasbord/user' ?>">Kembali</a>
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