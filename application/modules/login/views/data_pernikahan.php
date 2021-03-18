<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/stepy.css">

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-8 col-md-6 col-sm-8 col-xs-10 ">
      <!-- Social login form-->
      <div class="card my-4 shadow">
        <div class="card-body p-4">
          <!-- login form-->
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#mulai" data-toggle="tab" aria-controls="mulai" role="tab" aria-expanded="true"><span class="round-tab">1 </span> </a>
                </li>
                <li role="presentation" class="disabled">
                  <a href="#pasangan" data-toggle="tab" aria-controls="pasangan" role="tab" aria-expanded="false"><span class="round-tab">2</span> </a>
                </li>
                <li role="presentation" class="disabled">
                  <a href="#agenda" data-toggle="tab" aria-controls="agenda" role="tab"><span class="round-tab">3</span> </a>
                </li>
                <li role="presentation" class="disabled">
                  <a href="#tema" data-toggle="tab" aria-controls="tema" role="tab"><span class="round-tab">4</span> </a>
                </li>
                <li role="presentation" class="disabled">
                  <a href="#bagikan" data-toggle="tab" aria-controls="bagikan" role="tab"><span class="round-tab">5</span> </a>
                </li>
              </ul>
            </div>

            <form role="form" action="<?php echo site_url('login/kirim_pendaftaran');?>" method="post" enctype="multipart/form-data" class="login-box">
              <div class="tab-content" id="main_form">
                <div class="tab-pane active" role="tabpanel" id="mulai">
                  <div class="row mb-4">
                    <div class="col-md-12 text-center">
                      <div class="text-gray-700 text-xl font-weight-700">Selamat Datang</div>
                      <div class="text-gray-500 small">Ceritakan tentang pernikahanmu untuk membuat undangan yang spesial.</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="JUDUL">Judul <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="JUDUL" required>
                        <small class="text-muted">Contoh: Pernikahan Jhon & Doe</small>
                      </div>
                      <div class="form-group">
                        <label for="PLAN_DATE">Tanggal Pernikahan</label>
                        <input class="form-control" type="date" name="PLAN_DATE">
                        <small class="text-muted">Kosongi jika belum pasti.</small>
                      </div>
                    </div>
                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-light btn-block next-step">Lanjutkan <i class="fa fa-chevron-right ml-2"></i> </button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="pasangan">
                  <div class="row mb-4">
                    <div class="col-md-12 text-center">
                      <div class="text-gray-700 text-xl font-weight-700">Bio Pasangan</div>
                      <div class="text-gray-500 small">Isi data diri pasanganmu, untuk diberitahukan kepada para tamu.</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-0">
                      <div class="form-group mb-0">
                        <div class="text-gray-600 text-lg font-weight-500">Mempelai Pria</div>
                      </div>
                      <div class="form-group">
                        <label>Foto</label><br class="mb-0">
                        <label for="GETP_FOTO" class="upload-card">
                          <img id="P_FOTO" class="mb-2 upload-img P_FOTO w-100 pointer" src="<?php echo base_url();?>assets/backend/img/Pickanimage.png" alt="Placeholder">
                        </label>
                        <input type="file" id="GETP_FOTO" class="form-control-file hide" name="P_FOTO"  onchange="previewP_FOTO(this);" accept="image/*">
                      </div>
                      <div class="form-group">
                        <label>Nama <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="P_NAMA" required>
                      </div>
                      <div class="form-group">
                        <label for="P_KELUARGA">Keluarga </label>
                        <textarea class="form-control" type="text" rows="2" name="P_KELUARGA"></textarea>
                        <small class="text-muted">Contoh: Keluarga Jhon Doe</small>
                      </div>
                      <div class="form-group">
                        <label for="P_INSTAGRAM">Username Instagram</label>
                        <div class="input-group input-group-joined">
                          <div class="input-group-prepend">
                            <span class="input-group-text p-2">
                              @
                            </span>
                          </div>
                          <input class="form-control" type="text" name="P_INSTAGRAM"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-0">
                        <div class="text-gray-600 text-lg font-weight-500">Mempelai Wanita</div>
                      </div>
                      <div class="form-group">
                        <label>Foto</label><br class="mb-0">
                        <label for="GETW_FOTO" class="upload-card">
                          <img id="W_FOTO" class="mb-2 upload-img w-100 W_FOTO pointer" src="<?php echo base_url();?>assets/backend/img/Pickanimage.png" alt="Placeholder">
                        </label>
                        <input type="file" id="GETW_FOTO" class="form-control-file hide" name="W_FOTO"  onchange="previewW_FOTO(this);" accept="image/*">
                      </div>
                      <div class="form-group">
                        <label>Nama <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="W_NAMA" required>
                      </div>
                      <div class="form-group">
                        <label for="W_KELUARGA">Keluarga </label>
                        <textarea class="form-control" type="text" rows="2" name="W_KELUARGA"></textarea>
                        <small class="text-muted">Contoh: Keluarga Jhon Doe</small>
                      </div>
                      <div class="form-group">
                        <label for="W_INSTAGRAM">Username Instagram</label>
                        <div class="input-group input-group-joined">
                          <div class="input-group-prepend">
                            <span class="input-group-text p-2">
                              @
                            </span>
                          </div>
                          <input class="form-control" type="text" name="W_INSTAGRAM"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">
                    <div class="col-md-2 pr-0">
                      <button type="button" class="btn btn-light btn-block prev-step"><i class="fa fa-chevron-left fa-lg"></i></button>
                    </div>
                    <div class="col-md-10">
                      <button type="button" class="btn btn-light btn-block next-step">Lanjutkan <i class="fa fa-chevron-right ml-2"></i></button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="agenda">
                  <div class="row mb-4">
                    <div class="col-md-12 text-center">
                      <div class="text-gray-700 text-xl font-weight-700">Rangkaian Agenda Pernikahan</div>
                      <div class="text-gray-500 small">Atur agenda pernikahanmu agar membantu tamu, jika belum pati kamu dapat mengaturnya nanti.</div>
                    </div>
                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">
                    <div class="col-md-6 mt-4 mb-2">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <div class="text-gray-600 font-weight-500">Akad Nikah
                            <button type="button" class="btn btn-sm btn-light float-right" data-toggle="modal" data-target="#akad"> <i class="fa fa-pencil-alt mr-1"></i> Ubah</button>
                          </div>
                          <input type="hidden" name="JUDUL[]" value="Akad Nikah">
                          <input type="hidden" name="TANGGAL[]" value="">
                          <input type="hidden" name="WAKTU[]" value="">
                          <input type="hidden" name="LOKASI[]" value="">
                          <small> <i class="fa fa-clock mr-2"></i> <span id="akad-time"> 08:00 - selesai</span></small><br>
                          <small> <i class="fa fa-calendar mr-2"></i> <span id="akad-date"> 29 July 2021</span></small><br>
                          <small> <i class="fa fa-map-marker-alt mr-2"></i> <span id="akad-lokasi"> Belum ditentukan</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mt-4 mb-2">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <div class="text-gray-600 font-weight-500">Resepsi
                            <button type="button" class="btn btn-sm btn-light float-right" data-toggle="modal" data-target="#akad"> <i class="fa fa-pencil-alt mr-1"></i> Ubah</button>
                          </div>
                          <input type="hidden" name="JUDUL[]" value="Resepsi">
                          <input type="hidden" name="TANGGAL[]" value="">
                          <input type="hidden" name="WAKTU[]" value="">
                          <input type="hidden" name="LOKASI[]" value="">
                          <small> <i class="fa fa-clock mr-2"></i> <span id="akad-time"> 08:00 - selesai</span></small><br>
                          <small> <i class="fa fa-calendar mr-2"></i> <span id="akad-date"> 29 July 2021</span></small><br>
                          <small> <i class="fa fa-map-marker-alt mr-2"></i> <span id="akad-lokasi"> Belum ditentukan</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-4">
                      <small class="text-muted">Anda dapat mengelolah rangkaian agenda pernikahan anda nanti.</small>
                    </div>
                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">
                    <div class="col-md-2 pr-0">
                      <button type="button" class="btn btn-light btn-block prev-step"><i class="fa fa-chevron-left fa-lg"></i></button>
                    </div>
                    <div class="col-md-10">
                      <button type="button" class="btn btn-light btn-block next-step">Lanjutkan <i class="fa fa-chevron-right ml-2"></i></button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tema">
                  <div class="row mb-4">
                    <div class="col-md-12 text-center">
                      <div class="text-gray-700 text-xl font-weight-700">Pilih Tema</div>
                      <div class="text-gray-500 small">Pilihlah tema berikut ini sesuai paket yang kamu pilih.</div>
                    </div>
                  </div>
                  <div class="row theme-group">
                    <div class="col-md-4 mb-4 theme" data-value="TH0D1">
                      <div class="card shadow-sm pointer theme-card selected-theme">
                        <img class="card-img theme-img" src="<?php echo base_url();?>berkas/site/preview-theme/default.png" alt="Default Theme">
                        <div class="card-img-overlay">
                          <h5 class="card-title text-white">Default Theme</h5>
                        </div>
                      </div>
                    </div>
                    <?php if ($theme != false){ foreach ($theme as $key): ?>
                      <div class="col-md-4 mb-4 theme" data-value="<?= $key->KODE_TEMA;?>">
                        <div class="card shadow-sm pointer theme-card">
                          <img class="card-img theme-img" src="<?php echo base_url();?>berkas/site/preview-theme/<?= $key->SOURCE;?>" alt="<?= $key->JUDUL;?>">
                          <div class="card-img-overlay">
                            <h5 class="card-title text-white"><?= $key->JUDUL;?></h5>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;}?>
                    <input type="hidden" id="theme-value" name="KODE_TEMA" value="TH0D1"/>
                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">
                    <div class="col-md-2 pr-0">
                      <button type="button" class="btn btn-light btn-block prev-step"><i class="fa fa-chevron-left fa-lg"></i></button>
                    </div>
                    <div class="col-md-10">
                      <button type="button" class="btn btn-light btn-block next-step">Lanjutkan <i class="fa fa-chevron-right ml-2"></i></button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="bagikan">
                  <div class="row mb-4">
                    <div class="col-md-12 text-center">
                      <div class="text-gray-700 text-lg font-weight-700">Website Siap Dibagikan</div>
                      <div class="text-gray-500 small">Pilih alamat yang diinginkan dan pastikan mudah untuk diingat.</div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="DOMAIN">Alamat Website <span class="text-danger">*</span> </label>
                        <div class="input-group input-group-joined">
                          <input class="form-control form-control-solid" type="text" id="DOMAIN" name="DOMAIN" placeholder-aria-label="DOMAIN"/>
                          <div class="input-group-append">
                            <span class="input-group-text p-2">
                              .com
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="PAKET_UNDANGAN">Paket Undangan? <span class="text-danger">*</span> </label>
                        <div class="input-group input-group-joined">
                          <input class="form-control form-control-solid" type="text" id="PAKET_UNDANGAN" name="PAKET_UNDANGAN" placeholder-aria-label="PAKET_UNDANGAN" value="PAKET <?= $paket->NAMA_PAKET;?>" readonly/>
                          <input type="hidden" name="KODE_PAKET" value="<?= $paket->KODE_PAKET;?>">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="NOTE">Note <span class="text-danger">*</span> </label>
                        <div class="input-group input-group-joined">
                          <textarea class="form-control form-control-solid" type="text" id="NOTE" name="NOTE" rows="2" placeholder-aria-label="NOTE"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Publikasikan Sekarang? <span class="text-danger">*</span> </label>
                        <div class="onoffswitch">
                          <input type="checkbox" name="PUBLIKASI" class="onoffswitch-checkbox" id="PUBLIKASI" tabindex="0">
                          <label class="onoffswitch-label" for="PUBLIKASI">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                          </label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">

                    <div class="col-md-12 text-center">
                      <label>Total Harga</label>
                      <input type="hidden" name="FEE" value="<?= $paket->HARGA_PRIM;?>">
                      <div class="text-success text-xl font-weight-600" id="FEE">Rp. <?= number_format($paket->HARGA_PRIM, 0, ", ", ".");?></div>
                    </div>

                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">
                    <div class="col-md-2 pr-0">
                      <button type="button" class="btn btn-light btn-block prev-step"><i class="fa fa-chevron-left fa-lg"></i></button>
                    </div>
                    <div class="col-md-10">
                      <button type="submit" class="btn btn-light btn-block next-step" onclick="showProgressCursor();">Buat Website Sekarang! <i class="fa fa-chevron-right ml-2"></i></button>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#DOMAIN').keyup(function (e) {
  var allowedChars = /^[a-z\d -]+$/i;
  var str = String.fromCharCode(e.charCode || e.which);

  var forbiddenChars = /([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,\/? ])+/ig;
  if (forbiddenChars.test(this.value)) {
    this.value = this.value.replace(forbiddenChars, '');
  }

  if (allowedChars.test(str)) {
    this.value = this.value.toLowerCase();
    return true;
  }

  e.preventDefault();
  return false;
});
</script>

<script type="text/javascript">
$('.theme-group .theme').click(function(){
  $('.theme-card').removeClass('selected-theme');
  $(this).find('.theme-card').addClass('selected-theme');
  var val = $(this).attr('data-value');
  //alert(val);
  $('#theme-value').val(val);
});
</script>
<script>

function previewP_FOTO(input){
  $(".P_FOTO").removeClass('hidden');
  var file = $("#GETP_FOTO").get(0).files[0];

  if(file){
    var reader = new FileReader();

    reader.onload = function(){
      $("#P_FOTO").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}
function previewW_FOTO(input){
  $(".W_FOTO").removeClass('hidden');
  var file = $("#GETW_FOTO").get(0).files[0];

  if(file){
    var reader = new FileReader();

    reader.onload = function(){
      $("#W_FOTO").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}
</script>
<script src="<?php echo base_url();?>assets/backend/js/stepy.js" type="text/javascript"></script>
