<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="font-family: cambria;">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h1 class="mt-2" align="center" style="font-size: 4vw;">Tambah District Jogja</h1>
    <hr style="border: 1px solid; width: 20vw; margin-top: 0px; margin-bottom: 30px;">
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
            <input type="text" class="form-control" name="district_code" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">District</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="district" value="">
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
           <input type="submit" class="btn btn-block btn-danger" value="Simpan" name="save">
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>