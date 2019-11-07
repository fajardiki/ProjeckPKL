<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center; margin-top: 70px;">
    <h1 class="lead" style="padding: 10px;">Import File Excel</h1>
</div>

  <form method="post" action="<?=site_url()?>C_import/saveimport" class="form-horizontal" enctype="multipart/form-data">           
    <div class="form-group">
        <select class="form-control mb-1" id="conces" name="conces">
          <option value="">-- Pilih Conces --</option>
          <option value="1">Jogja</option>
          <option value="2">Magelang</option>
          <option value="3">Bantul</option>
          <option value="4">Klaten</option>
        </select>
        
        <input type="file" name="file" class="form-control" id="file" required accept=".xls, .xlsx"/></p>
    </div>
    <div class="form-group">
       <input type="submit" class="btn btn-block btn-danger" value="Import" name="import" onclick="return confirm('Anda yakin ingin mengupload file efos ini ?')">
    </div>
  </form>

    <div class="row">
      <div class="col-sm-12">
        <?php
          if (isset($statuspesan)) {
            if ($statuspesan != "sukses") {
          ?>   
              <div class="alert alert-danger" role="alert"><?php echo $isipesan ?></div>
          <?php
            } else {
          ?>
              <div class="alert alert-success" role="alert"><?php echo $isipesan ?></div>
          <?php
              }
            }
        ?>
      </div>
    </div>

        <section style="overflow-x: scroll; height: 350px; margin-bottom: 60px;">
          <table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 10px;">
            <thead class="thead-dark">
              <tr>
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
            <?php if (empty($efos)) { ?>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            <?php } else { ?>
              <?php foreach ($efos as $e) { ?>
              <tbody>
                <tr>
                  <td><?php echo $e['Journey_Date']; ?></td>
                  <td><?php echo $e['District']; ?></td>
                  <td><?php echo $e['Salesman']; ?></td> 
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
            <?php } ?> 
          </table>
        </section>
<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->