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
  		<h1 class="mt-2" align="center" style="font-size: 4vw;">Update Salesman Magelang</h1>
		<hr style="border: 1px solid; width: 20vw; margin-top: 0px; margin-bottom: 30px;">
  	</div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form action="<?php echo base_url().'C_magelang/updatesales' ?>" method="post">
        <div class="form-group row">
          <label for="empcode" class="col-sm-2 col-form-label">Emp_Code</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" name="empcode" value="<?php echo $sales[0]['Emp_Code'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="<?php echo $sales[0]['Salesman'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="status" value="<?php echo $sales[0]['Status'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value="<?php echo $sales[0]['Username'] ?>">
          </div>
        </div>
       	<div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="password" value="<?php echo $sales[0]['Password'] ?>">
          </div>
        </div>
        <div class="form-group row">
        	<label for="conces" class="col-sm-2 col-form-label">Conces</label>
        	<div class="col-sm-10">
        		<select class="form-control mb-1" id="conces" name="conces">
			        <option value="2">Magelang</option>
			      </select>
        	</div>
        </div>
        <div class="form-group row">
    		  <div class="col-sm-12">
    		   <input type="submit" class="btn btn-block btn-danger" value="Perbarui" name="update">
    		  </div>
    		</div>
      </form>
        <div class="form-group row">
          <div class="col-sm-12">
            <a type="submit" class="btn btn-block btn-danger" href="<?php echo base_url().'C_magelang/updatesales' ?>">Kembali</a>
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