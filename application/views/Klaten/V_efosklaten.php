<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Klaten/V_navbarklaten'); ?>
<!-- Akhir -->

<div class="jumbotron jumbotron-fluid mb-1" style="margin: 0; padding: 0; text-align: center; height: 50px;">
    <h1 class="lead pt-3">EFOS Klaten</h1>
</div>

<form class="input-group mb-2" action="<?php echo base_url().'C_klaten/efosallselect' ?>" method="post">
  <input type="month" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
  </div>
</form>

<section class="mb-2" align="right">
  <a class="btn btn-danger" id="cetak" id='btn' value='Print' onclick='printDiv();' style="min-width: 100%; width: 100%;"><i class="fa fa-print"></i></a>
</section>

<section style="overflow-x: scroll; margin-bottom: 10%;">
  <section id="printArea">
        <section id="head" style="margin-bottom: 25px" hidden="true">
          <div class="row">
            <div class="col-sm-2 left" align="center">
              <img style="width: 130px;" src="<?php echo base_url().'assets/img/Walls_Logo.svg.png' ?>">
            </div>
            <div class="col-sm-8 center" align="center">
              <br>
              <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
              <h4>Desa Kurung Baru, Ceper Klaten 57465 </h4>
            </div>
            <div class="col-sm-2 right" align="center">
              <img style="width: 110px;" src="<?php echo base_url().'assets/img/CONCESSKLATEN.png' ?>">
            </div>
          </div>
        </section>
        <section id="namasales" hidden="true">
          <section align="center">
            <h3>Efos Klaten <?php echo $efosall[0]['month']; ?><?php echo $efosall[0]['year']; ?></h3>
          </section>
          <hr style="width: 200px; height: 1px; padding-top: 0;">
        </section>
    <table class="table table-bordered" style="max-width: 100%; width: 100%; height: auto; font-size: 11px; margin: auto;">
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
        $pjpplane = intval($ea['pjp_planned']);
        $pjpunplane = intval($ea['pjp_unplaned']);
        $pjpproductive = intval($ea['pjp_productive']);
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
          <td><?php echo $pjpplane; ?></td>
          <td><?php echo $pjpunplane; ?></td>
          <td><?php echo $pjpproductive; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <section id="foot" hidden="true">
      <p>* Warna <span id="merah"><i>merah</i></span> berarti target tidak tercapai</p>
    </section>
  </section>
</section>

<script>
  function printDiv()  {
      var head = document.getElementById('head');
      var namasales = document.getElementById('namasales');
      var foot = document.getElementById('foot');
      var divToPrint=document.getElementById('printArea');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><head><style> .left {position: absolute; top: 0; left: 0; margin-left:10px; margin-top: 20px;} .right {position: absolute; right: 0; top: 0; margin-right: 10px;} #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .thead-dark {background-color: #000;color: #fff;} .min {background-color: #CC0033;color: #fff;} table {  border-collapse: collapse;} table, th, td {  border: 1px solid black;} hr {height:1px;} th, td {  padding: 15px;  text-align: left;}</style></head><body onload="window.print()">'+head.innerHTML+"<hr>"+namasales.innerHTML+divToPrint.innerHTML+foot.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);
  }

 </script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->