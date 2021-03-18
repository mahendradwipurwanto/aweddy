<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content= "<?= $description;?>"/>
  <meta name="author" content />
  <title>404 Not Found - AWeddy</title>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/backend/img/logo/favicon.ico" />

  <link href="<?php echo base_url();?>assets/backend/css/styles.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/backend/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="<?php echo base_url();?>assets/backend/css/plugin/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
  <script data-search-pseudo-elements defer src="<?php echo base_url();?>assets/backend/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-white">
  <?php $this->load->view($module.'/'.$fileview); ?>

  <script src="<?php echo base_url();?>assets/backend/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/scripts.js"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/datatables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/datatables/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/momentjs/moment.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
</body>
