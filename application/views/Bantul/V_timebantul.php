<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <style>
        body {
          font-family: 'Lato', sans-serif;
        }
    </style>
</head>
<body>
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
<div class="row">
	<div class="col-lg-12"
		<h1>TIME<small> Start Time</small></h1>    
	 </div>
</div>
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

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>