<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/fontawesome.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/brands.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/solid.css' ?>">

	<script src="<?php echo base_url().'assets/js/highcharts.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/series-label.js'?>"></script>
	<<!-- script src="<?php echo base_url().'assets/js/exporting.js'?>"></script>  -->
</head>
<body style="font-family: cambria; height: 100%; background-color: #D3D3D3">
	<div id="printArea" class="container-fluid">
		<div class="row">
			<div class="col" align="center" style="margin: 15px; padding: 15px; background-color: #cccccc;">
				<h3><?php echo $sales[0]['Salesman']; ?></h3>
				<h6><?php echo $judul; ?></h6>
			</div>
		</div>

		<!-- Grafik Planed -->		
		<?php if (empty($plane)) { ?>

		<?php } else { ?>

			<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
	            <h1 class="lead">Diagram Planned - Produktive - Nosale</h1>
	        </div>

			<?php foreach ($plane as $p) {
				$month[] = $p['month'];
				$planed[] = intval($p['Planned']);
				$productive[] = intval($p['Productive']);
				$nosale[] = intval($p['Nosale']);
			} ?>  


			<div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

			<script>
				Highcharts.chart('graft1', {
				chart: {
			        backgroundColor: ''
			    },
			    responsive: {
				  rules: [{
				    condition: {
				      maxWidth: 100
				    },
				    chartOptions: {
				      legend: {
				        enabled: false
				      }
				    }
				  }]
				},
			    title: {
			        text: ''
			    },
			    xAxis: {
			        categories: <?php echo json_encode($month); ?>,
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
			    plotOptions: {
			        series: {
			            borderWidth: 0,
			            dataLabels: {
			                enabled: true,
			                format: '{point.y:.0f}'
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

		<!-- Grafik Time -->
		
		
		<?php if (empty($timemarket)) { ?>

		<?php } else { ?>

			<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
	            <h1 class="lead">Diagram TimeInMarket - Spent - TimePerOutlet</h1>
	        </div>

			<?php foreach ($timemarket as $tm) {
				$month1[] = $tm['month'];
				$timeinmarket[] = intval($tm['TimeInMarket']);
				$spent[] = intval($tm['Spent']);
				$timeperoutlet[] = intval($tm['TimePerOutlet']);
			} ?>


			<div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

			<script>
				Highcharts.chart('graft2', {
				chart: {
			        backgroundColor: ''
			    },
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
			        categories: <?php echo json_encode($month1); ?>,
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
		<?php } ?>
		<!-- Akhir Grafik Time -->

		<!-- Grafik PJP COMPLY -->
		<?php if (empty($pjpcomply)) { ?>

		<?php } else { ?>
			<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
	            <h1 class="lead">Diagram PJP Comply - Geomatch - Productive Call</h1>
	        </div>
			<?php foreach ($pjpcomply as $pjp) {
				$month2[] = $pjp['month'];
				$pjpcom[] = intval($pjp['PJP_COMPLY']);
				$geomath[] = intval($pjp['GEOMATCH']);
				$productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
			} ?>


			<div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

			<script>
				Highcharts.chart('graft3', {
				chart: {
			        backgroundColor: ''
			    },
			    title: {
			        text: ''
			    },
			    xAxis: {
			        categories: <?php echo json_encode($month2); ?>,
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
		                    format: '{point.y:.0f}%'
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
		<?php } ?>
		<!-- Akhir Grafik PJP COMPLY -->
	</div>
	<div class="container-fluid">
		<div class="form-group row">
	        <div class="col-sm-12">
	          <a onclick="printDiv()" type="submit" class="btn btn-block btn-danger"><i class="fa fa-print"></i></a>
	        </div>
	    </div>
		<div class="form-group row">
	        <div class="col-sm-12">
	          <a type="submit" class="btn btn-block btn-danger" href="<?php echo base_url().$back ?>">Kembali</a>
	        </div>
	    </div>
	</div>

<script>
	function printDiv()  {
	  	var divToPrint=document.getElementById('printArea');

	  	var newWin=window.open('','Print-Window');

	  	newWin.document.open();

	  	newWin.document.write('<html><head><style> #graft1, #graft2, #graft3 {min-width: 100%; max-width:200%; width: 200%; margin: 0 auto; padding-bottom: 500px; height: 500px;} .left {position: absolute; top: 0; left: 0; margin-left:10px; margin-top: 20px;} .right {position: absolute; right: 0; top: 0; margin-right: 10px;} #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .thead-dark {background-color: #000;color: #fff;} .min {background-color: #CC0033;color: #fff;} table {  border-collapse: collapse;} table, th, td {  border: 1px solid black;} hr {height:1px;} th, td {  padding: 15px;  text-align: left;}</style></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

	  	newWin.document.close();

	  	setTimeout(function(){newWin.close();},10);
	}

 </script>

<script src="<?php echo base_url().'assets/js/jquery-3.2.1.slim.min.js' ?>" ></script>
<script src="<?php echo base_url().'assets/js/popper.min.js' ?>" ></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js' ?>" ></script>
</body>
</html>