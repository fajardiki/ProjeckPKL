<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->
<?php $nama = $this->session->userdata('user'); ?>

<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center; margin-top: 70px;">
    <h1 class="lead" style="padding: 10px;">Salesman Magelang</h1>
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
	<section style="overflow-x: scroll; margin-bottom: 30px;">
		<table class="table table-bordered" style="text-align: center;">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Emp_Code</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Username</th>
		      <th scope="col">Password</th>
		      <th scope="col" colspan="3">Opsi</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if ($nama[0]['status']=='HRD' OR $nama[0]['status']=='Owner' OR $nama[0]['status']=='Supervisor' OR $nama[0]['status']=='Oprational Manager') { ?>
		  		<?php $no = 1 ?>
			  	<?php foreach ($updatesales as $us) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $us['Emp_Code']; ?></td>
			      <td><?php echo $us['Salesman']; ?></td>
			      <td><?php echo $us['Username']; ?></td>
			      <td><?php echo $us['Password']; ?></td>
			      <td><a href="<?php echo base_url().'C_magelang/diagramsales/'.$us['Emp_Code'] ?>" class="card-link fas fa-chart-bar" style="font-size:15px;"></a></td>
			    </tr>
				<?php $no++; } ?>
		  	<?php } else {?>
			  	<?php $no=1; ?>
			  	<?php foreach ($updatesales as $us) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $us['Emp_Code']; ?></td>
			      <td><?php echo $us['Salesman']; ?></td>
			      <td><?php echo $us['Username']; ?></td>
			      <td><?php echo $us['Password']; ?></td>
			      <td><a href="<?php echo base_url().'C_magelang/diagramsales/'.$us['Emp_Code'] ?>" class="card-link fas fa-chart-bar" style="font-size:15px;"></a></td>
			      <td><a href="<?php echo base_url().'C_magelang/updatesales/'.$us['Emp_Code'] ?>" class="card-link fas fa-edit" style="font-size:15px;"></a></td>
			      <td><a href="<?php echo base_url().'C_magelang/hapussales/'.$us['Emp_Code'] ?>" class="card-link fas fa-trash" style="font-size:15px;" onclick="return confirm('Anda yakin ingin menghapus sales ini ?')"></a></td>
			    </tr>
				<?php $no++; } ?>
			<?php } ?>
		   </tbody>
		</table>
	</section>
	<section class="mt-1" style="margin-bottom: 70px;">
		<a class="btn btn-dark" style="width: 100%" href="<?php echo base_url().'C_magelang/savesales' ?>">Tambah</a>
	</section>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->