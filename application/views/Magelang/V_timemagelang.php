<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
<body style="font-family: cambria;">
<script type="text/javascript">
    $(document).ready(function(){
        $('ul li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Bantul/V_navbarbantul'); ?>
<!-- Akhir -->
<div class="container-fluid">
    <h1 class="mt-2" align="center" style="font-size: 4vw;">TIME MAGELANG</h1>
    <hr style="border: 1px solid; width: 20vw; margin-top: 0px; margin-bottom: 30px;">
    <form method="post" action="<?php echo base_url().'C_magelang/timeselect' ?>" class="mt-2 ml-5 mr-5 mb-2">
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
    	<div class="col-lg-12"
    		<div id="start_time"></div> 
    	</div>
    </div>
    <?php foreach ($timemarket as $tm) {
        $week[] = $tm['Week'];
        $timeinmarket[] = intval($tm['TimeInMarket']);
        $spent[] = intval($tm['Spent']);
        $timeperoutlet[] = intval($tm['TimePerOutlet']);
    } ?>
    <script type="">
    Highcharts.chart('start_time', {
        time: {
            timezone: 'Asia/Jakarta'
        },
        chart: {
            backgroundColor: '#cccccc'
        },
        title: {
            text: 'Diagram TimeInMarket - Spent - TimePerOutlet'
        },
        xAxis: {
            categories: <?php echo json_encode($week); ?>,
            title: {
                text: 'Week'
            }
        },
        yAxis: {
            labels: {
                formatter: function() {
                    // show the labels as whole hours (3600000 milliseconds = 1 hour)
                    return Highcharts.numberFormat(this.value/3600);
                }
            },
            title: {
                text: 'Hours'
            },
            tickInterval: 3600 // number of milliseconds in one hour
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
            name: 'Time In Market',
            data: <?php echo json_encode($timeinmarket); ?>
        }, {
            type: 'column',
            name: 'Spent',
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
    </script>
    <br><br><br>
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