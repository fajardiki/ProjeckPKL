<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Navbar efos -->
<?php $this->load->view('V_navbarsales'); ?>
<!-- Akhir -->

<div class="jumbotron jumbotron-fluid mb-1" style="margin: 0; padding: 0; text-align: center; height: 50px;">
    <h1 class="lead pt-3">EFOS Sales</h1>
</div>

<form class="input-group mb-2" action="<?php echo base_url().'C_dasbord/efosallselect' ?>" method="post">
  <input type="month" class="form-control border border-secondary" name="tanggal">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-secondary" type="button" value="Cari" name="cari">
  </div>
</form>

<section style="overflow-x: scroll; margin-bottom: 10%;">	
<table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Week</th>
      <th scope="col">PJB_Comply</th>
      <th scope="col">Produktive_Call</th>
      <th scope="col">Geo_Match</th>
      <th scope="col">Time_In_Market</th>
      <th scope="col">Spent_In_Market</th>
      <th scope="col">Time_Per_Outlet</th>
      <th scope="col">Outlet_Nosale</th>
      <th scope="col">%Outlet_Nosale</th>
      <th scope="col">Total_Penjualan</th>
      <th scope="col">PJB_Planed</th>
      <th scope="col">PJP_Unplaned</th>
      <th scope="col">Productive_Call</th>
    </tr>
  </thead>
  <?php foreach ($efossales as $ea) { ?>
  <tbody>
    <tr>
      <td><?php echo $ea['Week']; ?></td>
      <td><?php echo intval($ea['PJP_COMPLY']).'%'; ?></td>
      <td><?php echo intval($ea['PRODUCTIVE_CALL']).'%'; ?></td>
      <td><?php echo intval($ea['GEOMATCH']).'%'; ?></td>
      <td><?php echo $ea['TimeInMarket']; ?></td>
      <td><?php echo $ea['Spent']; ?></td>
      <td><?php echo $ea['TimePerOutlet']; ?></td>
      <td><?php echo $ea['Nosale']; ?></td>
      <td><?php echo intval($ea['NosalePersen']).'%'; ?></td>
      <td><?php echo number_format($ea['TotalSale'],2,',','.'); ?></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
  <?php } ?>
</table>
</section>

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->