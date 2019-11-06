<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.nav-link {
			color: #ffff;
		}
	</style>
</head>
<body style="font-family: cambria;">
	<ul class="nav nav-tabs nav-justified bg-dark" style="font-size: 10px;">
	    <li class="nav-item">
	      <a id="efos" class="nav-link" href="efosall">EFOS SALESMAN</a>
	    </li>
	    <li class="nav-item">
	      <a id="plane" class="nav-link" href="plane">PLANE SALESMAN</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="time">TIME SALESMAN</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="pjp">PJP SALESMAN</a>
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