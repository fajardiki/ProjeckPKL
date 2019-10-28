<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Jogja/V_navbarjogja'); ?>
<!-- Akhir -->
<div class="container-fluid" style="margin-top: 20px;">
    <h1 class="mt-2" align="center" style="font-size: 3vw;">PLANE JOGJA</h1>
    <hr style="border: 1px solid; width: 10vw; margin-top: 0px; margin-bottom: 30px;">

    <form method="post" action="<?php echo base_url().'C_jogja/planeselect' ?>" class="mt-2 ml-2 mr-2 mb-2">
        <div class="row">
            <div class="col-sm-2">       
                <div class="form-group">
                    <select class="form-control mb-1" id="conces" name="bulan">
                      <option>-- Bulan --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">       
                <div class="form-group">
                    <select class="form-control mb-1" id="conces" name="tahun">
                      <option>-- Tahun --</option>
                      <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 2010; $x--) {
                      ?>
                      <option value="<?php echo $x ?>"><?php echo $x ?></option>
                      <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" name="cari">Cari</button>
            </div>
        </div>
    </form>

    <div class="row">
    	<div class="col-lg-12">
    		<div id="grafik_plane"></div> 
    	</div>
    </div>

    <?php foreach ($plane as $p) {
        $week[] = $p['Week'];
        $planed[] = intval($p['Planned']);
        $productive[] = intval($p['Productive']);
        $nosale[] = intval($p['Nosale']);
    } ?> 

    <script type="text/javascript">
    Highcharts.chart('grafik_plane', {
        title: {
            text: 'Diagram Plane'
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

    <br><br><br>
</div>
<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->