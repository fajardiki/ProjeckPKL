<?php $nama = $this->session->userdata('user'); ?>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

  <!-- Content -->
  <div class="container-fluid" style="position:relative; min-height: 100%; margin-top: 10px; margin-bottom: 60px;">

  <!-- Admin -->
  <!-- <div class="container-fluid"> -->
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
          credits: {
              enabled: false
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
              color: '#52b251',
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
                  fillColor: '#ff0000'
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
                      format: '{point.y:.0f}'
                  }
              }
          },
          series: [{
              color: '#66ff33',
              type: 'column',
              name: 'Planned',
              data: <?php echo json_encode($planed); ?>
          }, {
              color: '#00ffff',
              type: 'column',
              name: 'Productive',
              data: <?php echo json_encode($productive); ?>
          }, {
              color: '#FF0000',
              type: 'spline',
              name: 'Nosale',
              data: <?php echo json_encode($nosale); ?>,
              marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: '#ff0000'
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
                  fillColor: '#ff0000'
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
                    return Highcharts.numberFormat(this.value/3600)+'H';
                }
            },
            title: {
                text: ''
            },
            tickInterval: 3600 // number of milliseconds in one hour
          },
          credits: {
              enabled: false
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
              color: '#ff1a75',
              type: 'column',
              name: 'Time In Market',
              data: <?php echo json_encode($timeinmarket); ?>
          }, {
              color: '#ffe640',
              type: 'column',
              name: 'Spent',
              data: <?php echo json_encode($spent); ?>
          }, {
              color: '#990033',
              type: 'spline',
              name: 'Time Per Outlet',
              data: <?php echo json_encode($timeperoutlet); ?>,
              marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: '#ff0000'
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
          yAxis: {
            title: {
                text: ''
            }
          },
          credits: {
              enabled: false
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
                  fillColor: '#ff0000'
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
          yAxis: {
            title: {
                text: ''
            }
          },
          credits: {
              enabled: false
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
          credits: {
              enabled: false
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
              color: '#ff4d4d',
              type: 'column',
              name: 'PJP_Comply',
              data: <?php echo json_encode($pjpcom); ?>
          }, {
              color: '#00d6cc',
              type: 'column',
              name: 'Geomatch',
              data: <?php echo json_encode($geomath); ?>
          }, {
              color: '#00ff00',
              type: 'spline',
              name: 'Productive_call',
              data: <?php echo json_encode($productive_call); ?>,
              marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: '#ff0000'
              }
          }]
      });
      </script>
    <?php } ?>
    <!-- Akhir Grafik PJP COMPLY -->
  <!-- </div> -->
  <!-- Akhir admin -->



  <!-- Sales -->
  <?php } elseif ($nama[0]['status']=='sales') { ?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container" style="height: 60px;">
        <h1 class="display-4" style=" font-size: 4vw;">Selamat datang <?php echo $nama[0]['Salesman']; ?></h1>
        <p class="lead" style=" font-size: 2vw;">Ini adalah pencapaian anda 2 minggu ini.</p>
      </div>
    </div>
    
    <!-- Plane -->
        <div class="row">
            <div class="col-sm-12">
                <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
                  <div class="container">
                    <p class="lead" style=" font-size: 2vw;">Planned - Produktive - Nosale</p>
                  </div>
                </div>
            </div>
        </div>
      <div class="row">
          <div class="col-sm-6">
                <?php if (empty($plane)) { ?>
                  <div id="shadow1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
                  <script>
                    Highcharts.chart('shadow1', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-2; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
                    $day[] = $p['Day'];
                    $planed[] = intval($p['Planned']);
                    $productive[] = intval($p['Productive']);
                    $nosale[] = intval($p['Nosale']);
                  } ?>  



                  <div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

                  <script>
                    Highcharts.chart('graft1', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu Ke ' + <?php echo $p['Week']; ?>
                      },
                      xAxis: {
                          categories: <?php echo json_encode($day); ?>
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
          </div>
          <div class="col-sm-6">
              <?php if (empty($plane1)) { ?>
                  <div id="shadow11" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
                  <script>
                    Highcharts.chart('shadow11', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-1; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
                  <?php foreach ($plane1 as $p1) {
                    $day1[] = $p1['Day'];
                    $planed1[] = intval($p1['Planned']);
                    $productive1[] = intval($p1['Productive']);
                    $nosale1[] = intval($p1['Nosale']);
                  } ?>  



                  <div id="graft11" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

                  <script>
                    Highcharts.chart('graft11', {
                      title: {
                          text: 'Diagram Planned - Produktive - Nosale'
                      },
                      subtitle: {
                          text: 'Minggu Ke ' + <?php echo $p1['Week']; ?>
                      },
                      xAxis: {
                          categories: <?php echo json_encode($day1); ?>
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
                          data: <?php echo json_encode($planed1); ?>
                      }, {
                          type: 'column',
                          name: 'Productive',
                          data: <?php echo json_encode($productive1); ?>
                      }, {
                          type: 'spline',
                          name: 'Nosale',
                          data: <?php echo json_encode($nosale1); ?>,
                          marker: {
                              lineWidth: 2,
                              lineColor: Highcharts.getOptions().colors[3],
                              fillColor: 'white'
                          }
                      }]
                  });
                  </script>
                <?php }?>
          </div>
      </div>
    <!-- Akhir Plane -->

    <br><br>

    <!-- Grafik Time -->
      <div class="row">
          <div class="col-sm-12">
              <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
                <div class="container">
                  <p class="lead" style=" font-size: 2vw;">TimeInMarket - Spent - TimePerOutlet</p>
                </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-6">
              <?php if (empty($timemarket)) { ?>
                  <div id="shadow2" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow2', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-2; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
                    $day1[] = $tm['Day'];
                    $timeinmarket[] = intval($tm['TimeInMarket']);
                    $spent[] = intval($tm['Spent']);
                    $timeperoutlet[] = intval($tm['TimePerOutlet']);
                  } ?>

                  <div id="graft2" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

                  <script>
                    Highcharts.chart('graft2', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu Ke ' + <?php echo $tm['Week']; ?>
                      },
                      xAxis: {
                          categories: <?php echo json_encode($day1); ?>
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
                            dataLabels: {
                                enabled: true,
                                formatter: function(){
                                    return secondsTimeSpanToHMS(this.y);
                                }
                            },
                            enableMouseTracking: false
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

                  function secondsTimeSpanToHMS(s) {
                    var h = Math.floor(s / 3600); //Get whole hours
                    s -= h * 3600;
                    var m = Math.floor(s / 60); //Get remaining minutes
                    s -= m * 60;
                    return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
                  }
                  </script>
              <?php } ?>
          </div>
          <div class="col-sm-6">
              <?php if (empty($timemarket1)) { ?>
                  <div id="shadow22" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow22', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-1; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
                  <?php foreach ($timemarket1 as $tm) {
                    $day1[] = $tm1['Day'];
                    $timeinmarket1[] = intval($tm1['TimeInMarket']);
                    $spent1[] = intval($tm['Spent']);
                    $timeperoutlet1[] = intval($tm1['TimePerOutlet']);
                  } ?>

                  <div id="graft22" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

                  <script>
                    Highcharts.chart('graft22', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu Ke ' + <?php echo $tm1['Week']; ?>
                      },
                      xAxis: {
                          categories: <?php echo json_encode($day1); ?>
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
                            dataLabels: {
                                enabled: true,
                                formatter: function(){
                                    return secondsTimeSpanToHMS(this.y);
                                }
                            },
                            enableMouseTracking: false
                        }
                      },
                      series: [{
                          type: 'column',
                          name: 'Time In Market',
                          data: <?php echo json_encode($timeinmarket1); ?>
                      }, {
                          type: 'column',
                          name: 'Spent',
                          lineColor: Highcharts.getOptions().colors[2],
                          data: <?php echo json_encode($spent1); ?>
                      }, {
                          type: 'spline',
                          name: 'Time Per Outlet',
                          data: <?php echo json_encode($timeperoutlet1); ?>,
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
          </div>
      </div>
    <!-- Akhir Grafik Time -->
    <br><br>
    <!-- Grafik PJP COMPLY -->
      <div class="row">
          <div class="col-sm-12">
              <div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
                    <div class="container">
                    <p class="lead" style=" font-size: 2vw;">PJP Comply - Geomatch - Productive Call</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-6">
              <?php if (empty($pjpcomply)) { ?>
                  <div id="shadow3" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow3', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-2; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
                $day2[] = $pjp['Day'];
                $pjpcom[] = intval($pjp['PJP_COMPLY']);
                $geomath[] = intval($pjp['GEOMATCH']);
                $productive_call[] = intval($pjp['PRODUCTIVE_CALL']);
              } ?>


              <div id="graft3" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

              <script>
                Highcharts.chart('graft3', {
                  title: {
                      text: ''
                  },
                  subtitle: {
                      text: 'Minggu Ke ' + <?php echo $pjp['Week']; ?>
                  },
                  xAxis: {
                      categories: <?php echo json_encode($day2); ?>
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
          </div>
          <div class="col-sm-6">
              <?php if (empty($pjpcomply1)) { ?>
                  <div id="shadow33" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
                  <script>
                    Highcharts.chart('shadow33', {
                      title: {
                          text: ''
                      },
                      subtitle: {
                          text: 'Minggu ke ' + <?php echo date('W')-1; ?> + ' belum ada pencapaian'
                      },
                      xAxis: {
                          categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
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
                <?php foreach ($pjpcomply1 as $pjp1) {
                $day1[] = $pjp1['Day'];
                $pjpcom1[] = intval($pjp1['PJP_COMPLY']);
                $geomath1[] = intval($pjp1['GEOMATCH']);
                $productive_call1[] = intval($pjp1['PRODUCTIVE_CALL']);
              } ?>


              <div id="graft33" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>

              <script>
                Highcharts.chart('graft33', {
                  title: {
                      text: ''
                  },
                  subtitle: {
                      text: 'Minggu Ke ' + <?php echo $pjp1['Week']; ?>
                  },
                  xAxis: {
                      categories: <?php echo json_encode($day1); ?>
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
                      data: <?php echo json_encode($pjpcom1); ?>
                  }, {
                      type: 'column',
                      name: 'Geomatch',
                      data: <?php echo json_encode($geomath1); ?>
                  }, {
                      type: 'spline',
                      name: 'Productive_call',
                      data: <?php echo json_encode($productive_call1); ?>,
                      marker: {
                          lineWidth: 2,
                          lineColor: Highcharts.getOptions().colors[3],
                          fillColor: 'white'
                      }
                  }]
              });
              </script>
          <?php } ?>
          </div>
      </div>
    <!-- Akhir Grafik PJP COMPLY -->
  <?php } ?>
  <!-- Akhir sales -->

  </div>

  <!-- End Content -->

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->