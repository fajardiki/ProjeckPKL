<hr style="border: 0.5px solid">

<section style="overflow-y: scroll; height: 300px;">
    <table class="table table-bordered" style="max-width: 100%; height: auto; font-size: 11px; margin: auto;">
      <thead align="center">
        <tr>
            <th scope="col">Day</th>
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
      <?php 
        foreach ($info as $i) {
            $day = $i['Day'];
            $jd = date("j F Y", strtotime($i['Journey_Date']));
            $planned = number_format($i['Planned']);
            $unplanned = number_format($i['Un_planed']);
            $visited = number_format($i['Visited']);
            $stattime = $i['Start_Time'];
            $endtime = $i['End_Time'];
            $nosale = number_format($i['Nosale']);
            $pjpcomply = intval($i['pjp_comply']);
            $nosalepersen = intval($i['NosalePersen']);
            $productivecall = intval($i['Productive_Call']);
            $totalsale = number_format($i['Total_Sale'],2,',','.');
        ?>
      <tbody>
        <tr>
          <td><?php if ($day == "Monday") {
              echo "Senin, $jd";
          } elseif ($day == "Tuesday") {
              echo "Selasa, $jd";
          } elseif ($day == "Wednesday") {
              echo "Rabu, $jd";
          } elseif ($day == "Thursday") {
              echo "Kamis, $jd";
          } elseif ($day == "Friday") {
              echo "Jumat, $jd";
          } elseif ($day == "Saturday") {
              echo "Sabtu, $jd";
          } else {
             echo "Minggu, $jd";
          } ; ?></td>
          <td><?php echo $planned ?></td>
          <td><?php echo $unplanned ?> </td>
          <td><?php echo $visited ?></td>

          <td><?php echo $stattime ?></td>
                <td><?php echo $endtime ?></td>
                <td><?php echo $nosale ?></td>
                
                <!-- Pjp comply -->
                <?php if ($pjpcomply < 95) { ?>
                  <td class="min"><?php echo $pjpcomply. '%' ?></td>
                <?php } else { ?>
                  <td><?php echo $pjpcomply. '%' ?></td>
                <?php } ?>

                <!-- Nosale percent -->
                <?php if ($nosalepersen > 10) { ?>
                  <td class="min"><?php echo $nosalepersen. '%' ?></td>
                <?php } else { ?>
                  <td><?php echo $nosalepersen.'%' ?></td>
                <?php } ?>

                <!-- Productive call -->
                <?php if ($productivecall < 85 ) { ?>
                  <td class="min"><?php echo $productivecall.'%'; ?></td>
                <?php } else { ?>
                  <td><?php echo $productivecall.'%'; ?></td>
                <?php } ?>

                <td><?php echo "Rp " .$totalsale ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
</section>

<h2 class="mt-4 mb-0 pb-0" align="center">Informasi Tambahan</h2>

<section>
    <?php 
    foreach ($infoplush as $ip) {
        $months = $ip['Month'];
        $days = $ip['Day'];
        $namas = $ip['Salesman'];
        $districts = $ip['District'];
        $Unvisiteds[] = intval($ip['Unvisited']);
        $nosales[] = intval($ip['Nosale']);
    ?>
    
    <?php } ?>
    <h4 align="center">Nilai rata - rata bulan <?php echo $months; ?></h4>

    <table class="table table-bordered">
        <tr>
            <td>Nama</td>
            <td><?php echo $namas; ?></td>
        </tr>
        <tr> 
            <td>Outlet Nosale tertinggi</td>
            <td><?php echo max($nosales); ?> Outlet</td>
        </tr>
        <tr> 
            <td>Outlet tidak dikunjungi tertinggi</td>
            <td><?php echo max($Unvisiteds); ?> Outlet</td>
        </tr>
    </table>
    
</section> 