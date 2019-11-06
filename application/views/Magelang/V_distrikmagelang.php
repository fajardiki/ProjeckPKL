<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<h1 class="mt-2" align="center" style="font-size: 4vw;">District Magelang</h1>
<hr style="border: 1px solid; width: 20vw; margin-top: 0px; margin-bottom: 30px;">

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
			      <td><a href="<?php echo base_url().'C_magelang/updatedistrict/'.$ud['District_Code'] ?>" class="card-link fas fa-edit" style="font-size:15px;"></a></td>
			      <td><a href="<?php echo base_url().'C_magelang/hapusdistrict/'.$ud['District_Code'] ?>" class="card-link fas fa-trash" style="font-size:15px;"></a></td>
			    </tr>
			    <?php $no++; ?>
				<?php } ?>
				<tr>
					<td colspan="8"><a class="btn btn-dark" style="width: 100%" href="<?php echo base_url().'C_magelang/savedistrict' ?>">Tambah</a></td>
				</tr>
			   </tbody>
			</table>


<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->