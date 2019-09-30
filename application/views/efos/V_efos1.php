
	<div class="container-fluid" style="overflow: hidden; padding: 0;">
		<table class="table" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
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
		      <th class="table-dark"><?php echo $ea['Week']; ?></th>
		      <td><?php echo intval($ea['PJP_COMPLY']).'%'; ?></td>
		      <td><?php echo intval($ea['PRODUCTIVE_CALL']).'%'; ?></td>
		      <td><?php echo intval($ea['GEOMATCH']).'%'; ?></td>
		      <td><?php echo $ea['TimeInMarket']; ?></td>
		      <td><?php echo $ea['Spent']; ?></td>
		      <td><?php echo $ea['TimePerOutlet']; ?></td>
		      <td><?php echo $ea['Nosale']; ?></td>
		      <td><?php echo intval($ea['NosalePersen']).'%'; ?></td>
		      <td><?php echo number_format($ea['TotalSale'],2,',','.'); ?></td>
		    </tr>
		  </tbody>
		  <?php } ?>
		</table>
	</div>
