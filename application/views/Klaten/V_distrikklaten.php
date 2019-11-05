<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<div class="container-fluid mb-5" style="margin-top: 50px;">
	<h1 class="mt-2" align="center" style="font-size: 4vw;">District Klaten</h1>
	<hr style="border: 1px solid; width: 20vw; margin-top: 0px; margin-bottom: 30px;">
</div>

<div class="container-fluid mt-4" align="center" style="font-size: 11px;">
	<div class="row" style="overflow-y: scroll;">
		<div class="col-sm-12">
			<table class="table table-bordered" style="text-align: center;">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">District Code</th>
			      <th scope="col">District</th>
			      <th scope="col">Conces</th>
			      <th scope="col" colspan="2">Opsi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no = 1 ?>
			  	<?php foreach ($updatedistrict as $ud) { ?>
			    <tr>
			      <th scope="row"><?php echo $no; ?></th>
			      <td><?php echo $ud['District_Code']; ?></td>
			      <td><?php echo $ud['District']; ?></td>
			      <td><?php echo $ud['Conces']; ?></td>
			      <td><a href="<?php echo base_url().'C_klaten/updatedistrict/'.$ud['District_Code'] ?>" class="card-link fas fa-edit" style="font-size:15px;"></a></td>
			      <td><a href="<?php echo base_url().'C_klaten/hapusdistrict/'.$ud['District_Code'] ?>" class="card-link fas fa-trash" style="font-size:15px;"></a></td>
			    </tr>
			    <?php $no++; ?>
				<?php } ?>
				<tr>
					<td colspan="8"><a class="btn btn-dark" style="width: 100%" href="<?php echo base_url().'C_klaten/savedistrict' ?>">Tambah</a></td>
				</tr>
			   </tbody>
			</table>
		</div>
	</div>
</div>
<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->