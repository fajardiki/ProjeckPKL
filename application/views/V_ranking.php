
<?php $nama = $this->session->userdata('user'); ?>

<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<section style="margin-top: 70px;">
    <form class="input-group mb-2" action="<?php echo base_url().'C_dasbord/ranking' ?>" method="post">
      <input type="month" class="form-control border border-secondary" name="tanggal">
      <div class="input-group-append">
        <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari">
      </div>
    </form>

	<?php if (isset($rank) AND !empty($rank)) {
		// Productive Call
		$this->load->view('Diagram/V_diagramranked');
		
	} else{

	}?>

	<!-- Informasi -->
    <?php if (isset($infoplush) AND !empty($infoplush)) {
    	// Diagram
        $this->load->view('Diagram/V_diagramproductive');

        // Diagram
        $this->load->view('Diagram/V_diagramunplane');

        // Diagram
        $this->load->view('Diagram/V_diagramnosale');
        
        // // Diagram
        $this->load->view('Diagram/V_diagramunvisite');

    } else {
    	
    } ?>
   <!-- End -->	
</section>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->