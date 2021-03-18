<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-10 ">
      <!-- Social login form-->
      <div class="row justify-content-center">
        <img class="img-fuild" src="<?php echo base_url();?>assets/backend/img/logo/logo-inverse.png" style="width: !important" alt="logo" />
      </div>
      <div class="card my-4 shadow">
        <div class="card-body" style="padding-bottom: 8px !important;">
          <div class="text-gray-700 text-lg title font-weight-600">Login</div>
          <div class="text-gray-500 small">Silahkan masukkan <span class="badge badge-primary">Email</span> & <span class="badge badge-primary">Password</span> anda</div>
        </div>
        <div class="card-body p-4" style="padding-top: 0px !important">
        <hr class="my-0 mb-3" />
          <!-- login form-->
          <form action="<?php echo site_url('authentication')?>" method="POST" autocomplete="on">
            <div class="form-group">
              <label class="small text-muted" for="email">Email</label>
              <input class="form-control form-control-solid py-2" type="email" name="email" id="email" placeholder-aria-label="Username" aria-describedby="Username" required/>
            </div>
            <div class="form-group">
              <label class="small text-muted" for="password">Password </label><a class="small text-blue-75 no-dec float-right" href="<?php echo site_url('lupa-password');?>">Lupa Password?</a>
              <input class="form-control form-control-solid py-2" type="password" name="password" id="password" minlength="4" placeholder-aria-label="Password" aria-describedby="Password" required />
            </div>
            <!-- Form Group (forgot password link)-->
            <!-- Form Group (login box)-->
            <div class="form-group d-flex align-items-center justify-content-between mb-0">
              <button type="submit" class="btn btn-primary btn-block shadow-lg pull-right" onclick="showProgressCursor();">Masuk</button>
            </div>
          </form>
        </div>
      </div>
      <a href="https://aweddy.com/pricing/" class="btn shadow-sm btn-outline-primary btn-block">Daftar</a>
    </div>
  </div>
</div>
