<?php $nama = $this->session->userdata('user'); ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
body {
  font-family: 'Lato', sans-serif;
}
</style>
</head>
<body>

<!-- Navbar -->
  <?php $this->load->view('V_navbar'); ?>
<!-- Akhir -->

<!-- Content -->
<div class="container-fluid" style="margin-top: 15px; margin-bottom: 70px;">

<?php if ($nama[0]['status']=='admin') {
  if (isset($side1)) {
    $this->load->view($side1);
  } elseif (isset($side2)) {
    $this->load->view($side2);
  } elseif (isset($side3)) {
    $this->load->view($side3);
  }else {
    $this->load->view($side2);
  }
} elseif ($nama[0]['status']=='sales') {
  if (isset($laman1)) {
    $this->load->view($laman1);
  }
}?>

</div>

<!-- End Content -->

<!-- Footer -->
<?php $this->load->view('V_footer'); ?>
<!-- Akhir Footer -->

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
</body>
</html>
