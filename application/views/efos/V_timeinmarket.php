
<script type="text/javascript">
<!-- create the highcharts object -->

$(function () {
        $('#container').highcharts({
        

        
            chart: {
                type: 'column',
                 backgroundColor: 'transparent'
            },
            title: {
                text: ''
            },

            xAxis: {
                categories: ['May 2013', 'June 2013', 'July 2013', 'August 2013', 'September 2013', 'October 2013', 'November 2013', 'December 2013', 'January 2014', 'February 2014', 'March 2014', 'April 2014', ]
            },
            yAxis: {
                 type: 'datetime', //y-axis will be in milliseconds
                 dateTimeLabelFormats: { //force all formats to be hour:minute:second
                    second: '%H:%M:%S',
                    minute: '%H:%M:%S',
                    hour: '%H:%M:%S',
                    day: '%H:%M:%S',
                    week: '%H:%M:%S',
                    month: '%H:%M:%S',
                    year: '%H:%M:%S'
                }, 
                title: {
                    text: 'Time Spent on Phone'
                }
            },
            tooltip: {
                 type: 'datetime', //y-axis will be in milliseconds
                 dateTimeLabelFormats: { //force all formats to be hour:minute:second
                    second: '%H:%M:%S',
                    minute: '%H:%M:%S',
                    hour: '%H:%M:%S',
                    day: '%H:%M:%S',
                    week: '%H:%M:%S',
                    month: '%H:%M:%S',
                    year: '%H:%M:%S'
                }, 
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} calls</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                { name: 'Michelle', data: [7200, 7200, 3600, 7200, 7200, 7200, 7200, 3600, 0, 0, 0, 0, ] },{ name: 'Kim', data: [14400, 32400, 36000, 36000, 32400, 32400, 21600, 28800, 21600, 0, 0, 0, ] },{ name: 'Katie', data: [0, 0, 0, 0, 0, 0, 0, 28800, 10800, 0, 0, 0, ] },            ]
        });
    });
</script>



<!-- <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;" ></div>
<script>
var options = {
  chart: {
    renderTo: 'container',
  },

  xAxis: {
    type: 'datetime',
    labels: {
      format: '{value:%Y-%m-%d}'
    }
  },
  
  yAxis: {
  	type: 'datetime',
    labels: {
      format: '{value:%H:%M:%S}',
    }
  },

  series: [{
    data: [
      [Date.parse('2016-10-20 03:14'), Date.parse('2016-10-20 03:14')],
      [Date.parse('2016-10-21 04:14'), Date.parse('2016-10-20 04:32')],
      [Date.parse('2016-10-22 12:14'), Date.parse('2016-10-20 05:34')]
    ],
    type: 'line'
  }]
}

var chart = Highcharts.chart(options);
</script> -->


<!-- <div class="row">
	<div class="col-lg-12"
		<h1>TIME<small> Start Time</small></h1>    
	 </div>
</div>
<div class="row">
	<div class="col-lg-12"
		<div id="start_time"></div> 
	</div>
</div> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->
<!-- <script>
	Highcharts.getJSON(
    'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
    function (data) {

        Highcharts.chart('container', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'USD to EUR exchange rate over time'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Exchange rate'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'USD to EUR',
                data: data
            }]
        });
    }
);
</script> -->
