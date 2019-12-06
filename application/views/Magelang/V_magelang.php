<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Content -->
<div class="col" align="center" style="padding: 15px; background-color: #cccccc; margin-top: 50px">
	<h3>EFOS ADMM CONCES MAGELANG</h3>
</div>

<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center;">
    <?php if (!empty($summary)) { ?>
      <?php foreach ($summary as $s) {} ?>
        <h1 class="lead">Summary week <?php echo $s['Week']; ?>, <?php echo $s['Year']; ?></h1>
    <?php } else { ?>
      <h1 class="lead">Summary..</h1>
    <?php } ?>                
</div>

<!-- Shearch -->
<form class="input-group mb-2" action="<?php echo base_url().'C_magelang' ?>" method="post">
  <input type="week" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari">
  </div>
</form>

<section class="mb-2" align="right">
  <a class="btn btn-danger" id="cetak" id='btn' value='Print' onclick='printDiv();' style="min-width: 100%; width: 100%;"><i class="fa fa-print"></i></a>
</section>

<!-- Summary -->
<section class="tableFixHead" style="height: 350px;">
    <section id="printArea">
      <section id="head" style="margin-bottom: 25px" hidden="true">
        <div class="row">
          <div class="col-sm-2 left" align="center">
            <img style="width: 130px;" src="<?php echo base_url().'assets/img/Walls_Logo.svg.png' ?>">
          </div>
          <div class="col-sm-8 center" align="center">
            <br>
            <h3>PT. Andrawina Darma Manunggal Mulya Yogyakarta</h3>
            <h4>Jl. Soekarno Hatta Nampik Bumirejo Mungkit Magelang 56512.</h4>
          </div>
          <div class="col-sm-2 right" align="center">
            <img style="width: 160px;" src="<?php echo base_url().'assets/img/CONCESSMAGELANG.png' ?>">
          </div>
        </div>
      </section>
      <section id="namasales" hidden="true">
        <section align="center">
          <h3>Summary Magelang <?php echo $summary[0]['Year']; ?></h3>
        </section>
        <hr style="width: 150px; height: 1px;">
      </section>
        <table class="table table-bordered" style="max-width: 100%; width: 100%; height: auto; font-size: 11px; margin: auto;">
            <thead class="thead-dark" align="center">  
                <tr>
                    <th scope="col">Salesman</th>
                    <th scope="col">Planned</th>
                    <th scope="col">Un-planed</th>
                    <th scope="col">Visited</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Nosale</th>
                    <th scope="col">PJP-Comply</th>
                    <th scope="col">No-Sale</th>
                    <th scope="col">Productive-Call</th>
                    <th scope="col">Total Penjualan</th>  
                  </tr>
           	</thead>
           	<?php if (!empty($summary)) { ?>
           	    <?php foreach ($summary as $sm) { 
           	    	$jd = $sm['Journey_Date'];
                  $week = $sm['Week'];
                  $empcode = $sm['Emp_Code']; 
        	   	    $saless = $sm['Salesman'];
            			$planneds = number_format($sm['Planned']);
            			$unplanneds = number_format($sm['Un_planed']);
            			$visiteds = number_format($sm['Visited']);
            			$stattimes = $sm['Start_Time'];
            			$endtimes = $sm['End_Time'];
            			$nosales = number_format($sm['Nosale']);
            			$pjpcomplys = intval($sm['pjp_comply']);
            			$nosalepersens = intval($sm['NosalePersen']);
            			$productivecalls = intval($sm['Productive_Call']);
            			$totalsales = number_format($sm['Total_Sale'],0,',','.');
               	?>
           	<tbody>
                <tr>
                	<td><a class="sales" href="<?php echo base_url().'C_magelang/index/'.$empcode.'/'.$jd ?>"><?php echo $saless ?></a></td>
                    <td><?php echo $planneds ?></td>
                    <td><?php echo $unplanneds ?></td>
                    <td><?php echo $visiteds ?></td>
                    <td><?php echo $stattimes ?></td>
                    <td><?php echo $endtimes ?></td>
                    <td><?php echo $nosales ?></td>
                        
        			<!-- Pjp comply -->
        			<?php if ($pjpcomplys < 95) { ?>
        			  <td class="min"><?php echo $pjpcomplys. '%' ?></td>
        			<?php } else { ?>
        			  <td><?php echo $pjpcomplys. '%' ?></td>
        			<?php } ?>

        			<!-- Nosale percent -->
        			<?php if ($nosalepersens > 10) { ?>
        			  <td class="min"><?php echo $nosalepersens. '%' ?></td>
        			<?php } else { ?>
        			  <td><?php echo $nosalepersens.'%' ?></td>
        			<?php } ?>

        	 		<!-- Productive call -->
        			<?php if ($productivecalls < 85 ) { ?>
        			  <td class="min"><?php echo $productivecalls.'%'; ?></td>
        			<?php } else { ?>
        			  <td><?php echo $productivecalls.'%'; ?></td>
        			<?php } ?>
        		
                    <td><?php echo "Rp " .$totalsales ?></td>
                </tr>
            </tbody>
            	<?php } ?>
            <?php } else { ?>
            
            <?php } ?>
        </table>
        <section id="foot" hidden="true">
          <p>* Warna <span id="merah"><i>merah</i></span> berarti target tidak tercapai</p>
        </section>
    </section>
</section>

	<!-- Planned -->
	<?php if (empty($plane)) { 

    } else {
    	$this->load->view('Diagram/V_diagramplaneconces');
  	} ?>

  	<!-- Time -->
    <?php if (empty($timemarket)) { 

    } else { 
      	$this->load->view('Diagram/V_diagramtimeconces');
    } ?>

  	<!-- PJP Comply -->
  	<?php if (empty($pjpcomply)) { 

  	} else { 
  		$this->load->view('Diagram/V_diagrampjpconces');
  	} ?>
	<!-- Akhir PJP Comply -->

<!-- Akhir Content-->

<!-- Informasi -->
    <?php if (!isset($info)) {
    	
    } else {
    	$this->load->view('Informasi/V_informasi');

      // Diagram
      $this->load->view('Diagram/V_diagramproductive');
      
    	// Diagram
    	$this->load->view('Diagram/V_diagramnosale');
    	
    	// // Diagram
    	$this->load->view('Diagram/V_diagramunvisite');

    	
    } ?>
   <!-- End -->	

<script>
  function printDiv()  {
    var head = document.getElementById('head');
    var foot = document.getElementById('foot');
    var divToPrint=document.getElementById('printArea');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><head><style> .left {position: absolute; top: 0; left: 0; margin-left:10px; margin-top: 10px;} .right {position: absolute; right: 0; top: 0; margin-right: 10px;} #merah {color:#CC0033} #head {padding: 0; margin: 0;} body {font-family: cambria;} .sales {color: #000;} .thead-dark {background-color: #000;color: #fff;} .min {background-color: #CC0033;color: #fff;} table {border-collapse: collapse;} table, th, td {  border: 1px solid black;} hr {height:1px;} th, td {  padding: 15px;  text-align: left;}</style></head><body onload="window.print()">'+head.innerHTML+"<hr>"+namasales.innerHTML+divToPrint.innerHTML+foot.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);
  }

</script>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer