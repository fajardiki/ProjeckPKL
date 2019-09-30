<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<h1 align="center" style="margin-bottom: 50px;">Salesman Update</h1>
<!--<div class="row justify-content-center">-->

<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<table class="table table-bordered table-responsive" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
					<thead class="thead-dark">
				<!--<table class="table" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
					<thead class="thead-dark">-->
					   <tr>
					 	<th scope="col">Emp_Code</th>
						<th scope="col">Salesman</th>
						<th scope="col">Status</th>
						<th scope="col">Username</th>
						<th scope="col">Password</th>
						<th scope="col">Option</th>
					  </tr>
					</thead>
			 		<?php foreach ($updatesales as $us) { ?>
					  <tbody>
					    <tr>
					      <th class="table-dark" style="text-align: center;"><?php echo $us['Emp_Code']; ?></th>
					      <td><?php echo $us['Salesman']; ?></td>
					      <td><?php echo $us['Status']; ?></td>
					      <td><?php echo $us['Username']; ?></td>
					      <td><?php echo $us['Password']; ?></td>
					      <td style="text-align: center;">
					      	<a href="<?php echo base_url().'C_dasbord/edit' ?>" class="fas fa-edit"></a>
					      	<a href="<?php echo base_url().'C_dasbord/hapussales/'.$us['Emp_Code'] ?>" class="fas fa-trash"></a>
					      </td>
					    </tr>
					  </tbody>
					  <?php } ?>
				</table>
			</div>
			<div class="col-sm-6">
			<form method="post" action="<?php echo base_url().'C_dasbord/savesales'?>">
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
		</div>
</div>

</body>
</html>