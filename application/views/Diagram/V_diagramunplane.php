
<section class="mt-3">
    <?php 
    foreach ($infoplush as $i) {
        $month = $i['Month'];
        $day[] = $i['Day'];
        $Planned[] = intval($i['Planned']);
        $Unplanned[] = intval($i['Unplanned']);
        $Visited[] = intval($i['Visited']);
    } 
    ?>
    <div id="unplane" style="min-width: 310px; height: 400px; margin: 50px auto"></div>

    <script>
      Highcharts.chart('unplane', {
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
                text: 'Hari Visited & Un Planned salesman',
                align: 'center'
            },
            subtitle: {
                text: 'Rata - rata visited dan Un planned salesman di bulan <?php echo $month; ?>',
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
                color: '#ff0066',
                name: 'Visited',
                data: <?php echo json_encode($Visited); ?>

            },{
                color: '#00ffff',
                name: 'Planned',
                data: <?php echo json_encode($Planned); ?>

            },{
                color: '#9933ff',
                name: 'Un Planned',
                data: <?php echo json_encode($Unplanned); ?>

            }],
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
    </script>
</section>