<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	          $('ul li a').click(function(){
	            $('li a').removeClass("active");
	            $(this).addClass("active");
	        });
	    });
	</script>
	<style>
		body {
		  font-family: 'Lato', sans-serif;
		}
	</style>
</head>
<body>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->
	<ul class="nav nav-tabs nav-justified bg-dark">
	    <li class="nav-item">
	      <a id="efos" class="nav-link active" href="#">EFOS</a>
	    </li>
	    <li class="nav-item">
	      <a id="plane" class="nav-link" href="#">PLANE</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="#">TIME</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="#">PJP</a>
	    </li>
	 </ul>
	<h1>EFOS JOGJA</h1>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>