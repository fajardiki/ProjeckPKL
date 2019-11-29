
<section class="mt-3" style="margin-bottom: 70px;">
    <?php 
    foreach ($infoplush as $i) {
        $month = $i['Month'];
        $day[] = $i['Day'];
        $Unvisited[] = intval($i['Unvisited']);
    } 
    ?>
    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <script>
      Highcharts.chart('container2', {
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
                text: 'Hari yang sering salesman tidak mendatangi outlet',
                align: 'center'
            },
            subtitle: {
                text: 'Rata - rata outlet tidak di datangi di bulan <?php echo $month; ?>',
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
                color: '#ffff00',
                name: 'Unvisite',
                data: <?php echo json_encode($Unvisited); ?>

            }],
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
    </script>
</section>