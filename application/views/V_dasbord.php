

<?php $nama = $this->session->userdata('user'); ?>
<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->


<!-- Conten -->

<!-- Admin -->
<?php if ($nama[0]['status']=='Admin' OR $nama[0]['status']=='Owner' OR $nama[0]['status']=='HRD') {?>

  <div class="col" align="center" style=" padding: 15px; background-color: #cccccc; margin-top: 50px;">
      <h3>EFOS ADMM Group <?php echo date('Y'); ?></h3>
  </div>

  <!-- tanggal -->
<!--   <div class="col-sm-4 form-group">
    <div class="mb-1">
      <form class="input-group" action="<?php echo base_url().'C_dasbord' ?>" method="post">
        <input type="month" class="form-control border border-secondary" name="tanggal">
        <div class="input-group-append">
        <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari">
        </div>
      </form>
    </div>
  </div> -->

  <!-- Sumary -->

  <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
    <?php if (!empty($summaryj)) { ?>
      <?php foreach ($summaryj as $s) {} ?>
        <h1 class="lead">Summary <?php echo $s['Year']; ?></h1>
      <?php } else { ?>
        <h1 class="lead">Summary..</h1>
    <?php } ?>                
  </div>

<section class="mb-2" align="right">
  <a class="btn btn-danger" id="cetak" id='btn' value='Print' onclick='printDiv();' style="min-width: 100%; width: 100%;"><i class="fa fa-print"></i></a>
</section>
<section class="tableFixHead" style="height: 400px;">
  <section id="printArea">
      <section id="head" style="margin-bottom: 50px;" hidden="true">
        <div class="row">
          <div class="col-sm-2 left" align="center">
            <img style="width: 160px;" src="<?php echo base_url().'assets/img/Walls_Logo.svg.png' ?>">
          </div>
          <div class="col-sm-8 center" align="center">
            <br>
            <?php if ($nama[0]['id_conces'] == '1'): ?>
              <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
              <h3>EFOS Concess Jogja</h3>
            <?php elseif ($nama[0]['id_conces'] == '2'): ?>
              <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
              <h3>EFOS Concess Magelang</h3>
            <?php elseif ($nama[0]['id_conces'] == '3'): ?>
              <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
              <h3>EFOS Concess Bantul</h3>
            <?php elseif ($nama[0]['id_conces'] == '4'): ?>
              <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
              <h3>EFOS Concess Klaten</h3>
            <?php else: ?>
              <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
              <h3>EFOS GROUP <?php echo $summaryj[0]['Year']; ?></h3>
            <?php endif ?>
          </div>
          <div class="col-sm-2 right" align="center">
            <?php if ($nama[0]['id_conces'] == '1'): ?>
              <img style="width: 100px;" src="<?php echo base_url().'assets/img/CONCESSSLEMAN.png' ?>">
            <?php elseif ($nama[0]['id_conces'] == '2'): ?>
              <img style="width: 175px;" src="<?php echo base_url().'assets/img/CONCESSMAGELANG.png' ?>">
            <?php elseif ($nama[0]['id_conces'] == '3'): ?>
              <img style="width: 118px;" src="<?php echo base_url().'assets/img/CONCESSBANTUL.png' ?>">
            <?php elseif ($nama[0]['id_conces'] == '4'): ?>
              <img style="width: 114px;" src="<?php echo base_url().'assets/img/CONCESSKLATEN.png' ?>">
            <?php else: ?>
              <img style="width: 200px;" src="<?php echo base_url().'assets/img/ADMMGROUP.png' ?>">
            <?php endif ?>
          </div>
        </div>
        <hr style="width: 100%; height: 1px;">
      </section>
      <table class="table table-bordered" style="max-width: 100%; width: 100%; height: auto; font-size: 9px; margin: auto;">
        <thead class="thead-dark">  
          <tr>
            <th scope="col">CONCESSIONAIRE</th>
            <?php foreach ($summaryj as $smj) { ?>
              <th><?php echo $smj['Month'] ?></th>
            <?php } ?>
          </tr>
        </thead>
        <?php if (!empty($summaryj) && !empty($summarym) && !empty($summaryb) && !empty($summaryk)) { ?>
        <tbody>
        <!-- Jogja -->
          <tr>
            <th class="bg-danger" style="color: #fff;" colspan="13"><?php echo $smj['Conces'] ?></th>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Planned</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo number_format($smj['Planned']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Un-planed</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo number_format($smj['Un_planed']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Visited</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo number_format($smj['Visited']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Start Time</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo $smj['Start_Time'] ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">End Time</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo $smj['End_Time'] ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Nosale</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo number_format($smj['Nosale']) ?></td>
            <?php } ?>
          </tr>

          <!-- PJP Comply -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summaryj as $smj) { 
              $pjpcomplyj = intval($smj['pjp_comply']);
            ?>
              <?php if ($pjpcomplyj < 95) { ?>
                <td class="min"><?php echo $pjpcomplyj. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $pjpcomplyj. '%' ?></td>
              <?php } ?>
            <?php } ?> 
          </tr>

          <!-- Nosale -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summaryj as $smj) { 
              $nosalepersenj = intval($smj['NosalePersen']);
            ?>
              <?php if ($nosalepersenj > 10) { ?>
                <td class="min"><?php echo $nosalepersenj. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $nosalepersenj.'%' ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <!-- Productive Call -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summaryj as $smj) { 
              $productivecallj = intval($smj['Productive_Call']);
            ?>
              <?php if ($productivecallj < 85 ) { ?>
                <td class="min"><?php echo $productivecallj.'%'; ?></td>
              <?php } else { ?>
                <td><?php echo $productivecallj.'%'; ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo "Rp " . number_format($smj['Total_Sale'],0,',','.') ?></td>
            <?php } ?>
          </tr>

        <!-- Magelang -->
          <tr>
            <?php foreach ($summarym as $smm) {} ?>
              <th class="bg-danger" style="color: #fff;" colspan="13"><?php echo $smm['Conces'] ?></th>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Planned</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo number_format($smm['Planned']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Un-planed</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo number_format($smm['Un_planed']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Visited</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo number_format($smm['Visited']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Start Time</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo $smm['Start_Time'] ?></td>
            <?php } ?>
            
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">End Time</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo $smm['End_Time'] ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Nosale</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo number_format($smm['Nosale']) ?></td>
            <?php } ?>
          </tr>

          <!-- PJP Comply -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summarym as $smm) { 
              $pjpcomplym = intval($smm['pjp_comply']);
            ?>
              <?php if ($pjpcomplym < 95) { ?>
                <td class="min"><?php echo $pjpcomplym. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $pjpcomplym. '%' ?></td>
              <?php } ?>
            <?php } ?> 
          </tr>

          <!-- Nosale -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summarym as $smm) { 
              $nosalepersenm = intval($smm['NosalePersen']);
            ?>
              <?php if ($nosalepersenm > 10) { ?>
                <td class="min"><?php echo $nosalepersenm. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $nosalepersenm.'%' ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <!-- Productive Call -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summarym as $smm) { 
              $productivecallm = intval($smm['Productive_Call']);
            ?>
              <?php if ($productivecallm < 85 ) { ?>
                <td class="min"><?php echo $productivecallm.'%'; ?></td>
              <?php } else { ?>
                <td><?php echo $productivecallm.'%'; ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo "Rp " . number_format($smm['Total_Sale'],0,',','.') ?></td>
            <?php } ?>
          </tr>

        <!-- Bantul -->
          <tr>
            <?php foreach ($summaryb as $smb) { }?>
              <th class="bg-danger" style="color: #fff;" colspan="13"><?php echo $smb['Conces'] ?></th>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Planned</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo number_format($smb['Planned']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Un-planed</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo number_format($smb['Un_planed']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Visited</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo number_format($smb['Visited']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Start Time</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo $smb['Start_Time'] ?></td>
            <?php } ?>
                    
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">End Time</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo $smb['End_Time'] ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Nosale</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo number_format($smb['Nosale']) ?></td>
            <?php } ?>
          </tr>

          <!-- PJP Comply -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summaryb as $smb) { 
              $pjpcomplyb = intval($smj['pjp_comply']);
            ?>
              <?php if ($pjpcomplyb < 95) { ?>
                <td class="min"><?php echo $pjpcomplyb. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $pjpcomplyb. '%' ?></td>
              <?php } ?>
            <?php } ?> 
          </tr>

          <!-- Nosale -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summaryb as $smb) { 
              $nosalepersenb = intval($smb['NosalePersen']);
            ?>
              <?php if ($nosalepersenb > 10) { ?>
                <td class="min"><?php echo $nosalepersenb. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $nosalepersenb.'%' ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <!-- Productive Call -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summaryb as $smb) { 
              $productivecallb = intval($smb['Productive_Call']);
            ?>
              <?php if ($productivecallb < 85 ) { ?>
                <td class="min"><?php echo $productivecallb.'%'; ?></td>
              <?php } else { ?>
                <td><?php echo $productivecallb.'%'; ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo "Rp " . number_format($smb['Total_Sale'],0,',','.') ?></td>
            <?php } ?>
          </tr>

        <!-- Klaten -->
          <tr>
            <?php foreach ($summaryk as $smk) { }?>
              <th class="bg-danger" style="color: #fff;" colspan="13"><?php echo $smk['Conces'] ?></th>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Planned</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo number_format($smk['Planned']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Un-planed</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo number_format($smk['Un_planed']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Visited</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo number_format($smk['Visited']) ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Start Time</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo $smk['Start_Time'] ?></td>
            <?php } ?>  
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">End Time</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo $smm['End_Time'] ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Nosale</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo number_format($smk['Nosale']) ?></td>
            <?php } ?>
          </tr>

          <!-- PJP Comply -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summaryk as $smk) { 
              $pjpcomplyk = intval($smk['pjp_comply']);
            ?>
              <?php if ($pjpcomplyk < 95) { ?>
                <td class="min"><?php echo $pjpcomplyk. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $pjpcomplyk. '%' ?></td>
              <?php } ?>
            <?php } ?> 
          </tr>

          <!-- Nosale -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summaryk as $smk) { 
              $nosalepersenk = intval($smk['NosalePersen']);
            ?>
              <?php if ($nosalepersenk > 10) { ?>
                <td class="min"><?php echo $nosalepersenk. '%' ?></td>
              <?php } else { ?>
                <td><?php echo $nosalepersenk.'%' ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <!-- Productive Call -->
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summaryk as $smk) { 
              $productivecallk = intval($smk['Productive_Call']);
            ?>
              <?php if ($productivecallk < 85 ) { ?>
                <td class="min"><?php echo $productivecallk.'%'; ?></td>
              <?php } else { ?>
                <td><?php echo $productivecallk.'%'; ?></td>
              <?php } ?>
            <?php } ?>
          </tr>

          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo "Rp " . number_format($smk['Total_Sale'],0,',','.') ?></td>
            <?php } ?>
          </tr>
        </tbody>
      <?php } else { ?>
        
      <?php } ?>
      </table>
      <section id="foot" hidden="true">
        <p>* Warna <span id="merah"><i>merah</i></span> berarti target tidak tercapai</p>
      </section>
  </section>
</section>

<!-- Grafik Planed -->
    <?php if (empty($plane)) { ?>

    <?php } else { ?>
      <div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
        <h1 class="lead">Planned - Produktive - Nosale</h1>
      </div>

      <?php foreach ($plane as $p) {
        $conces[] = $p['Conces'];
        $planed[] = intval($p['Planned']);
        $productive[] = intval($p['Productive']);
        $nosale[] = intval($p['Nosale']);
      } ?>  


      <div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

      <script>
        Highcharts.chart('graft1', {
          title: {
              text: ''
          },
          chart: {
             backgroundColor: ''
          },
          xAxis: {
              categories: <?php echo json_encode($conces); ?>,
              title: {
                text: ''
            }
          },
          yAxis: {
            title: {
                text: ''
            }
          },
          credits: {
              enabled: false
          },
          labels: {
              items: [{
                  style: {
                      left: '50px',
                      top: '18px',
                      color: ( // theme
                          Highcharts.defaultOptions.title.style &&
                          Highcharts.defaultOptions.title.style.color
                      ) || 'black'
                  }
              }]
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      formatter:function() {
                        return Highcharts.numberFormat(this.y,0);
                      }
                  }
              }
          },
          series: [{
              color: '',
              type: 'column',
              name: 'Planned',
              data: <?php echo json_encode($planed); ?>
          }, {
              color: '',
              type: 'column',
              name: 'Productive',
              data: <?php echo json_encode($productive); ?>
          }, {
              color: '',
              type: 'spline',
              name: 'Nosale',
              data: <?php echo json_encode($nosale); ?>,
              marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: ''
              }
          }]
      });
      </script>
    <?php } ?>

    <!-- Akhir Grafik Planed -->



