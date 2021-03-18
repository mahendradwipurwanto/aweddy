<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-10 ">
      <!-- Social login form-->
      <div class="my-4">
        <div class="card-body p-2" style="padding-bottom: 8px !important;">
          <div class="text-gray-700 text-xl title font-weight-900">Daftar</div>
          <div class="text-gray-500 small">Miliki undangan digital hanya dengan 4 langkah mudah!</div>
        </div>
        <div class="card-body p-2" style="padding-top: 0px !important">
          <hr class="my-0 mb-3" />
          <!-- login form-->
          <form action="<?php echo site_url('login/register')?>" method="POST" autocomplete="on">
          <div class="form-group">
            <label class="small text-muted" for="paket">Paket Undangan</label>
            <div class="input-group input-group-joined">
            <input class="form-control form-control-solid" type="text" id="paket" name="paket" placeholder-aria-label="Paket" value="<?= $paket->NAMA_PAKET;?>" aria-describedby="Paket" readonly/>
            <input type="hidden" name="kode_paket" value="<?= $paket->KODE_PAKET;?>" required>
              <div class="input-group-append">
                <span onclick="location.href='https://aweddy.com/pricing/'" class="input-group-text pointer p-2">
                  Ganti
                </span>
              </div>
            </div>
          </div>
            <div class="form-group">
              <label class="small text-muted" for="fname">Nama</label>
              <input class="form-control form-control-solid py-2" type="text" name="nama" id="fname" placeholder-aria-label="Nama" aria-describedby="Nama" required/>
            </div>
            <div class="form-group">
              <label class="small text-muted" for="email">Email</label>
              <input class="form-control form-control-solid py-2" type="email" name="email" id="email" placeholder-aria-label="Email" aria-describedby="Email" required/>
            </div>
            <div class="form-group">
              <label class="small text-muted" for="phone">No. Handphone</label>
              <div class="input-group input-group-joined">
                <div class="input-group-prepend">
                  <span class="input-group-text p-2">
                    +62
                  </span>
                </div>
                <input class="form-control form-control-solid" type="text" id="phone" name="hp" placeholder-aria-label="Phone" aria-describedby="Phone" required/>
              </div>
            </div>
            <div class="form-group" id="pwd-container">
              <label class="small text-muted" for="password">Password </label> <div class="float-right pwstrength_viewport_progress" style="width:50%"></div>
              <input class="form-control form-control-solid py-2" type="password" id="password" name="password" minlength="4" maxlength="24" placeholder-aria-label="Password" aria-describedby="Password" required />
            </div>
            <input type="hidden" id="score" name="score" value="">
            <!-- Form Group (forgot password link)-->
            <!-- Form Group (login box)-->
            <div class="form-group d-flex align-items-center justify-content-between mb-0">
              <button type="submit" class="btn btn-primary btn-block shadow-lg pull-right" onclick="showProgressCursor();">Daftarkan sekarang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-8 col-sm-12">
      <div class="vertical-center">
        <img src="<?= base_url();?>assets/backend/img/register-illustration.svg" class="img-fuild" alt="register">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#password').pwstrength({
    ui: {
        bootstrap4: true,
        container: "#pwd-container",
        viewports: {
            progress: ".pwstrength_viewport_progress"
        },
        showVerdictsInsideProgressBar: true
    },
    common: {
        onKeyUp: function (evt, data) {
            $('#score').val(data.score);
        }
    }
});

$("#phone").keyup(function(){
  var value = $(this).val();
  value = value.replace(/^(0*)/,"");
  $(this).val(value);
});

// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}

// Install input filters Tambah Hp Pegawai.
setInputFilter(document.getElementById("phone"), function(value) { return /^\d*$/.test(value); });
</script>
