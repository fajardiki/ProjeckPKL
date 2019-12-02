

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
  <a class="btn btn-danger" id="cetak" id='btn' value='Print' onclick='printDiv();'><i class="fa fa-print"></i> Print Summary</a>
</section>

<section style="overflow-x: scroll; height: 350px;">
  <section id="printArea">
      <section id="head" hidden="true">
        <h2 class="h2" align="center">Summary Tahun <?php echo $summaryj[0]['Year']; ?></h2>
      </section>
      <table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 9px; margin: auto;">
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
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo intval($smj['pjp_comply']).'%' ?></td>
            <?php } ?> 
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo intval($smj['NosalePersen']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo intval($smj['Productive_Call']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summaryj as $smj) { ?>
              <td><?php echo "Rp " . number_format($smj['Total_Sale'],2,',','.') ?></td>
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
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo intval($smm['pjp_comply']).'%' ?></td>
            <?php } ?> 
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo intval($smm['NosalePersen']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo intval($smm['Productive_Call']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summarym as $smm) { ?>
              <td><?php echo "Rp " . number_format($smm['Total_Sale'],2,',','.') ?></td>
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
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo intval($smb['pjp_comply']).'%' ?></td>
            <?php } ?> 
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo intval($smb['NosalePersen']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo intval($smb['Productive_Call']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summaryb as $smb) { ?>
              <td><?php echo "Rp " . number_format($smb['Total_Sale'],2,',','.') ?></td>
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
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">PJP-Comply</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo intval($smk['pjp_comply']).'%' ?></td>
            <?php } ?> 
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">No-Sale</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo intval($smk['NosalePersen']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Productive-Call</th>
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo intval($smk['Productive_Call']).'%' ?></td>
            <?php } ?>
          </tr>
          <tr>
            <th scope="col" class="bg-dark" style="color: #fff;">Total Penjualan</th> 
            <?php foreach ($summaryk as $smk) { ?>
              <td><?php echo "Rp " . number_format($smk['Total_Sale'],2,',','.') ?></td>
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
  <a class="btn btn-danger" id="cetak" id='btn' value='Print' onclick='printSal()'><i class="fa fa-print"></i> Print Summary</a>
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
    <section id="head2" hidden="true">
      <h2 class="h2" align="center">Summary Minggu <?php echo $summary[0]['Week']; ?></h2>
      <h3 class="h3" align="center">Tahun <?php echo $summary[0]['Year']; ?></h3>
      <h5 class="h5" align="left">Nama : <?php echo $nama[0]['Salesman']; ?></h5>
    </section>
    <table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
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

      newWin.document.write('<html><head><style> #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .bg-dark {background-color: #2e2828;color: #fff;} .bg-danger {background-color: #cf4740;color: #fff;} .thead-dark {background-color: #2e2828; color: #fff;} .min {background-color: #CC0033;color: #fff;} table {  border-collapse: collapse;} table, th, td {  border: 1px solid black;} th, td {  padding: 15px;  text-align: left;}</style></head><body onload="window.print()">'+head.innerHTML+divToPrint.innerHTML+foot.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);
  }

  function printSal()  {
    var head2 = document.getElementById('head2');
    var foot2 = document.getElementById('foot2');
      var divToPrint2=document.getElementById('printArea2');

      var newWin2=window.open('','Print-Window');

      newWin2.document.open();

      newWin2.document.write('<html><head><style> #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .bg-dark {background-color: #2e2828;color: #fff;} .bg-danger {background-color: #cf4740;color: #fff;} .thead-dark {background-color: #2e2828; color: #fff;} .min {background-color: #CC0033;color: #fff;} table {  border-collapse: collapse;} table, th, td {  border: 1px solid black;} th, td {  padding: 15px;  text-align: left;} .h5, .foot2 {margin-left: 20px;}</style></head><body onload="window.print()">'+head2.innerHTML+divToPrint2.innerHTML+foot2.innerHTML+'</body></html>');

      newWin2.document.close();

      setTimeout(function(){newWin2.close();},10);
  }

 </script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->