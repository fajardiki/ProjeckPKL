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
	<ul class="nav nav-tabs nav-justified bg-dark" style="position: fixed; font-size: 10px; margin-top: 50px; width: 100%; left: 0; z-index: 2;">
	    <li class="nav-item">
	      <a id="efos" class="nav-link" href="efos">EFOS</a>
	    </li>
	    <li class="nav-item">
	      <a id="plane" class="nav-link" href="plane">PLANNED</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="time">TIME</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="pjp">PJP</a>
	    </li>
	  </ul>

	  <br><br><br><br>

	  <script>
	  	$(document).ready(function() {
	  		$('.nav-link').click(function(){
			    $(this).addClass('active');
			})
	  	})
	  </script>

</body>
</html>
	  