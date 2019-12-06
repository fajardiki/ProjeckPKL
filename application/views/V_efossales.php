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
    <section id="head2" style="margin-bottom: 25px" hidden="true">
      <div class="row">
        <div class="col-sm-2 left" align="center">
          <img style="width: 160px;" src="<?php echo base_url().'assets/img/Walls_Logo.svg.png' ?>">
        </div>
        <div class="col-sm-8 center" align="center">
          <br>
          <?php if ($nama[0]['id_conces'] == '1'): ?>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h4>Jl. Munggur RT.08 RW.04 Bantulan Sidoarum Lodean Sleman</h4>
          <?php elseif ($nama[0]['id_conces'] == '2'): ?>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h4>Jl. Soekarno Hatta Nampik Bumirejo Mungkit Magelang 56512.</h4>
          <?php elseif ($nama[0]['id_conces'] == '3'): ?>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h4>Jl. Parangtritis Timbulharjo Sewon Bantul Jogjakarta 55186</h4>
          <?php else: ?>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h4>Desa Kurung Baru, Ceper Klaten 57465 </h4>
          <?php endif ?>
        </div>
        <div class="col-sm-2 right" align="center">
          <?php if ($nama[0]['id_conces'] == '1'): ?>
            <img style="width: 100px;" src="<?php echo base_url().'assets/img/CONCESSJOGJA.png' ?>">
          <?php elseif ($nama[0]['id_conces'] == '2'): ?>
            <img style="width: 175px;" src="<?php echo base_url().'assets/img/CONCESSMAGELANG.png' ?>">
          <?php elseif ($nama[0]['id_conces'] == '3'): ?>
            <img style="width: 118px;" src="<?php echo base_url().'assets/img/CONCESSBANTUL.png' ?>">
          <?php else: ?>
            <img style="width: 114px;" src="<?php echo base_url().'assets/img/CONCESSKLATEN.png' ?>">
          <?php endif ?>
        </div>
      </div>
    </section>
    <section id="namasales" hidden="true">
          <?php if ($nama[0]['id_conces'] == '1'): ?>
            <section align="center">
              <h3>Efos Jogja</h3>
            </section>
          <?php elseif ($nama[0]['id_conces'] == '2'): ?>
            <section align="center">
              <h3>Efos Magelang</h3>
            </section>
          <?php elseif ($nama[0]['id_conces'] == '3'): ?>
            <section align="center">
              <h3>Efos Bantul</h3>
            </section>
          <?php else: ?>
            <section align="center">
              <h3>Efos Klaten</h3>
            </section>
          <?php endif ?>
          <hr style="width: 150px; height: 1px;">
      <?php if (!empty($efossales)): ?>
        <p align="left" style="margin-bottom: 0">NAMA : <?php echo $nama[0]['Salesman']; ?> | MINGGU : <?php echo $efossales[0]['Week']; ?> | TAHUN : <?php echo $efossales[0]['Year']; ?></p>
      <?php endif ?>
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
      var namasales = document.getElementById('namasales');
      var foot2 = document.getElementById('foot2');
      var divToPrint2=document.getElementById('printArea2');

      var newWin2=window.open('','Print-Window');

      newWin2.document.open();

      newWin2.document.write('<html><head><style> .left {position: absolute; top: 0; left: 0; margin-left:50px;} .right {position: absolute; right: 0; top: 0; margin-right: 50px;} #merah {color:#CC0033} #head {padding: 0; margin: 0; margin-bottom: 30px;} body {font-family: cambria;} .bg-dark {background-color: #2e2828;color: #fff;} .bg-danger {background-color: #cf4740;color: #fff;} .thead-dark {background-color: #2e2828; color: #fff;} .min {background-color: #CC0033;color: #fff;} table {  border-collapse: collapse;} table, th, td {  border: 1px solid black;} th, td {  padding: 15px;  text-align: left;} </style> </head><body onload="window.print()">'+head2.innerHTML+"<hr>"+namasales.innerHTML+divToPrint2.innerHTML+foot2.innerHTML+'</body></html>');

      newWin2.document.close();

      setTimeout(function(){newWin2.close();},10);
  }
</script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->