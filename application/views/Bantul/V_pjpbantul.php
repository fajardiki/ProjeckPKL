<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <style>
        body {
          font-family: 'Lato', sans-serif;
        }
    </style>
</head>
<body>
<script type="text/javascript">
    $(document).ready(function(){
        $('ul li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('Bantul/V_navbarbantul'); ?>
<!-- Akhir -->
<h1>PJP Comply</h1>
<div class="row">
	<div class="col-lg-12"
		<h1>PLANE<small> Grafik PJP</small></h1>    
	 </div>
</div>

<div class="row">
	<div class="col-lg-12"
		<div id="grafik_pjp"></div> 
	</div>
</div>

<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">Highcharts.chart('grafik_pjp', {
  chart: {
    type: 'area'
  },
  title: {
    text: 'Historic and Estimated PJP '
  },
  subtitle: {
    text: 'Source: bik.org'
  },
  xAxis: {
    categories: ['1750', '1800', '1850', '1900', '1950', '1999', '2050'],
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
    name: 'Asia',
    data: [502, 635, 809, 947, 1402, 3634, 5268]
  }, {
    name: 'Africa',
    data: [106, 107, 111, 133, 221, 767, 1766]
  }, {
    name: 'Europe',
    data: [163, 203, 276, 408, 547, 729, 628]
  }, {
    name: 'America',
    data: [18, 31, 54, 156, 339, 818, 1201]
  }, {
    name: 'Oceania',
    data: [2, 2, 2, 6, 13, 30, 46]
  }]
});</script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>