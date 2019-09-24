<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
</head>
<body>
<div class="container">

	<?php foreach ($plane as $p) {
		$week[] = $p['Week'];
		$planed[] = intval($p['Planned']);
		$productive[] = intval($p['Productive']);
		$nosale[] = intval($p['Nosale']);
	} ?>  


	<div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script>
		Highcharts.chart('graft1', {
	    title: {
	        text: 'EFOS ADMM Group 2019'
	    },
	    xAxis: {
	        categories: <?php echo json_encode($week); ?>
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
</div>
</body>
</html>
