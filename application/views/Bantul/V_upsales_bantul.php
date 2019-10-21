<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		body {
		  font-family: 'Lato', sans-serif;
		}
	</style>
</head>
<body style="font-family: cambria;">

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<div class="container-fluid mb-5" style="margin-top: 60px;">
	<h1 class="mt-2" align="center" style="font-size: 4vw;">Salesman Bantul</h1>
	<hr style="border: 1px solid; width: 20vw; margin-top: 0px; margin-bottom: 30px;">
</div>
<div class="container-fluid" align="center" style="margin-bottom: 6px; font-size: 11px;">
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
		<div class="col-sm-12">
			<table class="table table-sm" style="text-align: center;">
			  <thead style="font-size: 9px;">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Emp_Code</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Username</th>
			      <th scope="col">Password</th>
			      <th scope="col" colspan="3">Opsi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no = 1 ?>
			  	<?php foreach ($updatesales as $us) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $us['Emp_Code']; ?></td>
			      <td><?php echo $us['Salesman']; ?></td>
			      <td><?php echo $us['Username']; ?></td>
			      <td><?php echo $us['Password']; ?></td>
			      <td><a href="<?php echo base_url().'C_bantul/diagramsales/'.$us['Emp_Code'] ?>" class="card-link fa fa-bar-chart-o" style="font-size:15px;"></a></td>
			      <td><a href="<?php echo base_url().'C_bantul/updatesales/'.$us['Emp_Code'] ?>" class="card-link fa fa-edit" style="font-size:15px;"></a></td>
			      <td><a href="<?php echo base_url().'C_bantul/hapussales/'.$us['Emp_Code'] ?>" class="card-link fa fa-trash" style="font-size:15px;"></a></td>
			    </tr>
				<?php $no++; } ?>
				<tr>
					<td colspan="8"><a class="btn btn-dark" style="width: 100%" href="<?php echo base_url().'C_bantul/savesales' ?>">Tambah</a></td>
				</tr>
			   </tbody>
			</table>
		</div>
	</div>
</div>
<br><br><br>
<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     

</body>
</html>