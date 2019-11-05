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
				  <?php foreach ($efosall as $ea) { 
				  		$week = $ea['Week'];
				  		$pjpcom = intval($ea['PJP_COMPLY']);
				  		$prodcall = intval($ea['PRODUCTIVE_CALL']);
				  		$geomatch = intval($ea['GEOMATCH']);
				  		$timar = $ea['TimeInMarket'];
						$spent = $ea['Spent'];
						$tilet = $ea['TimePerOutlet'];
						$nosale = $ea['Nosale'];
						$Noper = intval($ea['NosalePersen']);
						$Tosale = number_format($ea['TotalSale'],2,',','.');

				  ?>
				  <tbody>
				    <tr>
				      <th><?php echo $week; ?></th>
				      <!-- Pjp comply -->
				      <?php if ($pjpcom < 95) { ?>
				      	<td class="min"><?php echo $pjpcom.'%'; ?></td>
				      <?php } else { ?>
				      	<td><?php echo $pjpcom.'%'; ?></td>
				      <?php } ?>

				      <!-- Productive call -->
				      <?php if ($prodcall < 85 ) { ?>
				      	<td class="min"><?php echo $prodcall.'%'; ?></td>
				      <?php } else { ?>
				      	<td><?php echo $prodcall.'%'; ?></td>
				      <?php } ?>

				      <!-- Geo Mismatch -->
				      <?php if ($geomatch < 95 ) { ?>
				      	<td class="min"><?php echo $geomatch.'%'; ?></td>
				      <?php } else { ?>
				      	<td><?php echo $geomatch.'%'; ?></td>
				      <?php } ?>
				      
				      
				      <td><?php echo $timar; ?></td>
				      <td><?php echo $spent ?></td>
				      <!-- Time Per Outlet -->
				      <?php
				      	$sekon = seconds_from_time($tilet);
				       if ($sekon < 480 ) { ?>
				      	<td class="min"><?php echo $tilet; ?></td>
				      <?php } else { ?>
				      	<td><?php echo $tilet; ?></td>
				      <?php } ?>

				      <td><?php echo $nosale ?></td>
				      <!-- Geo Mismatch -->
				      <?php if ($Noper > 10 ) { ?>
				      	<td class="min"><?php echo $Noper.'%'; ?></td>
				      <?php } else { ?>
				      	<td><?php echo $Noper.'%'; ?></td>
				      <?php } ?>

				      <td><?php echo $Tosale; ?></td>
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

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer