<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Jogja/V_navbarjogja'); ?>
<!-- Akhir -->

<!-- tanggal -->
<div class="jumbotron jumbotron-fluid mb-1" style="margin: 0; padding: 0; text-align: center; height: 50px;">
    <h1 class="lead pt-3">Planned Jogja</h1>
</div>

<form class="input-group mb-2" action="<?php echo base_url().'C_jogja/planeselect' ?>" method="post">
  <input type="month" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
  </div>
</form>

<div id="grafik_plane" style="margin-bottom: 7%;"></div> 

    <?php foreach ($plane as $p) {
        $week[] = $p['Week'];
        $planed[] = intval($p['Planned']);
        $productive[] = intval($p['Productive']);
        $nosale[] = intval($p['Nosale']);
    } ?> 

    <script type="text/javascript">
    Highcharts.chart('grafik_plane', {
        title: {
            text: ''
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
                    format: '{point.y:.0f}'
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
<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->