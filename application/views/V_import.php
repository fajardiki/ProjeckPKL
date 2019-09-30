<form method="post" action="<?=site_url()?>C_import/saveimport" class="form-horizontal" enctype="multipart/form-data"> 
  <h5 align="center">Import File Excel di sini!!</h5>           
  <div class="form-group">
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

<div class="container-fluid" style="overflow: hidden;">
  <table class="table" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
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
  </table>
</div>