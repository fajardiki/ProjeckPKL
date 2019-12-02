		<?php $user = $this->session->userdata('user'); ?>
		<div class="jumbotron jumbotron-fluid mt-2" style="margin: 0; padding: 0; text-align: center;">
	        <h1 class="lead">RANKING <?php echo $user[0]['Salesman'] ?></h1>
	        <h3 class="lead">Minggu ke <?php echo $rank[0]['Week']; ?></h3>
	    </div>

		<?php foreach ($rank as $r) {
			$week = $r['Week'];
			$sales[] = $r['Salesman'];
			$pjp[] = intval($r['pjp_comply']);
			$nosale[] = intval($r['NosalePersen']);
			$productivecall[] = intval($r['Productive_Call']);
		} ?>


		<div id="productivecall" style="min-width: 310px; height: 400px; margin-bottom: 50px;"></div>

		<script>
			Highcharts.chart('productivecall', {
		    title: {
		        text: ''
		    },
		    chart: {
		        backgroundColor: ''
		    },
		    xAxis: {
		        categories: <?php echo json_encode($sales); ?>,
		        title: {
			        text: ''
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
		                format: '{point.y:.0f}%'
		            }
		        }
	    	},
		    series: [{
		        type: 'column',
		        colorByPoint: true,
		        name: 'Productive Call',
		        data: <?php echo json_encode($productivecall); ?>
		    }]
		});
		</script>