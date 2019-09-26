<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
</head>
<body>

<?php $nama = $this->session->userdata('user'); ?>

<!-- Admin -->
<div class="container-fluid">
	<?php if ($nama[0]['status']=='admin') {?>
	<div class="row">
		<div class="col-sm-12" align="center" style="margin: 15px;">
			<h3>EFOS ADMM Group 2019</h3>
		</div>
	</div>
	
	<!-- Grafik Planed -->

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
	        text: ''
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
	    plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:.1f}'
	            }
	        }
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

	<!-- Akhir Grafik Planed -->


	<!-- Grafik Time -->

	<?php foreach ($timemarket as $tm) {
		$week1[] = $tm['Week'];
		$timeinmarket[] = intval($tm['TimeInMarket']);
		$spent[] = intval($tm['Spent']);
		$timeperoutlet[] = intval($tm['TimePerOutlet']);
	} ?>

	<div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script>
		Highcharts.chart('graft2', {
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
	    plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:.1f}'
	            }
	        }
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
	</script>
	<!-- Akhir Grafik Time -->

	<!-- Grafik PJP COMPLY -->

	<?php foreach ($pjpcomply as $pjp) {
		$week2[] = $pjp['Week'];
		$pjpcom[] = intval($pjp['PJP_COMPLY']);
		$geomath[] = intval($pjp['GEOMATCH']);
		$productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
	} ?>


	<div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script>
		Highcharts.chart('graft3', {
	    title: {
	        text: 'EFOS ADMM Group 2019'
	    },
	    xAxis: {
	        categories: <?php echo json_encode($week2); ?>
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
	                format: '{point.y:.1f}%'
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
	<!-- Akhir Grafik PJP COMPLY -->
</div>
<!-- Akhir admin -->



<!-- Sales -->

<?php } elseif ($nama[0]['status']=='sales') { ?>
	
	<!-- Plane -->
	<?php foreach ($plane as $p) {
		$week = $p['Week'];
		$day[] = $p['Day'];
		$planed[] = intval($p['Planned']);
		$productive[] = intval($p['Productive']);
		$nosale[] = intval($p['Nosale']);
	} ?>  

	<?php $wk = "WEEK ke $week" ?>


	<div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script>
		Highcharts.chart('graft1', {
	    title: {
	        text: 'EFOS ADMM Group 2019 <?php echo $wk; ?>'
	    },
	    xAxis: {
	        categories: <?php echo json_encode($day); ?>
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
	                format: '{point.y:.1f}'
	            }
	        }
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

	<!-- Akhir Plane -->

	<!-- Grafik Time -->

	<?php foreach ($timemarket as $tm) {
		$week1[] = $tm['Week'];
		$timeinmarket[] = intval($tm['TimeInMarket']);
		$spent[] = intval($tm['Spent']);
		$timeperoutlet[] = intval($tm['TimePerOutlet']);
	} ?>

	<div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script>
		Highcharts.chart('graft2', {
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
	    plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:.1f}'
	            }
	        }
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
	</script>
	<!-- Akhir Grafik Time -->

	<!-- Grafik PJP COMPLY -->

	<?php foreach ($pjpcomply as $pjp) {
		$week2[] = $pjp['Week'];
		$pjpcom[] = intval($pjp['PJP_COMPLY']);
		$geomath[] = intval($pjp['GEOMATCH']);
		$productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
	} ?>


	<div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script>
		Highcharts.chart('graft3', {
	    title: {
	        text: 'EFOS ADMM Group 2019'
	    },
	    xAxis: {
	        categories: <?php echo json_encode($week2); ?>
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
	                format: '{point.y:.1f}%'
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
	<!-- Akhir Grafik PJP COMPLY -->

<?php } ?>
<!-- Akhir sales -->
</body>
</html>
