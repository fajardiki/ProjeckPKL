
<?php $nama = $this->session->userdata('user'); ?>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center; margin-top: 70px;">
    <h1 class="lead" style="padding: 10px;">USER</h1>
</div>

	<section style="overflow-x: scroll; margin-bottom: 30px;">
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">Id_User</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Status</th>
		      <th scope="col">Username</th>
		      <th scope="col">Password</th>
		      <th scope="col">Id_conces</th>
		      <th scope="col" colspan="2">Opsi</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if ($nama[0]['status']=='HRD' OR $nama[0]['status']=='Owner' OR $nama[0]['status']=='Supervisor' OR $nama[0]['status']=='Oprational Manager') { ?>
		  		
		  	<?php } else {?>
			  	<?php foreach ($adduser as $au) { ?>
			    <tr>
			      <th><?php echo $au['id_user']; ?></th>
			      <td><?php echo $au['nama_user']; ?></td>
			      <td><?php echo $au['status']; ?></td>
			      <td><?php echo $au['username']; ?></td>
			      <td><?php echo $au['password']; ?></td>
			      <td><?php echo $au['nama_conces']; ?></td>
			      <td><a href="<?php echo base_url().'C_dasbord/updateuser/'.$au['id_user'] ?>" class="card-link fas fa-edit" style="font-size:15px;"></a></td>
			      <td><a href="<?php echo base_url().'C_dasbord/hapususer/'.$au['id_user'] ?>" class="card-link fas fa-trash" style="font-size:15px;" onclick="return confirm('Anda yakin ingin menghapus user ini ?')"></a></td>
			    </tr>
				<?php } ?>
			<?php } ?>
		   </tbody>
		</table>
	</section>
	<section class="mt-1" style="margin-bottom: 70px;">
		<a class="btn btn-dark" style="width: 100%" href="<?php echo base_url().'C_dasbord/tambahuser' ?>">Tambah</a>
	</section>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->