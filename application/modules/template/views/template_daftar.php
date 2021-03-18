<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content= "<?= $description;?>"/>
  <meta name="author" content />
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - AWeddy') : 'Login - AWeddy');?></title>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/backend/img/logo/favicon.ico" />

  <link href="<?php echo base_url();?>assets/backend/css/styles.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/backend/css/custom.css" rel="stylesheet" />

  <script data-search-pseudo-elements defer src="<?php echo base_url();?>assets/backend/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pwstrength-bootstrap/2.2.1/pwstrength-bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/backend/plugin/jquery.inputmask.bundle.min.js" crossorigin="anonymous"></script>
</head>
<div id="progressMessage" style="display: none; padding:5px">
  <div id="activityIndicator">&nbsp;</div>
</div>
<body class="bg-cs">
  <nav class="topnav navbar container-fluid navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand" href="<?php echo base_url();?>"><img class="img-fuild py-1" src="<?php echo base_url();?>assets/backend/img/logo/logo-inverse.png" style="width: 65% !important; height: auto !important" alt="logo" /></a>
    <ul class="navbar-nav align-items-center ml-auto">
      <li class="nav-item mr-3 d-md-inline">
        <a class="nav-link" href="https://aweddy.com" role="button">
          <div class="d-md-inline font-weight-500">Landing Page</div>
        </a>
      </li>
      <?php if ($this->session->userdata('logged_in') == FALSE) { ?>
        <li class="nav-item mr-3 d-md-inline">
          <a class="nav-link" href="<?= site_url('login');?>" role="button">
            <div class="d-md-inline font-weight-500">Login</div>
          </a>
        </li>
        <li class="nav-item mr-3 d-md-inline">
          <a class="btn btn-primary btn-sm" href="https://aweddy.com/pricing/" role="button">
            <div class="d-md-inline font-weight-500">Daftar</div>
          </a>
        </li>
      <?php }else { ?>
        <li class="nav-item dropdown no-caret mr-2 dropdown-user">
          <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="https://wedew.id/themes/wedew/assets/images/user-placeholder-groom.png"/></a>
          <div class="d-md-inline font-weight-500"><?php $arr = explode(' ',trim($this->session->userdata('nama'))); echo $arr[0];?></div>
          <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
            <h6 class="dropdown-header d-flex align-items-center">
              <img class="dropdown-user-img" src="https://wedew.id/themes/wedew/assets/images/user-placeholder-groom.png" />
              <div class="dropdown-user-details">
                <div class="dropdown-user-details-name"><?= $this->session->userdata('nama');?></div>
              </div>
            </h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('logout');?>">
              <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
              Keluar
            </a>
          </div>
        </li>
      <?php } ?>
    </ul>
  </nav>

  <?php if ($this->session->flashdata('success')){ ?>
    <!-- Toast success -->
    <div style="position: absolute; top: 4.5rem; right: 1rem; z-index:99 !important">
      <!-- Toast -->
      <div class="toast" id="success_toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header text-success">
          <i data-feather="check-circle"></i>
          <strong class="mr-auto">Notifikasi</strong>
          <small class="text-muted ml-4">baru jasa</small>
          <button class="ml-2 mb-1 close" type="button" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="toast-body"><?= $this->session->flashdata('success'); ?></div>
      </div>
    </div>
  <?php }elseif($this->session->flashdata('error')){ ?>
    <!-- Toast error -->
    <div style="position: absolute; top: 4.5rem; right: 1rem; z-index:99 !important">
      <!-- Toast -->
      <div class="toast" id="error_toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header text-danger">
          <i data-feather="alert-circle"></i>
          <strong class="mr-auto">Terjadi Kesalahan</strong>
          <small class="text-muted ml-4">baru saja</small>
          <button class="ml-2 mb-1 close" type="button" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="toast-body"><?= $this->session->flashdata('error'); ?></div>
      </div>
    </div>
  <?php }elseif($this->session->flashdata('alert')){ ?>
    <!-- Toast error -->
    <div style="position: absolute; top: 1.25rem; right: 1rem; z-index:99 !important">
      <!-- Toast -->
      <div class="toast" id="error_toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header text-warning">
          <i data-feather="alert-circle"></i>
          <strong class="mr-auto">Terjadi Kesalahan</strong>
          <small class="text-muted ml-4">baru saja</small>
          <button class="ml-2 mb-1 close" type="button" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="toast-body"><?= $this->session->flashdata('alert'); ?></div>
      </div>
    </div>
  <?php } ?>

  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <?php $this->load->view($module.'/'.$fileview); ?>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="footer mt-auto footer-dark">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 small">Copyright &#xA9; AWedding 2020</div>
            <div class="col-md-6 text-md-right small">
              <a href="#!">Kebijakan Privasi</a>
              &#xB7;
              <a href="#!">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script type="text/javascript">
  function showProgressCursor() {
    $("#progressMessageLbl").html("Loading....");
    $("#progressMessage").show();
  }
  </script>
  <?php if ($this->session->flashdata('success')){ ?>
    <script>
    $( document ).ready(function() {
      $('#success_toast').toast('show');
    });
    </script>
  <?php }elseif($this->session->flashdata('error')){ ?>
    <script>
    $( document ).ready(function() {
      $('#error_toast').toast('show');
    });
    </script>
  <?php }?>
  <script src="<?php echo base_url();?>assets/backend/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/scripts.js"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/datatables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/datatables/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/momentjs/moment.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
</body>
</html>
