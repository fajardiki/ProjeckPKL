<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body style="font-family: cambria; padding:0; height: 100%;">

  <!-- Navbar -->
  <?php $this->load->view('V_navbar'); ?>
  <!-- Akhir -->
<div class="container-fluid" style="position:relative; min-height: 100%; margin-top: 70px;">
  <form method="post" action="<?=site_url()?>C_import/saveimport" class="form-horizontal" enctype="multipart/form-data"> 
    <h5 align="center">Import File Excel di sini!!</h5>           
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
          <table class="table" style="max-width: 100%; height: auto; font-size: 10px; margin: auto;">
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
                  <td>/</td>
                  <td>/</td>
                  <td>/</td> 
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td> 
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td> 
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td> 
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td> 
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
                  <td>/</td>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>