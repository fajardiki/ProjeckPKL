<div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
		    <h1 class="lead">Diagram Planned - Produktive - Nosale</h1>
		</div>

		<?php foreach ($plane as $p) {
			$day[] = $p['Day'];
			$month[] = $p['month'];
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
		        categories: <?php echo json_encode($day); ?>,
		        title: {
			        text: ''
			    }
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