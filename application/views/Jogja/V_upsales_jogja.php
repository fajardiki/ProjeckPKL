<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->
<?php $nama = $this->session->userdata('user'); ?>

<div class="container-fluid mb-5" style="margin-top: 10px;">
	<h1 class="mt-2" align="center" style="font-size: 3vw;">Salesman Jogja</h1>
	<hr style="border: 1px solid; width: 10vw; margin-top: 0px; margin-bottom: 30px;">
</div>

<div class="container-fluid mt-4" align="center" style="margin-bottom: 50px; font-size: 11px;">
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
	<div class="row" style="overflow-y: scroll;">
		<div class="col-sm-12" >
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
				      <td><a href="<?php echo base_url().'C_jogja/diagramsales/'.$us['Emp_Code'] ?>" class="card-link fas fa-chart-bar" style="font-size:15px;"></a></td>
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
				      <td><a href="<?php echo base_url().'C_jogja/diagramsales/'.$us['Emp_Code'] ?>" class="card-link fas fa-chart-bar" style="font-size:15px;"></a></td>
				      <td><a href="<?php echo base_url().'C_jogja/updatesales/'.$us['Emp_Code'] ?>" class="card-link fas fa-edit" style="font-size:15px;"></a></td>
				      <td><a href="<?php echo base_url().'C_jogja/hapussales/'.$us['Emp_Code'] ?>" class="card-link fas fa-trash" style="font-size:15px;"></a></td>
				    </tr>
					<?php $no++; } ?>
				<?php } ?>
				<tr>
					<td colspan="8"><a class="btn btn-dark" style="width: 100%" href="<?php echo base_url().'C_jogja/savesales' ?>">Tambah</a></td>
				</tr>
			   </tbody>
			</table>
		</div>
	</div>
</div>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->