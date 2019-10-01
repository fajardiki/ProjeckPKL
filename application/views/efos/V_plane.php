<div class="row">
	<div class="col-lg-12"
		<h1>PLANE<small> Grafik Plane</small></h1>    
	 </div>
</div>

<div class="row">
	<div class="col-lg-12"
		<div id="grafik_plane"></div> 
	</div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
	Highcharts.chart('grafik_plane', {
    chart: {
        type: 'area'
    },  
    title: {
        text: 'Laporan Plane Pada Per Enam Bulan '
    },
    subtitle: {
        text: 'Source: Wikipedia.org'
    },
    xAxis: {
        categories: ['oktober', 'novenber', 'desember', 'januari', 'februari', 'maret',],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Billions'
        },
        labels: {
            formatter: function () {
                return this.value / 1000;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' millions'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Plane',
        data: [502, 635, 809, 947, 1402, 3634]
    }, {
        name: 'Visit',
        data: [106, 107, 111, 133, 221, 767]
    }, {
        name: 'Unplane',
        data: [163, 203, 276, 408, 547, 729]
    }, ]
});
</script>