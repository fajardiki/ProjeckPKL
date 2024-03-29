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
      <h1 class="mt-2" align="center" style="font-size: 3vw;">Tambah District Jogja</h1>
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
      <form action="<?php echo base_url().'C_jogja/savedistrict' ?>" method="post">
        <div class="form-group row">
          <label for="empcode" class="col-sm-2 col-form-label">District Code</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="district_code" value="" autocomplete="off">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">District</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="district" value="" autocomplete="off">
          </div>
        </div>
        <div class="form-group row">
          <label for="conces" class="col-sm-2 col-form-label">Concess</label>
          <div class="col-sm-10">
            <select class="form-control mb-1" id="conces" name="conces">
              <option value="1">Jogja</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
           <input type="submit" class="btn btn-block btn-danger" value="Simpan" name="save" onclick="return confirm('Anda yakin ingin menambah distrik ini ?')">
          </div>
        </div>
      </form>
      <div class="form-group row">
        <div class="col-sm-12">
          <a type="submit" class="btn btn-block btn-danger" href="<?php echo base_url().'C_jogja/updatedistrict' ?>">Kembali</a>
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