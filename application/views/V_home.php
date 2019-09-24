<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
</head>
<body>
<div class="container">

	<div id="graft1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script>
		Highcharts.chart('graft1', {
	    title: {
	        text: 'EFOS ADMM Group BM SEPTEMBER WEEK 37 - 2019'
	    },
	    xAxis: {
	        categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
	    },
	    labels: {
	        items: [{
	            html: 'Total fruit consumption',
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
	        name: 'Jane',
	        data: [3, 2, 1, 3, 4]
	    }, {
	        type: 'column',
	        name: 'John',
	        data: [2, 3, 5, 7, 6]
	    }, {
	        type: 'spline',
	        name: 'Average',
	        data: [3, 2.67, 3, 6.33, 3.33],
	        marker: {
	            lineWidth: 2,
	            lineColor: Highcharts.getOptions().colors[3],
	            fillColor: 'white'
	        }
	    }, {
	        type: 'pie',
	        name: 'Total consumption',
	        data: [{
	            name: 'Jane',
	            y: 13,
	            color: Highcharts.getOptions().colors[0] // Jane's color
	        }, {
	            name: 'John',
	            y: 23,
	            color: Highcharts.getOptions().colors[1] // John's color
	        }],
	        center: [100, 80],
	        size: 100,
	        showInLegend: false,
	        dataLabels: {
	            enabled: false
	        }
	    }]
	});
	</script>
</div>
</body>
</html>
