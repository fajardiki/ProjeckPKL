
<?php $nama = $this->session->userdata('user'); ?>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->
<section style="margin-top: 70px;">
	<?php if (isset($rank)) {
		// Productive Call
		$this->load->view('Diagram/V_diagramranked');
		
	} else{

	}?>

	<!-- <?php if (isset($rankplane)) {
		// Plan productive
		$this->load->view('Diagram/V_diagramrankplaneproductive');
	} else {
		# code...
	}
	 ?> -->
</section>

<section>
	<!-- Informasi -->
    <?php if (!isset($info) AND !empty($info)) {
    	
    } else {
		// Diagram
    	$this->load->view('Diagram/V_diagramproductive');
    	
    	// Diagram
    	$this->load->view('Diagram/V_diagramnosale');
    	
    	// // Diagram
    	$this->load->view('Diagram/V_diagramunvisite');

    	
    } ?>
   <!-- End -->	
</section>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->