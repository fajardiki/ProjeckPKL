<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('V_navbarsales'); ?>
<!-- Akhir -->

<form class="input-group" action="<?php echo base_url().'C_dasbord/pjpselect' ?>" method="post">
  <input type="month" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
  </div>
</form>

<div id="grafik_pjp"></div> 

  <?php foreach ($pjpcomply as $pjp) {
    $week[] = $pjp['Week'];
    $pjpcom[] = intval($pjp['PJP_COMPLY']);
    $geomath[] = intval($pjp['GEOMATCH']);
    $productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
  } ?>

  <script>
  Highcharts.chart('grafik_pjp', {
      title: {
          text: 'Diagram PJP'
      },
        chart: {
             backgroundColor: ''
          },
      xAxis: {
          categories: <?php echo json_encode($week); ?>
      },
      yAxis: {
          title: {
              text: ''
          }
      },
      plotOptions: {
          series: {
              borderWidth: 0,
              dataLabels: {
                  enabled: true,
                  format: '{point.y:.0f}%'
              }
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

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->