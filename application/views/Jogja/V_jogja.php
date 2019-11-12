<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Content -->
<section style="padding: 15px; background-color: #cccccc; margin-top: 50px;">
	<h3 align="center">EFOS ADMM CONCES JOGJA</h3>
</section>

<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
    <?php if (!empty($summary)) { ?>
	    <?php foreach ($summary as $s) {} ?>
	        <h1 class="lead">Summary week <?php echo $s['Week']; ?>, <?php echo $s['Year']; ?></h1>
    <?php } else { ?>
      <h1 class="lead">Summary..</h1>
    <?php } ?>                
</div>

<!-- Shearch -->
<form class="input-group mb-2" action="<?php echo base_url().'C_jogja' ?>" method="post">
  <input type="week" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari">
  </div>
</form>

<!-- Summary -->
<section style="overflow-x: scroll; height: 350px;">
<table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
          <thead class="thead-dark" align="center">  
            <tr>
              <th scope="col">Salesman</th>
              <th scope="col">Planned</th>
              <th scope="col">Un-planed</th>
              <th scope="col">Visited</th>
              <th scope="col">Start Time</th>
              <th scope="col">End Time</th>
              <th scope="col">Nosale</th>
              <th scope="col">PJP-Comply</th>
              <th scope="col">No-Sale</th>
              <th scope="col">Productive-Call</th>
              <th scope="col">Total Penjualan</th>  
            </tr>
          </thead>
          <?php if (!empty($summary)) { ?>
            <?php foreach ($summary as $sm) { 
            	$saless = $sm['Salesman'];
				$planneds = number_format($sm['Planned']);
				$unplanneds = number_format($sm['Un_planed']);
				$visiteds = number_format($sm['Visited']);
				$stattimes = $sm['Start_Time'];
				$endtimes = $sm['End_Time'];
				$nosales = number_format($sm['Nosale']);
				$pjpcomplys = intval($sm['pjp_comply']);
				$nosalepersens = intval($sm['NosalePersen']);
				$productivecalls = intval($sm['Productive_Call']);
				$totalsales = number_format($sm['Total_Sale'],2,',','.');
            ?>
            <tbody>
              <tr>
                <td><?php echo $saless ?></td>
                <td><?php echo $planneds ?></td>
                <td><?php echo $unplanneds ?></td>
                <td><?php echo $visiteds ?></td>
                <td><?php echo $stattimes ?></td>
                <td><?php echo $endtimes ?></td>
                <td><?php echo $nosales ?></td>
                
			    <!-- Pjp comply -->
			    <?php if ($pjpcomplys < 95) { ?>
			      <td class="min"><?php echo $pjpcomplys. '%' ?></td>
			    <?php } else { ?>
			      <td><?php echo $pjpcomplys. '%' ?></td>
			    <?php } ?>

			    <!-- Nosale percent -->
			    <?php if ($nosalepersens > 10) { ?>
			      <td class="min"><?php echo $nosalepersens. '%' ?></td>
			    <?php } else { ?>
			      <td><?php echo $nosalepersens.'%' ?></td>
			    <?php } ?>

		      	<!-- Productive call -->
			    <?php if ($productivecalls < 85 ) { ?>
			      <td class="min"><?php echo $productivecalls.'%'; ?></td>
			    <?php } else { ?>
			      <td><?php echo $productivecalls.'%'; ?></td>
			    <?php } ?>

                <td><?php echo "Rp " .$totalsales ?></td>
              </tr>
            </tbody>
            <?php } ?>
          <?php } else { ?>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          <?php } ?>
        </table>
    </section>

	<!-- Grafik Planed -->
    <div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
        <h1 class="lead">Diagram Planned - Produktive - Nosale</h1>
    </div>
	<?php if (empty($plane)) { ?>
		<div id="shadow1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
		<script>
			Highcharts.chart('shadow1', {
		    title: {
		        text: ''
		    },
		    chart: {
		        backgroundColor: ''
		    },
		    xAxis: {
		        categories: ['1', '2', '3', '4'],
		        title: {
			        text: 'Month'
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
			$day[] = $p['Day'];
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
	<?php } ?>

	<!-- Akhir Grafik Planed -->

	<!-- Grafik Time -->
    <div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
        <h1 class="lead">Diagram TimeInMarket - Spent - TimePerOutlet</h1>
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
			$day1[] = $tm['Day'];
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
			            return Highcharts.numberFormat(this.value/3600,0)+'H';
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
    <div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
        <h1 class="lead">Diagram PJP Comply - Geomatch - Productive Call</h1>
    </div>
	<?php if (empty($pjpcomply)) { ?>
		<div id="shadow3" style="min-width: 310px; height: 400px; margin-bottom: 50px;"></div>
		<script>
			Highcharts.chart('shadow3', {

		    title: {
		        text: ''
		    },
		    chart: {
		        backgroundColor: ''
		    },
		    xAxis: {
		        categories: ['1', '2', '3', '4'],
		        title: {
			        text: 'Month'
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
			$day2[] = $pjp['Day'];
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

<!-- Akhir Content -->

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer