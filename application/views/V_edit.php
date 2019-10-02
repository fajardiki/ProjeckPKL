<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1 align="center">Change Data</h1>
	<div class="row justify-content-center">
	<div class="col-sm-4">
			<form method="post" action="<?php echo base_url().'C_dasbord/editsales'?>">
				<div class="form-group">
					<label>Emp Code</label>
					<input type="text" name="Emp_Code" class="form-control">
				</div>
				<div class="form-group">
					<label>Salesman</label>
					<input type="text" name="Salesman" class="form-control">
				</div>
				<div class="form-group">
					<label>Status</label>
					<input type="text" name="Status" class="form-control">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="Username" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" name="Password" class="form-control">
				</div>
					<div class="form-group">
					<button type="submit" class="btn btn-primary" name="save">Save</button>
				</div>
			</form>				
			</div>
</body>
</html>