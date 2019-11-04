<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.nav-link {
			color: #fff;
		}
	</style>
</head>
<body style="font-family: cambria;">
	<ul class="nav nav-tabs nav-justified bg-dark" style="margin-top: #navbar; font-size: 10px;">
	    <li class="nav-item">
	      <a id="efos" class="nav-link" href="efos">EFOS BANTUL</a>
	    </li>
	    <li class="nav-item">
	      <a id="plane" class="nav-link" href="plane">PLANE BANTUL</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="time">TIME BANTUL</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="pjp">PJP BANTUL</a>
	    </li>
	  </ul>

	  <script>
	  	$(document).ready(function() {
	  		$('.nav-link').click(function(){
			    $(this).addClass('active');
			})
	  	})
	  </script>
</body>
</html>