<!-- Grafik Time -->
    <?php if (empty($timemarket)) { ?>

    <?php } else { ?>

      <div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
        <h1 class="lead">TimeInMarket - Spent - TimePerOutlet</h1>
      </div>

      <?php foreach ($timemarket as $tm) {
        $conces1[] = $tm['Conces'];
        $timeinmarket[] = intval($tm['TimeInMarket']);
        $spent[] = intval($tm['Spent']);
        $timeperoutlet[] = intval($tm['TimePerOutlet']);
      } ?>


      <div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

      <script>
        Highcharts.chart('graft2', {
        time: {
              timezone: 'Asia/Jakarta'
          },
          chart: {
             backgroundColor: ''
          },
          title: {
              text: ''
          },
          xAxis: {
              categories: <?php echo json_encode($conces1); ?>,
            title: {
                text: ''
            }
          },
          yAxis: {
              labels: {
                formatter: function() {
                    // show the labels as whole hours (3600000 milliseconds = 1 hour)
                    return Highcharts.numberFormat(this.value/3600)+'H';
                }
            },
            title: {
                text: ''
            },
            tickInterval: 3600 // number of milliseconds in one hour
          },
          credits: {
              enabled: false
          },
          plotOptions: {
            series: {
                  dataLabels: {
                      enabled: true,
                      formatter: function(){
                          return secondsTimeSpanToHMS(this.y);
                      }
                  },
                  enableMouseTracking: false
              }
          },
          labels: {
              items: [{
                  style: {
                      left: '50px',
                      top: '18px',
                      color: ( // theme
                          Highcharts.defaultOptions.title.style &&
                          Highcharts.defaultOptions.title.style.color
                      ) || 'black'
                  }
              }]
          },
          series: [{
              color: '',
              type: 'column',
              name: 'Time In Market',
              data: <?php echo json_encode($timeinmarket); ?>
          }, {
              color: '',
              type: 'column',
              name: 'Spent',
              data: <?php echo json_encode($spent); ?>
          }, {
              color: '',
              type: 'spline',
              name: 'Time Per Outlet',
              data: <?php echo json_encode($timeperoutlet); ?>,
              marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: ''
              }
          }]
      });

      function secondsTimeSpanToHMS(s) {
        var h = Math.floor(s / 3600); //Get whole hours
        s -= h * 3600;
        var m = Math.floor(s / 60); //Get remaining minutes
        s -= m * 60;
        return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
    }
      </script>
    <?php } ?>
    <!-- Akhir Grafik Time -->

