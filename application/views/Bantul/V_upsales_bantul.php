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
<body>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<div class="container-fluid mb-5 mt-3">
	<h1 align="center">Salesman Bantul</h1>
</div>
<div class="container-fluid" align="center" style="margin-bottom: 6px;">
	<div class="row">
	<?php foreach ($updatesales as $us) { ?>
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12 mb-2">
					<div class="media border p-3">
					  <img src="<?php echo base_url().'assets/img/user.jpg' ?>" alt="John Doe" class="mr-3 mt-3" style="width:100px;">
					  <div class="media-body">
					    <h4><?php echo $us['Salesman']; ?></h4>
					    <p><?php echo $us['Status']; ?> / <?php echo $us['Username']; ?> / <?php echo $us['Password']; ?></p>
					    <a href="<?php echo base_url().'C_bantul/diagramsales/'.$us['Emp_Code'] ?>" class="card-link fa fa-bar-chart-o" style="font-size:15px;"></a>
					  	<a href="<?php echo base_url().'C_bantul/updatesales/'.$us['Emp_Code'] ?> ?>" class="card-link fa fa-edit" style="font-size:15px;"></a>
					  	<a href="<?php echo base_url().'C_bantul/hapussales/'.$us['Emp_Code'] ?>" class="card-link fa fa-trash" style="font-size:15px;"></a>
					  </div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<a href="<?php echo base_url().'C_bantul/savesales' ?>">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12 mb-2">
					<div class="media border p-3">
					  <img src="<?php echo base_url().'assets/img/tuser.jpg' ?>" alt="John Doe" class="mr-3 mt-3" style="width:100px;">
					  <div class="media-body">
					    <h4>Tambah Salesman</h4>
					    <p>Status / Username / Password</p>
					    <a class="card-link fa fa-bar-chart-o" style="font-size:15px;"></a>
					  	<a class="card-link fa fa-edit" style="font-size:15px;"></a>
					  	<a class="card-link fa fa-trash" style="font-size:15px;"></a>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</a>
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