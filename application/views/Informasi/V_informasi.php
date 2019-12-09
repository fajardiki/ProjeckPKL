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