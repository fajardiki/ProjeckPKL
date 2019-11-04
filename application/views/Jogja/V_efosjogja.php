<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Jogja/V_navbarjogja'); ?>
<!-- Akhir -->
<div class="container-fluid mb-4">
	<!-- tanggal -->
    <div class="row m-1 mt-4">
      <div class="col-sm-8"></div>
      <div class="col-sm-4 form-group">
        <div class="mb-1">
          <form class="input-group" action="<?php echo base_url().'C_jogja/efosallselect' ?>" method="post">
            <input type="month" class="form-control border border-secondary" name="tanggal">
            <div class="input-group-append">
              <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
            </div>
          </form>
        </div>
      </div>
    </div>
	<div class="row">
		<div class="col-sm-12">
			<div class="container-fluid" style="overflow: scroll; margin: 2px;">
				<table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Week</th>
				      <th scope="col">PJB_Comply</th>
				      <th scope="col">Produktive_Call</th>
				      <th scope="col">Geo_Match</th>
				      <th scope="col">Time_In_Market</th>
				      <th scope="col">Spent_In_Market</th>
				      <th scope="col">Time_Per_Outlet</th>
				      <th scope="col">Outlet_Nosale</th>
				      <th scope="col">%Outlet_Nosale</th>
				      <th scope="col">Total_Penjualan</th>
				      <th scope="col">PJB_Planed</th>
				      <th scope="col">PJP_Unplaned</th>
				      <th scope="col">Productive_Call</th>
				    </tr>
				  </thead>
				  <?php foreach ($efosall as $ea) { ?>
				  <tbody>
				    <tr>
				      <th><?php echo $ea['Week']; ?></th>
				      <td id="pjp"><?php echo intval($ea['PJP_COMPLY']).'%'; ?></td>
				      <td><?php echo intval($ea['PRODUCTIVE_CALL']).'%'; ?></td>
				      <td><?php echo intval($ea['GEOMATCH']).'%'; ?></td>
				      <td><?php echo $ea['TimeInMarket']; ?></td>
				      <td><?php echo $ea['Spent']; ?></td>
				      <td><?php echo $ea['TimePerOutlet']; ?></td>
				      <td><?php echo $ea['Nosale']; ?></td>
				      <td><?php echo intval($ea['NosalePersen']).'%'; ?></td>
				      <td><?php echo number_format($ea['TotalSale'],2,',','.'); ?></td>
				      <td></td>
				      <td></td>
				      <td></td>
				    </tr>
					  </tbody>
				  <?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
	    var pjpcom = $("#pjp").text();
	    	alert(pjpcom-%);
	});
</script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->