<!-- Grafik PJP COMPLY -->
    <?php if (empty($pjpcomply)) { ?>
      
    <?php } else { ?>
      <div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
        <h1 class="lead">PJP Comply - Geomatch - Productive Call</h1>
      </div>

      <?php foreach ($pjpcomply as $pjp) {
        $conces2[] = $pjp['Conces'];
        $pjpcom[] = intval($pjp['PJP_COMPLY']);
        $geomath[] = intval($pjp['GEOMATCH']);
        $productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
      } ?>


      <div id="graft3" style="min-width: 310px; height: 400px; margin-bottom: 50px;"></div>

      <script>
        Highcharts.chart('graft3', {
          title: {
              text: ''
          },
          chart: {
             backgroundColor: ''
          },
          xAxis: {
              categories: <?php echo json_encode($conces2); ?>,
              title: {
                text: ''
            }
          },
          yAxis: {
            title: {
                text: ''
            }
          },
          credits: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      format: '{point.y:.1f}%'
                  }
              }
          },
          labels: {
              items: [{
                  style: {
                      left: '50px',
                      top: '18px',
                      color: ( // theme
                          Highcharts.defaultOptions.title.style &&
                          Highcharts.defaultOptions.title.style.color
                      ) || 'black'
                  }
              }]
          },
          credits: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      format: '{point.y:.1f}%'
                  }
              }
          },
          series: [{
              color: '',
              type: 'column',
              name: 'PJP_Comply',
              data: <?php echo json_encode($pjpcom); ?>
          }, {
              color: '',
              type: 'column',
              name: 'Geomatch',
              data: <?php echo json_encode($geomath); ?>
          }, {
              color: '',
              type: 'spline',
              name: 'Productive_call',
              data: <?php echo json_encode($productive_call); ?>,
              marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: ''
              }
          }]
      });
      </script>
    <?php } ?>
    <!-- Akhir Grafik PJP COMPLY -->

