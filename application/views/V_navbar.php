<!DOCTYPE html>
<html>
<head>
	<title>SISALESMAN ANDRAWINA DMM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/fontawesome.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/brands.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/solid.css' ?>">
	<!-- <style type="text/css">
		.sticky {
		  position: fixed;
		  top: 0;
		  width: 100%;
		  z-index: 9999;
		}
	</style> -->

	<style>
		.min {
			background-color: #CC0033;
			color: #fff;
		}

		#navbar {
			position: fixed; 
			width: 100%;
			left: 0;
			z-index: 4;
			top: 0;
		}

		footer {
			position: fixed;
			bottom: 0;
			width: 100%;
			left: 0;
			z-index: 3;
		}

		.tableFixHead          { overflow-y: auto; height: 300px; }
		.tableFixHead thead th { position: sticky; top: 0; }

		/* Just common table stuff. Really. */
		table  { border-collapse: collapse; width: 100%; }
		th, td { padding: 8px 16px; }
		th     { background:#eee; }
	</style>

	<?php 
		function seconds_from_time($time) {
			list($h, $m, $s) = explode(':', $time);
			return ($h * 3600) + ($m * 60) + $s;
		}
	?>

	<script src="<?php echo base_url().'assets/js/highcharts.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/series-label.js'?>"></script>
	<!-- <script src="<?php echo base_url().'assets/js/exporting.js'?>"></script> -->
	<script src="<?php echo base_url().'assets/js/jquery.min.js' ?>"></script>
	<script src="<?php echo base_url().'assets/fontawesome/js/fontawesome.min.js' ?>"></script>
</head>
<body style="font-family: cambria; height: 100%; background-color: #f2f2f2">

<div class="container-fluid"> 

<?php $nama = $this->session->userdata('user'); ?>

<?php if ($nama[0]['status']=='Admin') {?>
	<!-- <img src="<?php echo base_url().'assets/img/Header2.jpg' ?>" class="header-image" width="5002" height="597" alt="" style="margin-bottom: 0; border-bottom: 1 solid #eaeaea; width: 100%; max-width: 100%; height: auto;">  -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
    <!-- Brand -->
	    <a class="navbar-brand" align="" href="#"><?php echo $nama[0]['status']; ?></a>
	      
	    <!-- Toggler/collapsibe Button -->
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <!-- Navbar links -->
	    <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav mr-auto">
		       	<li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_dasbord'; ?>">BERANDA</a>
		        </li>
		        <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMM</a>
				        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
				        <a class="dropdown-item" href="<?php echo base_url().'C_jogja' ?>" style="color: #ffffff">Andrawina Jogja</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_magelang' ?>" style="color: #ffffff">Andrawina Magelang</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_bantul' ?>" style="color: #ffffff">Andrawina Bantul</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_klaten' ?>" style="color: #ffffff">Andrawina Klaten</a>
				        </div>
				</li>
				<li class="nav-item dropdown">
				    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EFOS</a>
				        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
				        <a class="dropdown-item" href="<?php echo base_url().'C_jogja/efos'; ?>" style="color: #ffffff">Andrawina Jogja</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_magelang/efos';?>" style="color: #ffffff">Andrawina Magelang</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_bantul/efos'; ?>" style="color: #ffffff">Andrawina Bantul</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_klaten/efos'; ?>" style="color: #ffffff">Andrawina Klaten</a>
						</div>
				</li>
				<li class="nav-item dropdown">
				    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SALESMAN</a>
				        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
				        <a class="dropdown-item" href="<?php echo base_url().'C_jogja/updatesales'; ?>" style="color: #ffffff">Andrawina Jogja</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_magelang/updatesales'; ?>" style="color: #ffffff">Andrawina Magelang</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_bantul/updatesales'; ?>" style="color: #ffffff">Andrawina Bantul</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_klaten/updatesales'; ?>" style="color: #ffffff">Andrawina Klaten</a>
				        </div>
				</li>
				<li class="nav-item dropdown">
				    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DISTRIK</a>
				    	<div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
				        <a class="dropdown-item" href="<?php echo base_url().'C_jogja/updatedistrict'; ?>" style="color: #ffffff">Andrawina Jogja</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_magelang/updatedistrict'; ?>" style="color: #ffffff">Andrawina Magelang</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_bantul/updatedistrict'; ?>" style="color: #ffffff">Andrawina Bantul</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_klaten/updatedistrict'; ?>" style="color: #ffffff">Andrawina Klaten</a>
				        </div>
				</li>
				<li class="nav-item dropdown"> 
				    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DATA</a>
				        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
				        <a class="dropdown-item" href="<?php echo base_url().'C_dasbord/importexcel'; ?>" style="color: #ffffff">Impor Efos</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_dasbord/dataefos'; ?>" style="color: #ffffff">Data Efos</a>
				        <a class="dropdown-item" href="<?php echo base_url().'C_dasbord/editdataefos'; ?>" style="color: #ffffff">Hapus Data Efos</a>
				        </div>
				</li>
				<li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_dasbord/user'; ?>">USER</a>
		        </li>
			</ul>
			<ul class="navbar-nav">
			    <a class="nav-link fas fa-sign-out-alt" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;">  	
			    </a>
			    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
			        <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">KELUAR</a>
			    </div>
			</ul>
		</div> 
	</nav>

<?php } elseif ($nama[0]['status']=='sales') { ?>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">

    <!-- Brand -->
    <a class="navbar-brand" align="" href=""><?php echo $nama[0]['status']; ?></a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
    <!-- Navbar links -->
	    <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav mr-auto">
		       	<li class="nav-item"> 
		            <a class="nav-link" href="<?php echo base_url().'C_dasbord'; ?>">BERANDA</a>
		        </li>
		        <li class="nav-item"> 
		            <a class="nav-link" href="<?php echo base_url().'C_dasbord/ranking'; ?>">RANKING</a>
		        </li>
		        <li class="nav-item"> 
		            <a class="nav-link" href="<?php echo base_url().'C_dasbord/efos'; ?>">EFOS</a>
		        </li>
		    </ul>
		    <ul class="navbar-nav">
		       	<span class="navbar-text"></span li class="nav-item dropdown">
				    <a class="nav-link fas fa-sign-out-alt" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
				        <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
				        <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">KELUAR</a>
				        </div>
			</ul>
		</div> 
	</nav>

<?php } elseif ($nama[0]['status']=='HRD') { ?>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
	<!-- Brand -->
	<a class="navbar-brand" align="" href="#"><?php echo $nama[0]['status']; ?></a>
			      
	<!-- Toggler/collapsibe Button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
	<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">

			    <li class="nav-item">
			    	<a class="nav-link" href="<?php echo base_url().'C_dasbord'; ?>">BERANDA</a>
			    </li>
			    <li class="nav-item dropdown">
			    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMM</a>
			        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
			            <a class="dropdown-item" href="<?php echo base_url().'C_jogja' ?>" style="color: #ffffff">Andrawina Jogja</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_magelang' ?>" style="color: #ffffff">Andrawina Magelang</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_bantul' ?>" style="color: #ffffff">Andrawina Bantul</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_klaten' ?>" style="color: #ffffff">Andrawina Klaten</a>
			        </div>
			    </li>
			    <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EFOS</a>
			        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
			            <a class="dropdown-item" href="<?php echo base_url().'C_jogja/efos'; ?>" style="color: #ffffff">Andrawina Jogja</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_magelang/efos'; ?>" style="color: #ffffff">Andrawina Magelang</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_bantul/efos'; ?>" style="color: #ffffff">Andrawina Bantul</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_klaten/efos'; ?>" style="color: #ffffff">Andrawina Klaten</a>
			         </div>
			    </li>
			    <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SALESMAN</a>
			        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
			            <a class="dropdown-item" href="<?php echo base_url().'C_jogja/updatesales'; ?>" style="color: #ffffff">Andrawina Jogja</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_magelang/updatesales'; ?>" style="color: #ffffff">Andrawina Magelang</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_bantul/updatesales'; ?>" style="color: #ffffff">Andrawina Bantul</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_klaten/updatesales'; ?>" style="color: #ffffff">Andrawina Klaten</a>
			        </div>
			     </li>
			</ul>
			<ul class="navbar-nav">
			    <a class="nav-link fas fa-sign-out-alt" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;"></a>
			    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
			        <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">KELUAR</a>
			    </div>
			</ul>
		</div> 
	</nav>

<?php } elseif ($nama[0]['status']=='Supervisor') { ?>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">

    <!-- Brand -->
    <a class="navbar-brand" align="" href="#"><?php echo $nama[0]['status']; ?></a>
			      
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>

    <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav mr-auto">
	        <?php if ($nama[0]['id_conces']=='1') { ?>
	        	<li class="nav-item">
	        	    <a class="nav-link" href="<?php echo base_url().'C_jogja' ?>">BERANDA</a>
		        </li>
		        <li class="nav-item">
				    <a class="nav-link" href="<?php echo base_url().'C_jogja/efos'; ?>">EFOS</a>
				</li> 
	            <li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_jogja/updatesales'; ?>">SALES</a>
		        </li>
			<?php } elseif ($nama[0]['id_conces']=='2') { ?>
		       	<li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_magelang' ?>">BERANDA</a>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_magelang/efos'; ?>">EFOS</a>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_magelang/updatesales'; ?>">SALES</a>
		        </li>
			<?php } elseif ($nama[0]['id_conces']=='3') { ?>
		       	<li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_bantul' ?>">BERANDA</a>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_bantul/efos'; ?>">EFOS</a>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url().'C_bantul/updatesales'; ?>">SALES</a>
		        </li>
			<?php } elseif ($nama[0]['id_conces']=='4') { ?>
			    <li class="nav-item">
				    <a class="nav-link" href="<?php echo base_url().'C_klaten' ?>">BERANDA</a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="<?php echo base_url().'C_klaten/efos'; ?>">EFOS</a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="<?php echo base_url().'C_klaten/updatesales'; ?>">SALES</a>
				</li>
			<?php } else { ?>

		<?php } ?>
			       
			</ul>
			<ul class="navbar-nav">
			    <a class="nav-link fas fa-sign-out-alt" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;"></a>
			    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
			        <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">KELUAR</a>
			    </div>
			</ul>
		</div> 
	</nav>

<?php } elseif ($nama[0]['status']=='Oprational Manager') { ?>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
					
		<!-- Brand -->
		<a class="navbar-brand" align="" href="#"><?php echo $nama[0]['status']; ?></a>
				      
		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">

			<?php if ($nama[0]['id_conces']=='1') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_jogja' ?>">BERANDA</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_jogja/efos'; ?>">EFOS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_jogja/updatesales'; ?>">SALES</a>
				</li>
			<?php } elseif ($nama[0]['id_conces']=='2') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_magelang' ?>">BERANDA</a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="<?php echo base_url().'C_magelang/efos'; ?>">EFOS</a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="<?php echo base_url().'C_magelang/updatesales'; ?>">SALES</a>
				</li>
			<?php } elseif ($nama[0]['id_conces']=='3') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_bantul' ?>">BERANDA</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_bantul/efos'; ?>">EFOS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_bantul/updatesales'; ?>">SALES</a>
				</li>
			<?php } elseif ($nama[0]['id_conces']=='4') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_klaten' ?>">BERANDA</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_klaten/efos'; ?>">EFOS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'C_klaten/updatesales'; ?>">SALES</a>
				</li>
			<?php } else { ?>

		<?php } ?>
			</ul>

			<ul class="navbar-nav">
				<a class="nav-link fas fa-sign-out-alt" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;">
				</a>
				<div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
				    <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">KELUAR</a>
				</div>
			</ul>
		</div> 
	</nav>

