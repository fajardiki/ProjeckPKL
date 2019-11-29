<div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
	        <h1 class="lead">Diagram TimeInMarket - Spent - TimePerOutlet</h1>
	    </div>

		<?php foreach ($timemarket as $tm) {
			$day1[] = $tm['Day'];
			$month1[] = $tm['month'];
			$timeinmarket[] = intval($tm['TimeInMarket']);
			$spent[] = intval($tm['Spent']);
			$timeperoutlet[] = intval($tm['TimePerOutlet']);
		} ?>

		<div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script>
			Highcharts.chart('graft2', {
			time: {
		        timezone: 'Asia/Jakarta'
		    },
			chart: {
		        backgroundColor: ''
		    },
		    title: {
		        text: ''
		    },
		    xAxis: {
		        categories: <?php echo json_encode($day1); ?>,
			    title: {
			        text: ''
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
		        lineColor: Highcharts.getOptions().colors[2],
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