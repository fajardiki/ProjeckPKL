<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Jogja/V_navbarjogja'); ?>
<!-- Akhir -->
<div class="container-fluid" style="margin-top: 20px;">

    <!-- tanggal -->
    <div class="row m-1 mt-4">
      <div class="col-sm-8"></div>
      <div class="col-sm-4 form-group">
        <div class="mb-1">
          <form class="input-group" action="<?php echo base_url().'C_jogja/timeselect' ?>" method="post">
            <input type="month" class="form-control border border-secondary" name="tanggal">
            <div class="input-group-append">
              <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
    	<div class="col-lg-12">
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

    function secondsTimeSpanToHMS(s) {
        var h = Math.floor(s / 3600); //Get whole hours
        s -= h * 3600;
        var m = Math.floor(s / 60); //Get remaining minutes
        s -= m * 60;
        return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on tes and seconds
    }
    </script>
</div>
<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->