<?php $nama = $this->session->userdata('user'); ?>


<?php if ($nama[0]['status']=='admin') {?>

<img src="http://www.andrawinadmm.co.id/wp-content/uploads/2017/02/Header2.jpg" class="header-image" width="1518" height="197" alt="" style="min-width: 100%; height: auto; width: 100px;"> 

	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
	      <!-- Brand -->
	      <a class="navbar-brand" align="" href="#">ADMIN</a>
	      
	      <!-- Toggler/collapsibe Button -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <!-- Navbar links -->
	      <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav mr-auto">

	       	<li class="nav-item">
	            <a class="nav-link" href="<?php echo base_url().'C_dasbord/home'; ?>">BERANDA</a>
	        </li>
	        <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              ADMM
	            </a>
	            <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="<?php echo base_url().'C_jogja' ?>" style="color: #ffffff">Andrawina Jogja</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_magelang' ?>" style="color: #ffffff">Andrawina Magelang</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_bantul' ?>" style="color: #ffffff">Andrawina Bantul</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_klaten' ?>" style="color: #ffffff">Andrawina Klaten</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_sleman' ?>" style="color: #ffffff">Andrawina Sleman</a>
	            </div>
	        </li>
	        <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              EFOS
	            </a>
	            <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="<?php echo base_url().'C_jogja/efos'; ?>" style="color: #ffffff">Andrawina Jogja</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_magelang/efos'; ?>" style="color: #ffffff">Andrawina Magelang</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_bantul/efos'; ?>" style="color: #ffffff">Andrawina Bantul</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_klaten/efos'; ?>" style="color: #ffffff">Andrawina Klaten</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_sleman/efos'; ?>" style="color: #ffffff">Andrawina Sleman</a>
	            </div>
	        </li>
	        <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              SALESMAN
	            </a>
	            <div class="dropdown-menu bg-dark mt-2" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="<?php echo base_url().'C_jogja/updatesales'; ?>" style="color: #ffffff">Andrawina Jogja</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_magelang/updatesales'; ?>" style="color: #ffffff">Andrawina Magelang</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_bantul/updatesales'; ?>" style="color: #ffffff">Andrawina Bantul</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_klaten/updatesales'; ?>" style="color: #ffffff">Andrawina Klaten</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_sleman/updatesales'; ?>" style="color: #ffffff">Andrawina Sleman</a>
	            </div>
	        </li>
	         <li class="nav-item"> 
	            <a class="nav-link" href="<?php echo base_url().'C_dasbord/importexcel'; ?>">IMPORT EXCEL</a>
	         </li>
	        </ul>
	        <ul class="navbar-nav">
	        	<span class="navbar-text">
	        		
			     	
			    </span li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              	
	            </a>
	            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">LOG OUT</a>
	            </div>
	        </ul>
	      </div> 
	    </nav>

<?php } elseif ($nama[0]['status']=='sales') { ?>

<img src="http://www.andrawinadmm.co.id/wp-content/uploads/2017/02/Header2.jpg" class="header-image" width="1518" height="197" alt="" style="max-width: 100%; height: auto;">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
	      <!-- Brand -->
	      <a class="navbar-brand" align="" href="">SALES</a>
	      


	      <!-- Toggler/collapsibe Button -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <!-- Navbar links -->
	      <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav mr-auto">

	       	<li class="nav-item"> 
	            <a class="nav-link" href="<?php echo base_url().'C_dasbord/home'; ?>">BERANDA</a>
	        </li>
	          <li class="nav-item"> 
	            <a class="nav-link" href="">EFOS</a>
	          </li>
	          <li class="nav-item"> 
	            <a class="nav-link" href=""></a>
	          </li>
	        </ul>
	        <ul class="navbar-nav">
	        	<span class="navbar-text">
	        		
			     	
			    </span li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            	<img style="width: 35px;" src="">
	              	
	            </a>
	            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">Log out</a>
	            </div>
	        </ul>
	      </div> 
	    </nav>
<?php } ?>