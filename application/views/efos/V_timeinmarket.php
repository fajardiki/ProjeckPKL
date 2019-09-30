
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
</script>