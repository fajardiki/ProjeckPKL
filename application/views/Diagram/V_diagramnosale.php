
<section class="mt-3">

    <?php 
    foreach ($infoplush as $i) {
        $month = $i['Month'];
        $day[] = $i['Day'];
        $nosale[] = intval($i['Nosale']);
        $Visited[] = intval($i['Visited']);
    } 
    ?>
    <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <script>
      Highcharts.chart('container1', {
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
                text: 'Hari yang sering terjadi nosale',
                align: 'center'
            },
            subtitle: {
                text: 'Rata - rata nosale di bulan <?php echo $month; ?>',
                align: 'center'
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
            credits: {
                 enabled: false
            },
            series: [{
                color: '#ff0000',
                name: 'Nosale',
                data: <?php echo json_encode($nosale); ?>

            }],
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
    </script>
</section>