		<?php $user = $this->session->userdata('user'); ?>
		<div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
	        <h1 class="lead">RANKING <?php echo $user[0]['Salesman'] ?></h1>
	        <h3 class="lead">Minggu ke <?php echo $rank[0]['Week']; ?></h3>
	    </div>

		<?php foreach ($rank as $r) {
			$week = $r['Week'];
			$sales[] = $r['Salesman'];
			$productivecall[] = intval($r['Productive_Call']);
		} ?>

		<?php var_dump($r['Productive_Call']); ?>


		<div id="ranked" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script>
			Highcharts.chart('ranked', {
			    chart: {
			        type: 'bar'
			    },
			    title: {
			        text: ''
			    },
			    subtitle: {
			        text: ''
			    },
			    xAxis: {
			        categories: <?php echo json_encode($sales); ?>,
			        title: {
			            text: null
			        }
			    },
			    yAxis: {
			        min: 0,
			        title: {
			            text: false
			        },
			        labels: {
			            overflow: ''
			        }
			    },
			    tooltip: {
			        valueSuffix: ''
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
			    legend: {
			        layout: 'vertical',
			        align: 'right',
			        verticalAlign: 'top',
			        x: -40,
			        y: 80,
			        floating: true,
			        borderWidth: 1,
			        backgroundColor:
			            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
			        shadow: true
			    },
			    credits: {
			        enabled: false
			    },
			    series: [{
			        name: 'Year 1800',
			        colorByPoint: true,
			        data: <?php echo json_encode($productivecall); ?>
			    }]
			});
		</script>