<?php } elseif ($nama[0]['status']=='Owner') { ?>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">

		<!-- Brand -->
		<a class="navbar-brand" align="" href="#"><?php echo $nama[0]['status']; ?></a>
			      
		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url().'C_dasbord'; ?>">BERANDA</a>
			    </li>
			    <li class="nav-item dropdown">
			    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMM</a>
			            <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
			               <a class="dropdown-item" href="<?php echo base_url().'C_jogja' ?>" style="color: #ffffff">Andrawina Jogja</a>
			               <a class="dropdown-item" href="<?php echo base_url().'C_magelang' ?>" style="color: #ffffff">Andrawina Magelang</a>
			               <a class="dropdown-item" href="<?php echo base_url().'C_bantul' ?>" style="color: #ffffff">Andrawina Bantul</a>
			               <a class="dropdown-item" href="<?php echo base_url().'C_klaten' ?>" style="color: #ffffff">Andrawina Klaten</a>
			            </div>
			    </li>
			    <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EFOS</a>
			        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
			            <a class="dropdown-item" href="<?php echo base_url().'C_jogja/efos'; ?>" style="color: #ffffff">Andrawina Jogja</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_magelang/efos'; ?>" style="color: #ffffff">Andrawina Magelang</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_bantul/efos'; ?>" style="color: #ffffff">Andrawina Bantul</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_klaten/efos'; ?>" style="color: #ffffff">Andrawina Klaten</a>
			        </div>
			    </li>
			    <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SALESMAN</a>
			        <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
			            <a class="dropdown-item" href="<?php echo base_url().'C_jogja/updatesales'; ?>" style="color: #ffffff">Andrawina Jogja</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_magelang/updatesales'; ?>" style="color: #ffffff">Andrawina Magelang</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_bantul/updatesales'; ?>" style="color: #ffffff">Andrawina Bantul</a>
			            <a class="dropdown-item" href="<?php echo base_url().'C_klaten/updatesales'; ?>" style="color: #ffffff">Andrawina Klaten</a>
			        </div>
			    </li>
			</ul>
			<ul class="navbar-nav">
				<a class="nav-link fas fa-sign-out-alt" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;"></a>
				<div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
				    <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">KELUAR</a>
				</div>
			</ul>
		</div> 
	</nav>
<?php }  ?>

<!-- 
		<script type="text/javascript">
			window.onscroll = function() {myFunction()};

			var navbar = document.getElementById("navbar");
			var sticky = navbar.offsetTop;

			function myFunction() {
			  if (window.pageYOffset >= sticky) {
			    navbar.classList.add("sticky")
			  } else {
			    navbar.classList.remove("sticky");
			  }
			}
		</script> -->

