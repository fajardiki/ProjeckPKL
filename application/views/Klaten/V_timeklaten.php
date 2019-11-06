<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Klaten/V_navbarklaten'); ?>
<!-- Akhir -->

<div class="jumbotron jumbotron-fluid mb-1" style="margin: 0; padding: 0; text-align: center; height: 50px;">
    <h1 class="lead pt-3">Time In Market Klaten</h1>
</div>

<form class="input-group mb-2" action="<?php echo base_url().'C_klaten/timeselect' ?>" method="post">
  <input type="month" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
  </div>
</form>

<div id="start_time" style="margin-bottom: 7%;"></div> 

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
             backgroundColor: ''
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
                    return Highcharts.numberFormat(this.value/3600)+'H';
                }
            },
            title: {
                text: ''
            },
            tickInterval: 3600 // number of milliseconds in one hour
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
        return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
    }
    </script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->