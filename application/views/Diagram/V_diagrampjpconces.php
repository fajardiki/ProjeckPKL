<div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
	        <h1 class="lead">Diagram PJP Comply - Geomatch - Productive Call</h1>
	    </div>

		<?php foreach ($pjpcomply as $pjp) {
			$day2[] = $pjp['Day'];
			$month2[] = $pjp['month'];
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
		        categories: <?php echo json_encode($day2); ?>,
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
		                format: '{point.y:.0f}%'
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