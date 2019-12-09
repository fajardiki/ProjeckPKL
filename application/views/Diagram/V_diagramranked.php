		<?php $user = $this->session->userdata('user'); ?>
		<div class="jumbotron jumbotron-fluid mt-0" style="margin: 0; padding: 0; text-align: center;">
			<?php if (isset($user[0]['Salesman']) AND !empty($user[0]['Salesman'])): ?>
				<h1 class="lead"><?php echo $user[0]['Salesman'] ?></h1>
			<?php endif ?>
	        
	        <h3 class="lead">Ranking <?php echo $rank[0]['Month']; ?></h3>
	    </div>

		<?php foreach ($rank as $r) {
			$Month = $r['Month'];
			$sales[] = $r['Salesman'];
			$productivecall[] = intval($r['Productive_Call']);
		} ?>


		<div id="ranked" style="min-width: 310px; height: 400px; margin: 50px auto;"></div>

		<script>
			Highcharts.chart('ranked', {
			    chart: {
			        type: 'bar',

			        width: null,
			        height: null,

			        backgroundColor: ''
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
			        name: '',
			        colorByPoint: true,
			        data: <?php echo json_encode($productivecall); ?>
			    }]
			});
		</script>