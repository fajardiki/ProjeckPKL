<?php $nama = $this->session->userdata('user'); ?>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('V_navbarsales'); ?>
<!-- Akhir -->

<div class="jumbotron jumbotron-fluid mb-1" style="margin: 0; padding: 0; text-align: center; height: 50px;">
    <h1 class="lead pt-3">EFOS Sales</h1>
</div>

<form class="input-group mb-2" action="<?php echo base_url().'C_dasbord/efosallselect' ?>" method="post">
  <input type="month" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
  </div>
</form>

<section class="mb-2" align="right">
  <a class="btn btn-danger" id="cetak" id='btn' value='Print' onclick='printSal()'><i class="fa fa-print"></i> Print Efos</a>
</section>

<section style="overflow-x: scroll; margin-bottom: 10%;">	
  <section id="printArea2">
    <section id="head2" hidden="true">
      <h2 class="h2" align="center">EFOS Minggu <?php echo $efossales[0]['Week']; ?></h2>
      <h3 class="h3" align="center">Tahun <?php echo $efossales[0]['Year']; ?></h3>
      <h5 class="h5" align="left">Nama : <?php echo $nama[0]['Salesman']; ?></h5>
    </section>
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
      <?php foreach ($efossales as $ea) { 
        $week = $ea['Week'];
        $pjpcom = intval($ea['PJP_COMPLY']).'%';
        $prodcall = intval($ea['PRODUCTIVE_CALL']).'%';
        $geomatch = intval($ea['GEOMATCH']).'%';
        $timar = $ea['TimeInMarket'];
        $spent = $ea['Spent'];
        $tilet = $ea['TimePerOutlet'];
        $nosale = $ea['Nosale'];
        $Noper = intval($ea['NosalePersen']).'%';
        $Tosale = number_format($ea['TotalSale'],2,',','.');
        $pjpplane = $ea['pjp_planned'];
        $pjpunplane = $ea['pjp_unplaned'];
        $pjpproductive = $ea['pjp_productive'];
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
    <section id="foot2" hidden="true">
      <p class="foot2">* Warna <span id="merah"><i>merah</i></span> berarti target tidak tercapai</p>
    </section>
  </section>
</section>

<script>
  function printSal()  {
    var head2 = document.getElementById('head2');
    var foot2 = document.getElementById('foot2');
      var divToPrint2=document.getElementById('printArea2');

      var newWin2=window.open('','Print-Window');

      newWin2.document.open();

      newWin2.document.write('<html><head><style> #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .bg-dark {background-color: #2e2828;color: #fff;} .bg-danger {background-color: #cf4740;color: #fff;} .thead-dark {background-color: #2e2828; color: #fff;} .min {background-color: #CC0033;color: #fff;} table {  border-collapse: collapse;} table, th, td {  border: 1px solid black;} th, td {  padding: 15px;  text-align: left;} </style></head><body onload="window.print()">'+head2.innerHTML+divToPrint2.innerHTML+foot2.innerHTML+'</body></html>');

      newWin2.document.close();

      setTimeout(function(){newWin2.close();},10);
  }
</script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->