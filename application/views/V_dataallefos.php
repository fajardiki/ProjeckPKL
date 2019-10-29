<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Content -->

<h1 class="mt-2" align="center" style="font-size: 3vw;">EFOS SALES</h1>
<hr style="border: 1px solid; width: 10vw; margin-top: 0px; margin-bottom: 30px;">

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
                  <td scope="col">Journey Date</td>
                  <td scope="col">Route Name</td>
                  <td scope="col">Salesman Name</td> 
                  <td scope="col">Planned</td>
                  <td scope="col">Visite</td>
                  <td scope="col">Un-planned</td>
                  <td scope="col">Start Time</td>
                  <td scope="col">End Time</td>
                  <td scope="col">Spent</td>
                  <td scope="col">Time Per Outlet</td>
                  <td scope="col">Nosale</td>
                  <td scope="col">Producktive</td>
                  <td scope="col">Geo-mismatch</td>
                  <td scope="col">Line</td>
                  <td scope="col">Total Qty</td>
                  <td scope="col">Total Sale</td>
                </tr>
              </tbody>
            <?php } ?>
            
          </table>
      </div>
    </div>

<!-- Akhir Content -->

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->