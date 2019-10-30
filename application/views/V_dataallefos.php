<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Content -->

<h1 class="mt-2" align="center" style="font-size: 3vw;">EFOS SALES</h1>
<hr style="border: 1px solid; width: 10vw; margin-top: 0px; margin-bottom: 30px;">
    <div class="container-fluid" style="overflow-y: scroll; margin: 0;">
      <div class="row">
        <div class="col-sm-12">
          <select class="form-control mb-1" id="conces" name="bulan">
            <option>-- Pilih --</option>
            <option value="1">Mencari</option>
            <option value="2">Menghapus</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 9px; margin: auto;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Date Update</th>
                <th scope="col">Journey Date</th>
                <th scope="col">Route Name</th>
                <th scope="col">Salesman Name</th> 
                <th scope="col">Planned</th>
                <th scope="col">Visite</th>
                <th scope="col">Un-planned</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Spent</th>
                <th scope="col">Time Per Outlet</th>
                <th scope="col">Nosale</th>
                <th scope="col">Productive</th>
                <th scope="col">Geo-mismatch</th>
                <th scope="col">Line</th>
                <th scope="col">Total Qty</th>
                <th scope="col">Total Sale</th>
              </tr>
            </thead>
              <?php 
                $no = $this->uri->segment('3') + 1;
                foreach ($dataefos as $e) { ?>
              <tbody>
                <tr>
                  <td><?php echo $e['Date_Update']; ?></td>
                  <td><?php echo $e['Journey_Date']; ?></td>
                  <td><?php echo $e['District_Code']; ?></td>
                  <td><?php echo $e['Emp_Code']; ?></td> 
                  <td><?php echo $e['Planned']; ?></td>
                  <td><?php echo $e['Visited']; ?></td>
                  <td><?php echo $e['Un_planed']; ?></td>
                  <td><?php echo $e['Start_Time']; ?></td>
                  <td><?php echo $e['End_Time']; ?></td>
                  <td><?php echo $e['Spent']; ?></td>
                  <td><?php echo $e['Time_Per_Outlet']; ?></td>
                  <td><?php echo $e['Nosale']; ?></td>
                  <td><?php echo $e['Productive']; ?></td>
                  <td><?php echo $e['Geo_mismatch']; ?></td>
                  <td><?php echo $e['Line']; ?></td>
                  <td><?php echo $e['Total_Qty']; ?></td>
                  <td><?php echo $e['Total_Sale']; ?></td>
                </tr>
              </tbody>
              <?php } ?>
          </table>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row mt-4">
      <div class="col">
          <?php echo $pagination ?>
      </div>
    </div>
  </div>

<!-- Akhir Content -->

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->