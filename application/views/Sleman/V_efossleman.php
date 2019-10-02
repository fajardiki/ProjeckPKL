<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	          $('ul li a').click(function(){
	            $('li a').removeClass("active");
	            $(this).addClass("active");
	        });
	    });
	</script>
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

<!-- Navbar efos -->
<?php $this->load->view('Sleman/V_navbarsleman'); ?>
<!-- Akhir -->

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

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>