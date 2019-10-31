<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
	
	<script src="<?php echo base_url().'assets/js/highcharts.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/series-label.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/exporting.js'?>"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col" align="center" style="margin: 15px; padding: 15px; background-color: #cccccc;">
				<h3><?php echo $sales[0]['Salesman']; ?></h3>
				<h6>Klaten</h6>
			</div>
		</div>

		<!-- Grafik Planed -->
		<div class="row mt-4">
          <div class="col-sm-12">
              <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
                <div class="container">
                  <p class="lead" style=" font-size: 2vw;">Diagram Planned - Produktive - Nosale</p>
                </div>
              </div>
          </div>
      	</div>
		<?php if (empty($plane)) { ?>
			<div id="shadow1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
			<script>
				Highcharts.chart('shadow1', {
			    title: {
			        text: ''
			    },
			    xAxis: {
			        categories: ['1', '2', '3', '4'],
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
		                    format: '{point.y:.1f}'
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

		<!-- Grafik Time -->
		<div class="row mt-4">
          <div class="col-sm-12">
              <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
                <div class="container">
                  <p class="lead" style=" font-size: 2vw;">Diagram TimeInMarket - Spent - TimePerOutlet</p>
                </div>
              </div>
          </div>
      	</div>
		<?php if (empty($timemarket)) { ?>
			<div id="shadow2" style="min-width: 310px; height: 400px; margin-top: 50px; "></div>
			<script>
				Highcharts.chart('shadow2', {
				chart: {
			        backgroundColor: ''
			    },
			    title: {
			        text: ''
			    },
			    xAxis: {
			        categories: ['1', '2', '3', '4'],
			        title: {
				        text: 'Week'
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

		<div class="row mt-4">
          <div class="col-sm-12">
              <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
                <div class="container">
                  <p class="lead" style=" font-size: 2vw;">Diagram PJP Comply - Geomatch - Productive Call</p>
                </div>
              </div>
          </div>
      	</div>
		<?php if (empty($pjpcomply)) { ?>
			<div id="shadow3" style="min-width: 310px; height: 400px; margin-top: 50px;"></div>
			<script>
				Highcharts.chart('shadow3', {

			    title: {
			        text: ''
			    },
			    xAxis: {
			        categories: ['1', '2', '3', '4'],
			        title: {
				        text: 'Week'
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
		                    format: '{point.y:.1f}%'
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
				$month2[] = $pjp['month'];
				$pjpcom[] = intval($pjp['PJP_COMPLY']);
				$geomath[] = intval($pjp['GEOMATCH']);
				$productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
			} ?>


			<div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

			<script>
				Highcharts.chart('graft3', {
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
		                    format: '{point.y:.1f}%'
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
		<div class="form-group row">
        <div class="col-sm-12">
          <a type="submit" class="btn btn-block btn-danger" href="<?php echo base_url().'C_klaten/updatesales' ?>">Kembali</a>
        </div>
      </div>
	</div>
		<!-- Akhir Grafik PJP COMPLY -->

<script src="<?php echo base_url().'assets/js/jquery-3.2.1.slim.min.js' ?>" ></script>
<script src="<?php echo base_url().'assets/js/popper.min.js' ?>" ></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js' ?>" ></script>
</body>
</html>