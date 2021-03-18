<div class="container">
  <div class="text-center mb-5 mt-5">
    <div class="text-gray-600 text-xl title font-weight-800">Pilih paket idamanmu</div>
    <div class="text-gray-500 small">Miliki undangan digital hanya dengan 4 langkah mudah!</div>
  </div>
  <!-- Pricing columns example-->
  <div class="pricing-columns">
    <div class="row justify-content-center">
      <!-- Pricing column 1-->
      <div class="col-xl-4 col-lg-6 mb-4 mb-xl-0">
        <div class="card h-100">
          <div class="card-header bg-transparent">
            <span class="badge badge-primary-soft text-primary badge-pill py-2 px-3 mb-2">Paket <?= $kasih->NAMA_PAKET;?></span>
            <div class="pricing-columns-price">
              Rp.<?= number_format($kasih->HARGA_PRIM, 0, ", ", ".");?>
              <span>/<s>Rp.<?= number_format($kasih->HARGA_DISC, 0, ", ", ".");?></s></span>
            </div>
          </div>
          <div class="card-body p-0">
            <ul class="list-group list-group-flush">
              <?php foreach ($d_kasih as $key) {?>
                <li class="list-group-item">
                  <i class="text-primary mr-2" data-feather="check-circle"></i>
                  <?= $key->FITUR;?>
                </li>
              <?php } ?>
            </ul>
          </div>
          <a class="card-footer d-flex align-items-center justify-content-between text-decoration-none bg-primary-soft" href="<?= site_url('daftar/'.$kasih->KODE_PAKET);?>">
            Mulai sekarang!
            <i data-feather="arrow-right"></i>
          </a>
        </div>
      </div>
      <!-- Pricing column 2-->
      <div class="col-xl-4 col-lg-6 mb-4 mb-xl-0">
        <div class="card h-100">
          <div class="card-header bg-transparent">
            <span class="badge badge-secondary-soft text-secondary badge-pill py-2 px-3 mb-2">Paket <?= $sayang->NAMA_PAKET;?></span>
            <div class="pricing-columns-price">
              Rp.<?= number_format($sayang->HARGA_PRIM, 0, ", ", ".");?>
              <span>/<s>Rp.<?= number_format($sayang->HARGA_DISC, 0, ", ", ".");?></s></span>
            </div>
          </div>
          <div class="card-body p-0">
            <ul class="list-group list-group-flush">
              <?php foreach ($d_sayang as $key) {?>
                <li class="list-group-item">
                  <i class="text-secondary mr-2" data-feather="check-circle"></i>
                  <?= $key->FITUR;?>
                </li>
              <?php } ?>
            </ul>
          </div>
          <a class="card-footer d-flex align-items-center justify-content-between text-secondary bg-secondary-soft text-decoration-none" href="<?= site_url('daftar/'.$sayang->KODE_PAKET);?>">
            Mulai sekarang!
            <i data-feather="arrow-right"></i>
          </a>
        </div>
      </div>
      <!-- Pricing column 3-->
      <div class="col-xl-4 col-lg-6">
        <div class="pricing-table">
          <div class="card h-100">
            <div class="card-header bg-transparent">
              <span class="badge badge-success-soft text-success badge-pill py-2 px-3 mb-2">Paket <?= $cinta->NAMA_PAKET;?></span>
              <div class="pricing-columns-price">
                Rp.<?= number_format($cinta->HARGA_PRIM, 0, ", ", ".");?>
                <span>/<s>Rp.<?= number_format($cinta->HARGA_DISC, 0, ", ", ".");?></s></span>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="list-group list-group-flush">
                <?php foreach ($d_cinta as $key) {?>
                  <li class="list-group-item">
                    <i class="text-success mr-2" data-feather="check-circle"></i>
                    <?= $key->FITUR;?>
                  </li>
                <?php } ?>
              </ul>
            </div>
            <a class="card-footer d-flex align-items-center justify-content-between text-success bg-success-soft text-decoration-none" href="<?= site_url('daftar/'.$cinta->KODE_PAKET);?>">
              Mulai sekarang!
              <i data-feather="arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
