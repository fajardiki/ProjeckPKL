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
		<div class="col" align="center" style="margin: 15px; padding: 15px; background-color: #cccccc;">
			<h3>EFOS ADMM Group 2019</h3>
		</div>
	</div>
	

	<br>
	
	<!-- Grafik Planed -->
	<?php if (empty($plane)) { ?>
		<div id="shadow1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
		<script>
			Highcharts.chart('shadow1', {
		    title: {
		        text: 'Diagram Planned - Produktive - Nosale'
		    },
		    xAxis: {
		        categories: ['1', '2', '3', '4'],
		        title: {
			        text: 'Week'
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
		        name: 'Planned',
		        data: [5, 5, 5, 5,]
		    }, {
		        type: 'column',
		        name: 'Productive',
		        data: [5, 5, 5, 5]
		    }, {
		        type: 'spline',
		        name: 'Nosale',
		        data: [3, 3, 3, 3],
		        marker: {
		            lineWidth: 2,
		            lineColor: Highcharts.getOptions().colors[3],
		            fillColor: 'white'
		        }
		    }]
		});

		</script>

	<?php } else { ?>

		<?php foreach ($plane as $p) {
			$conces[] = $p['Conces'];
			$planed[] = intval($p['Planned']);
			$productive[] = intval($p['Productive']);
			$nosale[] = intval($p['Nosale']);
		} ?>  


		<div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script>
			Highcharts.chart('graft1', {
		    title: {
		        text: 'Diagram Planned - Produktive - Nosale'
		    },
		    xAxis: {
		        categories: <?php echo json_encode($conces); ?>,
		        title: {
			        text: 'Week'
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
	<?php } ?>

	<!-- Akhir Grafik Planed -->

	<br><br>

	<!-- Grafik Time -->
	<?php if (empty($timemarket)) { ?>
		<div id="shadow2" style="min-width: 310px; height: 400px; margin-top: 50px; "></div>
		<script>
			Highcharts.chart('shadow2', {
			chart: {
		        backgroundColor: '#cccccc'
		    },
		    title: {
		        text: 'Diagram TimeInMarket - Spent - TimePerOutlet'
		    },
		    xAxis: {
		        categories: ['1', '2', '3', '4'],
		        title: {
			        text: 'Week'
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
		        name: 'TimeInMarket',
		        data: [5, 5, 5, 5]
		    }, {
		        type: 'column',
		        name: 'Spent',
		        data: [5, 5, 5, 5]
		    }, {
		        type: 'spline',
		        name: 'TimePerOutlet',
		        data: [3, 3, 3, 3],
		        marker: {
		            lineWidth: 2,
		            lineColor: Highcharts.getOptions().colors[3],
		            fillColor: 'white'
		        }
		    }]
		});

		</script>

	<?php } else { ?>

		<?php foreach ($timemarket as $tm) {
			$conces1[] = $tm['Conces'];
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
		        backgroundColor: '#cccccc'
		    },
		    title: {
		        text: 'Diagram TimeInMarket - Spent - TimePerOutlet'
		    },
		    xAxis: {
		        categories: <?php echo json_encode($conces1); ?>,
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
	<?php } ?>
	<!-- Akhir Grafik Time -->

	<br><br>

	<!-- Grafik PJP COMPLY -->
	<?php if (empty($pjpcomply)) { ?>
		<div id="shadow3" style="min-width: 310px; height: 400px; margin-top: 50px;"></div>
		<script>
			Highcharts.chart('shadow3', {

		    title: {
		        text: 'Diagram PJP Comply - Geomatch - Productive Call'
		    },
		    xAxis: {
		        categories: ['1', '2', '3', '4'],
		        title: {
			        text: 'Week'
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
		        name: 'PJP_Comply',
		        data: [5, 5, 5, 5]
		    }, {
		        type: 'column',
		        name: 'Geomatch',
		        data: [5, 5, 5, 5]
		    }, {
		        type: 'spline',
		        name: 'Productive_call',
		        data: [3, 3, 3, 3],
		        marker: {
		            lineWidth: 2,
		            lineColor: Highcharts.getOptions().colors[3],
		            fillColor: 'white'
		        }
		    }]
		});

		</script>
	<?php } else { ?>
		<?php foreach ($pjpcomply as $pjp) {
			$conces2[] = $pjp['Conces'];
			$pjpcom[] = intval($pjp['PJP_COMPLY']);
			$geomath[] = intval($pjp['GEOMATCH']);
			$productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
		} ?>


		<div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script>
			Highcharts.chart('graft3', {
		    title: {
		        text: 'Diagram PJP Comply - Geomatch - Productive Call'
		    },
		    xAxis: {
		        categories: <?php echo json_encode($conces2); ?>,
		        title: {
			        text: 'Week'
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
	<?php } ?>
	<!-- Akhir Grafik PJP COMPLY -->
</div>
<!-- Akhir admin -->



<!-- Sales -->

<?php } elseif ($nama[0]['status']=='sales') { ?>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4" style=" font-size: 4vw;">Selamat datang <?php echo $nama[0]['Salesman']; ?></h1>
	    <p class="lead" style=" font-size: 2vw;">Ini adalah pencapaian anda minggu ini.</p>
	  </div>
	</div>
	
	<!-- Plane -->
	<?php if (empty($plane)) { ?>
		<div id="shadow1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
		<script>
			Highcharts.chart('shadow1', {
		    title: {
		        text: 'Diagram Planned - Produktive - Nosale'
		    },
		    xAxis: {
		        categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
		        data: [5, 5, 5, 5, 5, 5]
		    }, {
		        type: 'column',
		        name: 'Productive',
		        data: [5, 5, 5, 5, 5, 5]
		    }, {
		        type: 'spline',
		        name: 'Nosale',
		        data: [3, 3, 3, 3, 3, 3],
		        marker: {
		            lineWidth: 2,
		            lineColor: Highcharts.getOptions().colors[3],
		            fillColor: 'white'
		        }
		    }]
		});

		</script>
	<?php } else { ?>
		<?php foreach ($plane as $p) {
			$week = $p['Week'];
			$day[] = $p['Day'];
			$planed[] = intval($p['Planned']);
			$productive[] = intval($p['Productive']);
			$nosale[] = intval($p['Nosale']);
		} ?>  

		<?php $wk = "WEEK ke $week" ?>


		<div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>

		<script>
			Highcharts.chart('graft1', {
		    title: {
		        text: 'Diagram Planned - Produktive - Nosale'
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
	<?php }?>
	

	<!-- Akhir Plane -->

	<!-- Grafik Time -->
	<?php if (empty($timemarket)) { ?>
		<div id="shadow2" style="min-width: 310px; height: 400px; margin-top: 50px; "></div>
		<script>
			Highcharts.chart('shadow2', {
		    title: {
		        text: 'Diagram TimeInMarket - Spent - TimePerOutlet'
		    },
		    xAxis: {
		        categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
		        name: 'TimeInMarket',
		        data: [5, 5, 5, 5, 5, 5]
		    }, {
		        type: 'column',
		        name: 'Spent',
		        data: [5, 5, 5, 5, 5, 5]
		    }, {
		        type: 'spline',
		        name: 'TimePerOutlet',
		        data: [3, 3, 3, 3, 3, 3],
		        marker: {
		            lineWidth: 2,
		            lineColor: Highcharts.getOptions().colors[3],
		            fillColor: 'white'
		        }
		    }]
		});

		</script>
	<?php } else { ?>
		<?php foreach ($timemarket as $tm) {
			$week1[] = $tm['Week'];
			$day1[] = $tm['Day'];
			$timeinmarket[] = intval($tm['TimeInMarket']);
			$spent[] = intval($tm['Spent']);
			$timeperoutlet[] = intval($tm['TimePerOutlet']);
		} ?>

		<div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script>
			Highcharts.chart('graft2', {
		    title: {
		        text: 'Diagram TimeInMarket - Spent - TimePerOutlet'
		    },
		    xAxis: {
		        categories: <?php echo json_encode($day1); ?>
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
	<?php } ?>
	<!-- Akhir Grafik Time -->

	<!-- Grafik PJP COMPLY -->
	<?php if (empty($pjpcomply)) { ?>
		<div id="shadow3" style="min-width: 310px; height: 400px; margin-top: 50px;"></div>
		<script>
			Highcharts.chart('shadow3', {
		    title: {
		        text: 'Diagram PJP Comply - Geomatch - Productive Call'
		    },
		    xAxis: {
		        categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
		        name: 'PJP_Comply',
		        data: [5, 5, 5, 5, 5, 5]
		    }, {
		        type: 'column',
		        name: 'Geomatch',
		        data: [5, 5, 5, 5, 5, 5]
		    }, {
		        type: 'spline',
		        name: 'Productive_call',
		        data: [3, 3, 3, 3, 3, 3],
		        marker: {
		            lineWidth: 2,
		            lineColor: Highcharts.getOptions().colors[3],
		            fillColor: 'white'
		        }
		    }]
		});

		</script>
	<?php } else { ?>
		<?php foreach ($pjpcomply as $pjp) {
			$week2[] = $pjp['Week'];
			$day2[] = $pjp['Day'];
			$pjpcom[] = intval($pjp['PJP_COMPLY']);
			$geomath[] = intval($pjp['GEOMATCH']);
			$productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
		} ?>


		<div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script>
			Highcharts.chart('graft3', {
		    title: {
		        text: 'Diagram PJP Comply - Geomatch - Productive Call'
		    },
		    xAxis: {
		        categories: <?php echo json_encode($day2); ?>
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
	<?php } ?>
	<!-- Akhir Grafik PJP COMPLY -->

<?php } ?>
<!-- Akhir sales -->
</body>
</html>
