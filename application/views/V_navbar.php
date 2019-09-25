<?php $nama = $this->session->userdata('user'); ?>

<?php if ($nama[0]['status']=='admin') {?>

	<img src="http://www.andrawinadmm.co.id/wp-content/uploads/2017/02/Header2.jpg" class="header-image" width="1518" height="197" alt="" style="max-width: 100%; height: auto;">

	<nav class="navbar navbar-expand-md bg-danger navbar-dark" id="navbar" style="border-radius: 4px;">
	      <!-- Brand -->
	      <a class="navbar-brand" align="" href="<?php echo base_url().'C_dasbord/home'; ?>">Admin</a>
	      
	      <!-- Toggler/collapsibe Button -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <!-- Navbar links -->
	      <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav mr-auto">

	       	<li class="nav-item"> 
	            <a class="nav-link" href="">Home</a>
	        </li>
	         <li class="nav-item"> 
	            <a class="nav-link" href="">Pengaturan</a>
	         </li>
	         <li class="nav-item"> 
	            <a class="nav-link" href="<?php echo base_url().'C_dasbord/importexcel'; ?>">Import Exel</a>
	         </li>
	        </ul>
	        <ul class="navbar-nav">
	        	<span class="navbar-text">
	        		
			     	
			    </span li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            	<img style="width: 35px;" src="">
	              	
	            </a>
	            <div class="dropdown-menu dropdown-menu-right bg-danger" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">Log out</a>
	            </div>
	        </ul>
	      </div> 
	    </nav>

<?php } elseif ($nama[0]['status']=='sales') { ?>

	<img src="http://www.andrawinadmm.co.id/wp-content/uploads/2017/02/Header2.jpg" class="header-image" width="1518" height="197" alt="" style="max-width: 100%; height: auto;">
	<nav class="navbar navbar-expand-md bg-danger navbar-dark" id="navbar" style="border-radius: 4px;">
	      <!-- Brand -->
	      <a class="navbar-brand" align="" href="C_dasbord/home">Seles</a>
	      


	      <!-- Toggler/collapsibe Button -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <!-- Navbar links -->
	      <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav mr-auto">

	       	<li class="nav-item"> 
	            <a class="nav-link" href="">Home</a>
	        </li>
	          <li class="nav-item"> 
	            <a class="nav-link" href="">Pengaturan</a>
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
	            <div class="dropdown-menu dropdown-menu-right bg-danger" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="" style="color: #ffffff">Edit profil</a>
	              <a class="dropdown-item" href="<?php echo base_url().'C_logout/logoutadmin'; ?>" style="color: #ffffff">Log out</a>
	            </div>
	        </ul>
	      </div> 
	    </nav>
<?php } ?>

