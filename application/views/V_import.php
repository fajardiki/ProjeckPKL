<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->
<div class="container-fluid" style="position:relative; min-height: 100%; margin-top: 60px; margin-bottom: 100px;">
  <form method="post" action="<?=site_url()?>C_import/saveimport" class="form-horizontal" enctype="multipart/form-data"> 
    <h1 align="center">Import File Excel</h1>           
    <div class="form-group">
      <div class="col-sm-12">
        <select class="form-control mb-1" id="conces" name="conces">
          <option>-- Pilih Conces --</option>
          <option value="1">Jogja</option>
          <option value="2">Magelang</option>
          <option value="3">Bantul</option>
          <option value="4">Klaten</option>
        </select>
      </div>
      <div class="col-sm-12">  
        <input type="file" name="file" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
       <input type="submit" class="btn btn-block btn-danger" value="Import" name="import">
      </div>
    </div>
  </form>
  <div class="container-fluid">
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
  </div>

  <div class="container-fluid" style="overflow-y: scroll;">
    <!-- <div class="row">
      <div class="col-sm-3 mb-2">
        <button class="btn">Pilih perncarian</button>
      </div>
      <div class="col-sm-3 mb-2">
        <button class="btn" id="pilih">Wk</button>
      </div>
      <div class="col-sm-3 mb-2">
        <button class="btn" id="pilih">Wk</button>
      </div>
    </div>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#pilih").hide();
            $("h1").hide();
              $("button").click(function(){
                $("#pilih").toggle();
              });

              $("#pilih").click(function() {
                $("h1").show();
              })
            });        
        </script>
    <div class="row">
      <div class="col-sm-12 mb-2">
        <h1>QQQQQ</h1>

      </div>
    </div> -->
    <div class="row">
      <div class="col-sm-12">
          <table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 10px; margin: auto;">
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
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->