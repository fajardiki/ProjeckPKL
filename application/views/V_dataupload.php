<!-- Navbar -->
<?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Content -->

<div class="jumbotron jumbotron-fluid" style="margin: 0; padding: 0; text-align: center; margin-top: 70px;">
    <h1 class="lead" style="padding: 10px;">EFOS SALESMAN</h1>
</div>

<section style="overflow-x: scroll;">   
  <table class="table table-bordered" style="max-width: 100%; height: auto; margin: auto;">
    <thead class="thead-dark">
      <tr align="center">
        <th scope="col">ID Upload</th>
        <th scope="col">Date Upload</th>
        <th scope="col">Name Upload</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
      <?php 
        $no = $this->uri->segment('3') + 1;
        foreach ($data as $du) { ?>
      <tbody>
        <tr>
          <td><?php echo $du['id_upload']; ?></td>
          <td><?php echo $du['date_upload']; ?></td>
          <td><?php echo $du['name_upload']; ?></td>
          <td align="center"><a href="<?php echo base_url().'C_dasbord/hapudatasefos/'.$du['id_upload'] ?>" class="card-link fas fa-trash" style="font-size:15px;" onclick="return confirm('Anda yakin ingin menghapus semua data efos dengan nama file ini ?')"></a></td>
        </tr>
      </tbody>
      <?php } ?>
  </table>
</section>   

<section class="mt-2" style="margin-bottom: 70px;">
  <?php echo $pagination ?>
</section> 

<!-- Akhir Content -->

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->