<!-- Akhir admin -->





<!-- Sales -->
<?php } elseif ($nama[0]['status']=='sales') { ?>

<div class="jumbotron jumbotron-fluid" style="margin-top: 60px; text-align: center;">
  <h1 class="display-4" style=" font-size: 4vw;">Selamat datang <?php echo $nama[0]['Salesman']; ?></h1>
  <p class="lead" style=" font-size: 2vw;">Ini adalah pencapaian anda 2 minggu ini.</p>
</div>

<form class="input-group mb-2" action="<?php echo base_url().'C_dasbord' ?>" method="post">
  <input type="week" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari">
  </div>
</form>

<!-- Summry -->

<section class="mb-2" align="right">
  <a class="btn btn-danger" id="cetak" id='btn' value='Print' onclick='printSal()' style="min-width: 100%; width: 100%;"><i class="fa fa-print"></i></a>
</section>

<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
    <?php if (!empty($summary)) { ?>
      <?php foreach ($summary as $s) {} ?>
      <h1 class="lead">Summary week <?php echo $s['Week']; ?>, <?php echo $s['Year']; ?></h1>
    <?php } else { ?>
      <h1 class="lead">Summary ...</h1>
    <?php } ?>                
</div>
<section style="overflow-x: scroll; height: 300px; margin-bottom: 2px;">
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
            <h3>EFOS Concess Jogja</h3>
          <?php elseif ($nama[0]['id_conces'] == '2'): ?>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h3>EFOS Concess Magelang</h3>
          <?php elseif ($nama[0]['id_conces'] == '3'): ?>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h3>EFOS Concess Bantul</h3>
          <?php else: ?>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h3>EFOS Concess Klaten</h3>
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
      <hr style="width: 100%; height: 1px;">
    </section>
    <section id="namasales" hidden="true">
        <?php if ($nama[0]['id_conces'] == '1'): ?>
            <section align="center">
              <h3>Summary Jogja</h3>
            </section>
          <?php elseif ($nama[0]['id_conces'] == '2'): ?>
            <section align="center">
              <h3>Summary Magelang</h3>
            </section>
          <?php elseif ($nama[0]['id_conces'] == '3'): ?>
            <section align="center">
              <h3>Summary Bantul</h3>
            </section>
          <?php else: ?>
            <section align="center">
              <h3>Summary Klaten</h3>
            </section>
          <?php endif ?>
          <hr style="width: 200px; height: 1px;">
        <?php if (!empty($summary)): ?>
          <p align="left" style="margin-bottom: 0;">NAMA : <?php echo $nama[0]['Salesman']; ?> | MINGGU : <?php echo $summary[0]['Week']; ?> | TAHUN : <?php echo $summary[0]['Year']; ?></p>
        <?php endif ?>
    </section>
    <table class="table table-bordered" style="max-width: 100%; width: 100%; height: auto; font-size: 11px; margin: auto;">
      <thead class="thead-dark" align="center" style="padding: 0; margin: 0;">  
        <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Planned</th>
          <th scope="col">Un-planed</th>
          <th scope="col">Visited</th>
          <th scope="col">Start Time</th>
          <th scope="col">End Time</th>
          <th scope="col">Nosale</th>
          <th scope="col">PJP-Comply</th>
          <th scope="col">No-Sale</th>
          <th scope="col">Productive-Call</th>
          <th scope="col">Total Penjualan</th>  
        </tr>
      </thead>
    <?php if (!empty($summary)) { ?>
      <?php foreach ($summary as $sm) { 
        $days = $sm['Day'];
        $planneds = number_format($sm['Planned']);
        $unplanneds = number_format($sm['Un_planed']);
        $visiteds = number_format($sm['Visited']);
        $stattimes = $sm['Start_Time'];
        $endtimes = $sm['End_Time'];
        $nosales = number_format($sm['Nosale']);
        $pjpcomplys = intval($sm['pjp_comply']);
        $nosalepersens = intval($sm['NosalePersen']);
        $productivecalls = intval($sm['Productive_Call']);
        $totalsales = number_format($sm['Total_Sale'],2,',','.');
      ?>
      <tbody>
        <tr>
          <td><?php echo $days ?></td>
          <td><?php echo $planneds ?></td>
          <td><?php echo $unplanneds ?></td>
          <td><?php echo $visiteds ?></td>
          <td><?php echo $stattimes ?></td>
          <td><?php echo $endtimes ?></td>
          <td><?php echo $nosales ?></td>
                    
          <!-- Pjp comply -->
          <?php if ($pjpcomplys < 95) { ?>
            <td class="min"><?php echo $pjpcomplys. '%' ?></td>
          <?php } else { ?>
            <td><?php echo $pjpcomplys. '%' ?></td>
          <?php } ?>

          <!-- Nosale percent -->
          <?php if ($nosalepersens > 10) { ?>
            <td class="min"><?php echo $nosalepersens. '%' ?></td>
          <?php } else { ?>
            <td><?php echo $nosalepersens.'%' ?></td>
          <?php } ?>

          <!-- Productive call -->
          <?php if ($productivecalls < 85 ) { ?>
            <td class="min"><?php echo $productivecalls.'%'; ?></td>
          <?php } else { ?>
            <td><?php echo $productivecalls.'%'; ?></td>
          <?php } ?>

          <td><?php echo "Rp " .$totalsales ?></td>
        </tr>
      </tbody>
      <?php } ?>
    <?php } else { ?>

    <?php } ?>
    </table>
    <section id="foot2" hidden="true">
      <p class="foot2">* Warna <span id="merah"><i>merah</i></span> berarti target tidak tercapai</p>
    </section>
  </section>
</section>

<!-- Plane -->
<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
    <h1 class="lead">Planned - Produktive - Nosale</h1>
</div>

<div class="row">
  <div class="col-sm-6">
    <?php if (empty($plane)) { ?>
      <div id="shadow1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>

      <script>
        Highcharts.chart('shadow1', {
        title: {
          text: ''
        },
        chart: {
           backgroundColor: ''
        },
        subtitle: {
          text: 'Minggu ke ' + <?php echo date('W')-2; ?> + ' belum ada pencapaian'
        },
        xAxis: {
          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        },
        yAxis: {
          title: {
            text: ''
          }
        },
        credits: {
          enabled: false
        },
        labels: {
          items: [{
            style: {
              left: '50px',
              top: '18px',
                color: ( // theme
                  Highcharts.defaultOptions.title.style &&
                  Highcharts.defaultOptions.title.style.color
              ) || 'black'
            }
          }]
        },
        series: [{
          type: 'column',
          name: 'Planned',
          data: [5, 5, 5, 5, 5, 5]
        }, {
          type: 'column',
          name: 'Productive',
          data: [5, 5, 5, 5, 5, 5]
        }, {
          type: 'spline',
          name: 'Nosale',
          data: [3, 3, 3, 3, 3, 3],
          marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
          }
        }]
      });

      </script>

    <?php } else { ?>
      <?php foreach ($plane as $p) {
        $day[] = $p['Day'];
        $planed[] = intval($p['Planned']);
        $productive[] = intval($p['Productive']);
        $nosale[] = intval($p['Nosale']);
      } ?>  

      <div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
      <script>
        Highcharts.chart('graft1', {
            title: {
              text: ''
            },
            chart: {
               backgroundColor: ''
            },
            subtitle: {
              text: 'Minggu Ke ' + <?php echo $p['Week']; ?>
            },
            xAxis: {
              categories: <?php echo json_encode($day); ?>
            },
            yAxis: {
              title: {
                text: ''
              }
            },
            credits: {
              enabled: false
            },
            labels: {
              items: [{
                style: {
                  left: '50px',
                  top: '18px',
                  color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                  ) || 'black'
                }
              }]
            },
            plotOptions: {
              series: {
                borderWidth: 0,
                  dataLabels: {
                    enabled: true,
                      formatter:function() {
                        return Highcharts.numberFormat(this.y,0);
                      }
                  }
              }
            },
            series: [{
              type: 'column',
              name: 'Planned',
                data: <?php echo json_encode($planed); ?>
              }, {
                type: 'column',
                name: 'Productive',
                data: <?php echo json_encode($productive); ?>
              }, {
                type: 'spline',
                name: 'Nosale',
                data: <?php echo json_encode($nosale); ?>,
                marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: 'white'
                }
              }]
            });
          </script>
        <?php }?>
      </div>
          <div class="col-sm-6">
              <?php if (empty($plane1)) { ?>
                  <div id="shadow11" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
                  <script>
                    Highcharts.chart('shadow11', {
                      title: {
                          text: ''
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-1; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      series: [{
                          type: 'column',
                          name: 'Planned',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'column',
                          name: 'Productive',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'spline',
                          name: 'Nosale',
                          data: [3, 3, 3, 3, 3, 3],
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });

                  </script>
                <?php } else { ?>
                  <?php foreach ($plane1 as $p1) {
                    $day1[] = $p1['Day'];
                    $planed1[] = intval($p1['Planned']);
                    $productive1[] = intval($p1['Productive']);
                    $nosale1[] = intval($p1['Nosale']);
                  } ?>  



                  <div id="graft11" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

                  <script>
                    Highcharts.chart('graft11', {
                      title: {
                          text: 'Diagram Planned - Produktive - Nosale'
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu Ke ' + <?php echo $p1['Week']; ?>
                      },
                      xAxis: {
                          categories: <?php echo json_encode($day1); ?>
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      plotOptions: {
                          series: {
                              borderWidth: 0,
                              dataLabels: {
                                  enabled: true,
                                  formatter:function() {
                                    return Highcharts.numberFormat(this.y,0);
                                  }
                              }
                          }
                      },
                      series: [{
                          type: 'column',
                          name: 'Planned',
                          data: <?php echo json_encode($planed1); ?>
                      }, {
                          type: 'column',
                          name: 'Productive',
                          data: <?php echo json_encode($productive1); ?>
                      }, {
                          type: 'spline',
                          name: 'Nosale',
                          data: <?php echo json_encode($nosale1); ?>,
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });
                  </script>
                <?php }?>
          </div>
      </div>
    <!-- Akhir Plane -->

    <!-- Grafik Time -->

    <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
      <h1 class="lead">TimeInMarket - Spent - TimePerOutlet</h1>
    </div>
    <div class="row">
          <div class="col-sm-6">
              <?php if (empty($timemarket)) { ?>
                  <div id="shadow2" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow2', {
                      title: {
                          text: ''
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-2; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      series: [{
                          type: 'column',
                          name: 'TimeInMarket',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'column',
                          name: 'Spent',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'spline',
                          name: 'TimePerOutlet',
                          data: [3, 3, 3, 3, 3, 3],
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });

                  </script>
                <?php } else { ?>
                  <?php foreach ($timemarket as $tm) {
                    $day1[] = $tm['Day'];
                    $timeinmarket[] = intval($tm['TimeInMarket']);
                    $spent[] = intval($tm['Spent']);
                    $timeperoutlet[] = intval($tm['TimePerOutlet']);
                  } ?>

                  <div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

                  <script>
                    Highcharts.chart('graft2', {
                      title: {
                          text: ''
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu Ke ' + <?php echo $tm['Week']; ?>
                      },
                      xAxis: {
                          categories: <?php echo json_encode($day1); ?>
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      plotOptions: {
                          series: {
                            dataLabels: {
                                enabled: true,
                                formatter: function(){
                                    return secondsTimeSpanToHMS(this.y);
                                }
                            },
                            enableMouseTracking: false
                          }
                      },
                      series: [{
                          type: 'column',
                          name: 'Time In Market',
                          data: <?php echo json_encode($timeinmarket); ?>
                      }, {
                          type: 'column',
                          name: 'Spent',
                          lineColor: Highcharts.getOptions().colors[2],
                          data: <?php echo json_encode($spent); ?>
                      }, {
                          type: 'spline',
                          name: 'Time Per Outlet',
                          data: <?php echo json_encode($timeperoutlet); ?>,
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });

                  function secondsTimeSpanToHMS(s) {
                    var h = Math.floor(s / 3600); //Get whole hours
                    s -= h * 3600;
                    var m = Math.floor(s / 60); //Get remaining minutes
                    s -= m * 60;
                    return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
                  }
                  </script>
              <?php } ?>
          </div>
          <div class="col-sm-6">
              <?php if (empty($timemarket1)) { ?>
                  <div id="shadow22" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow22', {
                      title: {
                          text: ''
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-1; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      series: [{
                          type: 'column',
                          name: 'TimeInMarket',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'column',
                          name: 'Spent',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'spline',
                          name: 'TimePerOutlet',
                          data: [3, 3, 3, 3, 3, 3],
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });

                  </script>
                <?php } else { ?>
                  <?php foreach ($timemarket1 as $tm1) {
                    $day1[] = $tm1['Day'];
                    $timeinmarket1[] = intval($tm1['TimeInMarket']);
                    $spent1[] = intval($tm1['Spent']);
                    $timeperoutlet1[] = intval($tm1['TimePerOutlet']);
                  } ?>

                  <div id="graft22" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

                  <script>
                    Highcharts.chart('graft22', {
                      title: {
                          text: ''
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu Ke ' + <?php echo $tm1['Week']; ?>
                      },
                      xAxis: {
                          categories: <?php echo json_encode($day1); ?>
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      plotOptions: {
                          series: {
                            dataLabels: {
                                enabled: true,
                                formatter: function(){
                                    return secondsTimeSpanToHMS(this.y);
                                }
                            },
                            enableMouseTracking: false
                        }
                      },
                      series: [{
                          type: 'column',
                          name: 'Time In Market',
                          data: <?php echo json_encode($timeinmarket1); ?>
                      }, {
                          type: 'column',
                          name: 'Spent',
                          lineColor: Highcharts.getOptions().colors[2],
                          data: <?php echo json_encode($spent1); ?>
                      }, {
                          type: 'spline',
                          name: 'Time Per Outlet',
                          data: <?php echo json_encode($timeperoutlet1); ?>,
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });

                  function secondsTimeSpanToHMS(s) {
                    var h = Math.floor(s / 3600); //Get whole hours
                    s -= h * 3600;
                    var m = Math.floor(s / 60); //Get remaining minutes
                    s -= m * 60;
                    return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
                  }
                  </script>
              <?php } ?>
          </div>
      </div>
    <!-- Akhir Grafik Time -->

    <!-- Grafik PJP COMPLY -->

      <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
            <h1 class="lead">PJP Comply - Geomatch - Productive Call</h1>
      </div>
      <div class="row" style="margin-bottom: 70px;">
          <div class="col-sm-6">
              <?php if (empty($pjpcomply)) { ?>
                  <div id="shadow3" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow3', {
                      title: {
                          text: ''
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-2; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      series: [{
                          type: 'column',
                          name: 'PJP_Comply',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'column',
                          name: 'Geomatch',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'spline',
                          name: 'Productive_call',
                          data: [3, 3, 3, 3, 3, 3],
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });

                  </script>
            <?php } else { ?>
                <?php foreach ($pjpcomply as $pjp) {
                $day2[] = $pjp['Day'];
                $pjpcom[] = intval($pjp['PJP_COMPLY']);
                $geomath[] = intval($pjp['GEOMATCH']);
                $productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
              } ?>


              <div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

              <script>
                Highcharts.chart('graft3', {
                  title: {
                      text: ''
                  },
                  chart: {
                     backgroundColor: ''
                  },
                  subtitle: {
                      text: 'Minggu Ke ' + <?php echo $pjp['Week']; ?>
                  },
                  xAxis: {
                      categories: <?php echo json_encode($day2); ?>
                  },
                  yAxis: {
                    title: {
                        text: ''
                    }
                  },
                  credits: {
                      enabled: false
                  },
                  labels: {
                      items: [{
                          style: {
                              left: '50px',
                              top: '18px',
                              color: ( // theme
                                  Highcharts.defaultOptions.title.style &&
                                  Highcharts.defaultOptions.title.style.color
                              ) || 'black'
                          }
                      }]
                  },
                  plotOptions: {
                      series: {
                          borderWidth: 0,
                          dataLabels: {
                              enabled: true,
                              format: '{point.y:.1f}%'
                          }
                      }
                  },
                  series: [{
                      type: 'column',
                      name: 'PJP_Comply',
                      data: <?php echo json_encode($pjpcom); ?>
                  }, {
                      type: 'column',
                      name: 'Geomatch',
                      data: <?php echo json_encode($geomath); ?>
                  }, {
                      type: 'spline',
                      name: 'Productive_call',
                      data: <?php echo json_encode($productive_call); ?>,
                      marker: {
                          lineWidth: 2,
                          lineColor: Highcharts.getOptions().colors[3],
                          fillColor: 'white'
                      }
                  }]
              });
              </script>
          <?php } ?>
          </div>
          <div class="col-sm-6">
              <?php if (empty($pjpcomply1)) { ?>
                  <div id="shadow33" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow33', {
                      title: {
                          text: ''
                      },
                      chart: {
                         backgroundColor: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-1; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                      },
                      yAxis: {
                        title: {
                            text: ''
                        }
                      },
                      credits: {
                          enabled: false
                      },
                      labels: {
                          items: [{
                              style: {
                                  left: '50px',
                                  top: '18px',
                                  color: ( // theme
                                      Highcharts.defaultOptions.title.style &&
                                      Highcharts.defaultOptions.title.style.color
                                  ) || 'black'
                              }
                          }]
                      },
                      series: [{
                          type: 'column',
                          name: 'PJP_Comply',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'column',
                          name: 'Geomatch',
                          data: [5, 5, 5, 5, 5, 5]
                      }, {
                          type: 'spline',
                          name: 'Productive_call',
                          data: [3, 3, 3, 3, 3, 3],
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });

                  </script>
            <?php } else { ?>
                <?php foreach ($pjpcomply1 as $pjp1) {
                $day1[] = $pjp1['Day'];
                $pjpcom1[] = intval($pjp1['PJP_COMPLY']);
                $geomath1[] = intval($pjp1['GEOMATCH']);
                $productive_call1[] = intval($pjp1['PRODUCTIVE_CALL']);
              } ?>


              <div id="graft33" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

              <script>
                Highcharts.chart('graft33', {
                  title: {
                      text: ''
                  },
                  chart: {
                     backgroundColor: ''
                  },
                  subtitle: {
                      text: 'Minggu Ke ' + <?php echo $pjp1['Week']; ?>
                  },
                  xAxis: {
                      categories: <?php echo json_encode($day1); ?>
                  },
                  yAxis: {
                    title: {
                        text: ''
                    }
                  },
                  credits: {
                      enabled: false
                  },
                  labels: {
                      items: [{
                          style: {
                              left: '50px',
                              top: '18px',
                              color: ( // theme
                                  Highcharts.defaultOptions.title.style &&
                                  Highcharts.defaultOptions.title.style.color
                              ) || 'black'
                          }
                      }]
                  },
                  plotOptions: {
                      series: {
                          borderWidth: 0,
                          dataLabels: {
                              enabled: true,
                              format: '{point.y:.1f}%'
                          }
                      }
                  },
                  series: [{
                      type: 'column',
                      name: 'PJP_Comply',
                      data: <?php echo json_encode($pjpcom1); ?>
                  }, {
                      type: 'column',
                      name: 'Geomatch',
                      data: <?php echo json_encode($geomath1); ?>
                  }, {
                      type: 'spline',
                      name: 'Productive_call',
                      data: <?php echo json_encode($productive_call1); ?>,
                      marker: {
                          lineWidth: 2,
                          lineColor: Highcharts.getOptions().colors[3],
                          fillColor: 'white'
                      }
                  }]
              });
              </script>
          <?php } ?>
          </div>
      </div>
    <!-- Akhir Grafik PJP COMPLY -->
  <!-- Akhir sales -->

  <?php } elseif ($nama[0]['status']=='Supervisor') { ?>

  <?php } elseif ($nama[0]['status']=='Operational Manager') { ?>

  <?php } ?>

<!-- Akhir Content -->

<script>
  function printDiv()  {
    var head = document.getElementById('head');
    var foot = document.getElementById('foot');
      var divToPrint=document.getElementById('printArea');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><head><style> .left {position: absolute; top: 0; left: 0; margin-left:50px;} .right {position: absolute; right: 0; top: 0; margin-right: 50px; margin-top: 10px;} #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .bg-dark {background-color: #2e2828;color: #fff;} .bg-danger {background-color: #cf4740;color: #fff;} .thead-dark {background-color: #2e2828; color: #fff;} .min {background-color: #CC0033;color: #fff;} table {  border-collapse: collapse;} table, th, td {  border: 1px solid black;} th, td {  padding: 15px;  text-align: left;}</style></head><body onload="window.print()">'+head.innerHTML+divToPrint.innerHTML+foot.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);
  }

  function printSal()  {
    var head2 = document.getElementById('head2');
    var namasales = document.getElementById('namasales');
    var foot2 = document.getElementById('foot2');
      var divToPrint2=document.getElementById('printArea2');

      var newWin2=window.open('','Print-Window');

      newWin2.document.open();

      newWin2.document.write('<html><head><style> .left {position: absolute; top: 0; left: 0; margin-left:10px;} .right {position: absolute; right: 0; top: 0; margin-right: 10px;} #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .bg-dark {background-color: #2e2828;color: #fff;} .bg-danger {background-color: #cf4740;color: #fff;} .thead-dark {background-color: #2e2828; color: #fff;} .min {background-color: #CC0033;color: #fff;} table {border-collapse: collapse;} table, th, td {  border: 1px solid black;} th, td {  padding: 15px;  text-align: left;}</style></head><body onload="window.print()">'+head2.innerHTML+namasales.innerHTML+divToPrint2.innerHTML+foot2.innerHTML+'</body></html>');

      newWin2.document.close();

      setTimeout(function(){newWin2.close();},10);
  }

 </script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->