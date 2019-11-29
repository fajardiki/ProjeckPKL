
<section class="mt-3">
    <?php 
    foreach ($infoplush as $i) {
        $month = $i['Month'];
        $day[] = $i['Day'];
        $Planned[] = intval($i['Planned']);
        $productive[] = intval($i['Productive']);
    } 
    ?>
    <div id="productive" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <script>
      Highcharts.chart('productive', {
            chart: {
                type: 'spline',
                scrollablePlotArea: {
                    minWidth: 600,
                    scrollPositionX: 1
                }
            },
            chart: {
                backgroundColor: ''
            },
            title: {
                text: 'Hari productive salesman',
                align: 'center'
            },
            subtitle: {
                text: 'Rata - rata productive salesman di bulan <?php echo $month; ?>',
                align: 'center'
            },
            xAxis: {
                categories: <?php echo json_encode($day); ?>
            },
            yAxis: {
                title: {
                    text:''
                }
            },
            tooltip: {
                valueSuffix: ' '
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f} Outlet'
                    }
                }
            },
            credits: {
                 enabled: false
            },
            series: [{
                color: '#00ff00',
                name: 'Productive',
                data: <?php echo json_encode($productive); ?>

            },{
                color: '#00ffff',
                name: 'Planned',
                data: <?php echo json_encode($Planned); ?>

            }],
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
    </script>
</section>