<!-- Header kısmını import etmemiz için gerekli olan kod parçacığı -->

<?php

include 'includes/header.php';
// Yetkisiz kullanıcı grişi kontrol
if ($yetki != 1 && $yetki != 5) {
  echo "<h1>Yetkisiz Giriş</h1>";
 exit;
}

?>

<!-- Page CSS -->

<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>

<!-- Content wrapper -->
<div class="content-wrapper">



  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
      <span class="text-muted fw-light">Yeni program Ekleme /</span>program Detay
    </h4>

    <div class="col-12">
      <small class="text-light fw-semibold">program Ekleme Paneli</small>
      <div class="bs-stepper wizard-vertical vertical wizard-vertical-icons-example mt-2">
        <div class="bs-stepper-header">
          
          <!-- Haftalık ders programının seçilecek gün -->
          <div class="step" data-target="#dersler">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Dersler</span>
                <span class="bs-stepper-subtitle">Günlük Program</span>
              </span>
            </button>
          </div>
          <div class="step" data-target="#pazartesi">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Pazartesi</span>
                <span class="bs-stepper-subtitle">Günlük Program</span>
              </span>
            </button>
          </div>
          
          <!-- Haftalık ders programının seçilecek gün -->
          <div class="line"></div>
          <div class="step" data-target="#sali">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Salı</span>
                <span class="bs-stepper-subtitle">Günlük Program</span>
              </span>
            </button>
          </div>
          <!-- Haftalık ders programının seçilecek gün -->
          <div class="line"></div>
          <div class="step" data-target="#carsamba">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Çarşamba</span>
                <span class="bs-stepper-subtitle">Günlük Program</span>
              </span>
            </button>
          </div>
          <!-- Haftalık ders programının seçilecek gün -->
          <div class="line"></div>
          <div class="step" data-target="#persembe">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Perşembe</span>
                <span class="bs-stepper-subtitle">Günlük Program</span>
              </span>
            </button>
          </div>
          <!-- Haftalık ders programının seçilecek gün -->
          <div class="line"></div>
          <div class="step" data-target="#cuma">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Cuma</span>
                <span class="bs-stepper-subtitle">Günlük Program</span>
              </span>
            </button>
          </div>
          <!-- Haftalık ders programının seçilecek gün -->
          <div class="line"></div>
          <div class="step" data-target="#cumartesi">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class="bx bx-detail"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Cumartesi</span>
                <span class="bs-stepper-subtitle">Günlük Program</span>
              </span>
            </button>
          </div>
          <!-- Ders programına Not ekleme ve programın yayınlanıp yayınlanmaması için seçim -->
          <div class="line"></div>
          <div class="step" data-target="#social-links-vertical">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">
                <i class='bx bx-edit-alt'></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Açıklama ve Onay</span>
                <span class="bs-stepper-subtitle">Program Not veya Açıklama</span>
              </span>
            </button>
          </div>


        </div>
        <div class="bs-stepper-content">
          <form action="../action/action.php?action=yeni_program" method="POST">
            <!-- Account Details -->
            <!-- Gün içinde verilecek ders sayısı, ders ismi ve hangi saatler arasında olacağı -->
            <div id="dersler" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Ders program Bilgi</h6>
<<<<<<< HEAD
                <small>Ders Bilgileirni Giriniz.</small>
=======
                <small>Ders Bilgilerini Giriniz.</small>
>>>>>>> c07e20af7726e8c06d8ee07aed5268482a0437be
              </div>

              <div class="container" id="clone_wrapper2">
                <div class="row mb-4">
                  
                  <label for="formFile" class="form-label  ">Ders Adı </label>
                <select class="form-control mb-2" name="ders_id" id="ders_id">
    <?php
    $listele_ders = $vt->select("dersler", "");
    foreach ($listele_ders as $key => $value) {
        echo '<option value="' . $value['id'] . '">' . $value['dersadi'] . '</option>';
    }
    ?>
</select>
<<<<<<< HEAD
=======
                  
                      



                            </select>
                    

                    </select>

>>>>>>> c07e20af7726e8c06d8ee07aed5268482a0437be
                </div>
              </div>
              <button type="button" class="btn btn-info col-md-12 mb-4" id="clone_button2">Yeni Sutun Ekle</button>

              <div class="col-12 d-flex justify-content-between mt-2">
               

              </div>
            </div>
            <div id="pazartesi" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Pazartesi Program Bilgi</h6>
                <small>Bilgilerini Giriniz.</small>
              </div>

              <!-- Form Repeater -->
              <div class="container" id="clone_wrapper">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="">Saat Aralığı</label>
                    <input type="time" name="pazartesi_saat[]" class="form-control">
                  </div>

                 
                </div>
                
 
 
  
              </div>
              <button type="button" class="btn btn-info col-md-12 mb-4" id="clone_button">Yeni Sutun Ekle</button>
              <!-- /Form Repeater -->
              <div class="col-12 d-flex justify-content-between mt-4">
                 
                 

              </div>
            </div>
            <!--  Info -->
              <!-- Gün içinde verilecek ders sayısı, ders ismi ve hangi saatler arasında olacağı -->
            <div id="sali" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Salı program Bilgi</h6>
                <small>Salı Bilgileirni Giriniz.</small>
              </div>

              <div class="container" id="clone_wrapper2">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="">Saat Aralığı</label>
                    <input type="time" name="sali_saat[]" class="form-control">
                  </div>

                  
                </div>
              </div>
              <button type="button" class="btn btn-info col-md-12 mb-4" id="clone_button2">Yeni Sutun Ekle</button>

              <div class="col-12 d-flex justify-content-between mt-2">
               

              </div>
            </div>

             <!-- Gün içinde verilecek ders sayısı, ders ismi ve hangi saatler arasında olacağı -->
            <div id="carsamba" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Çarşamba program Bilgi</h6>
                <small>Bilgileirni Giriniz.</small>
              </div>

              <div class="container" id="clone_wrapper3">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="">Saat Aralığı</label>
                    <input type="time" name="carsamba_saat[]" class="form-control">
                  </div>

                  
                </div>
              </div>
              <button type="button" class="btn btn-info col-md-12 mb-4" id="clone_button3">Yeni Sutun Ekle</button>


              <div class="col-12 d-flex justify-content-between mt-2">
            

              </div>
            </div>
             <!-- Gün içinde verilecek ders sayısı, ders ismi ve hangi saatler arasında olacağı -->
            <div id="persembe" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Perşembe program Bilgi</h6>
                <small>Bilgileirni Giriniz.</small>
              </div>

              <div class="container" id="clone_wrapper4">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="">Saat Aralığı</label>
                    <input type="time" name="persembe_saat[]" class="form-control">
                  </div>

                  
                </div>
              </div>
              <button type="button" class="btn btn-info col-md-12 mb-4" id="clone_button4">Yeni Sutun Ekle</button>


              <div class="col-12 d-flex justify-content-between mt-2">
             

              </div>
            </div>

             <!-- Gün içinde verilecek ders sayısı, ders ismi ve hangi saatler arasında olacağı -->
            <div id="cuma" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Cuma program Bilgi</h6>
                <small>Bilgileirni Giriniz.</small>
              </div>

              <div class="container" id="clone_wrapper5">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="">Saat Aralığı</label>
                    <input type="time" name="cuma_saat[]" class="form-control">
                  </div>

                  
                </div>
              </div>
              <button type="button" class="btn btn-info col-md-12 mb-4" id="clone_button5">Yeni Sutun Ekle</button>
              <div class="col-12 d-flex justify-content-between mt-2">
           

              </div>
            </div>
             <!-- Gün içinde verilecek ders sayısı, ders ismi ve hangi saatler arasında olacağı -->
            <div id="cumartesi" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Cumartesi program Bilgi</h6>
                <small>Bilgileirni Giriniz.</small>
              </div>

              <div class="container" id="clone_wrapper6">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="">Saat Aralığı</label>
                    <input type="time" name="cumartesi_saat[]" class="form-control">
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-info col-md-12 mb-4" id="clone_button6">Yeni Sutun Ekle</button>


              <div class="col-12 d-flex justify-content-between mt-2">
             

              </div>
            </div>



            <style>
              .ck {
                height: 300px;
              }
            </style>
            <!-- detay Links -->
            <!--Girilecek program notu, yayınlansın veya yayınlanmasın, ve hangi sınıf için olacağı seçilir -->
            <div id="social-links-vertical" class="content">

              <div class="row">
                <div class="col-md mb-md-0 mb-2">
                  <div class="form-check custom-option custom-option-icon">
                    <label class="form-check-label custom-option-content" for="customRadioBuilder">
                      <span class="custom-option-body">
                        <i class='bx bxs-add-to-queue'></i>
                        <span class="custom-option-title">program Yayınlansın</span>
                        <small>program yayına alınacaktır.</small>
                      </span>
                      <input name="program_yayin" class="form-check-input" type="radio" value="1" id="customRadioBuilder" checked />
                    </label>
                  </div>
                </div>
                <div class="col-md mb-md-0 mb-2 mt-4">
                  <div class="form-check custom-option custom-option-icon">
                    <label class="form-check-label custom-option-content" for="customRadioOwner">
                      <span class="custom-option-body">
                        <i class='bx bxs-bell-minus'></i>
                        <span class="custom-option-title">program Yayınlanmasın</span>
                        <small>program yayınlanmayacaktır.</small>
                      </span>
                      <input name="program_yayin" class="form-check-input" type="radio" value="2" id="customRadioOwner" />
                    </label>
                  </div>
                </div>
              </div>
              <div class="content-header mb-3">
                <h6 class="mb-0">program Açıklama</h6>
                <small>Detaylı program bilgisi giriniz.</small>
              </div>
              <div class="col-md-12 mb-2">

               <textarea class="form-control" name="program_aciklama" id="" cols="10" rows="5"></textarea>

              </div>

              <div class="col-md-12 mt-3">
              
                <label for="formFile" class="form-label  ">Sınıf * </label>
                <select class="form-control mb-2" name="sinif">
                  <?php
                  $listele_sinif = $vt->select("sinif", " ");
                  foreach ($listele_sinif as $key => $value) {
                    echo '
                     <option value="' . $value['id'] . '">' . $value['baslik'] . '</option>
                     ';
                  }
                  ?>
                </select>
              
              </div>



              <div class="col-12 d-flex justify-content-between">
               

              </div>

              <button type="submit" class=" btn btn-label-linkedin btn-lg col-md-12 mt-4 ">
                <i class='bx bxs-add-to-queue'> <span class="d-sm-inline-block d-none me-sm-1">Yeni program Ekle</span></i>
              </button>
            </div>




            <!-- ayar Links -->




          </form>
        </div>
      </div>
    </div>


    <!--/ Property Listing Wizard -->
  </div>
  <!-- / Content -->
  <?php

  include 'includes/footer.php';
  ?>
 
  <script>
    $('#clone_button').click(function() {
      $('#clone_wrapper div:first')
        .clone()
        .appendTo($('#clone_wrapper'));
    });

    $('#clone_button2').click(function() {
      $('#clone_wrapper2 div:first')
        .clone()
        .appendTo($('#clone_wrapper2'));
    });


    $('#clone_button3').click(function() {
      $('#clone_wrapper3 div:first')
        .clone()
        .appendTo($('#clone_wrapper3'));
    });


    $('#clone_button4').click(function() {
      $('#clone_wrapper4 div:first')
        .clone()
        .appendTo($('#clone_wrapper4'));
    });

    $('#clone_button5').click(function() {
      $('#clone_wrapper5 div:first')
        .clone()
        .appendTo($('#clone_wrapper5'));
    });
    $('#clone_button6').click(function() {
      $('#clone_wrapper6 div:first')
        .clone()
        .appendTo($('#clone_wrapper6'));
    });
  </script>
    
    <script>
    ClassicEditor
      .create(document.querySelector('#program_aciklama'))
      .then(newEditor => {
        myCustomEditor = newEditor;
      })
      .catch(error => {
        console.error(error);
      });



    $(".formGonder").click(function(e) {
      e.preventDefault();
      var myData = $("#formum").serializeArray();

      myData.push({
        name: 'program_aciklama',
        value: myCustomEditor.getData()
      });
      var program_ad = $("#program_ad").val();

      if (program_ad == "") {
        toastr.error('program Ad Boş Olamaz..');
        $("#program_ad").css('border', '3px solid red');
      } else {
        $.ajax({
          type: "POST",
          data: myData,
          url: "../action/action.php?action=programUpload",
          success: function(data) {
            //console.log(data)
            toastr.success('program Başarı ile kayd edildi.');
            setTimeout(function() {
              //window.location.reload(false);
              window.location.href = "program.php";
            }, 1500);

          }
        });
      }
    });
  </script>
   
<<<<<<< HEAD
   <script>
    var input = document.querySelector("input[type='time']");
    input.addEventListener("change", function(){
        var selectedTime = new Date("1970-01-01 " + input.value).getTime();
        var minTime = new Date("1970-01-01 08:30").getTime();
        if(selectedTime < minTime) {
            alert("Lütfen seçtiğiniz saat 08:30'dan sonra olsun");
            input.value = "08:30";
        }
    });
=======
  <script>
   var inputs = document.querySelectorAll("input[type='time']");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", function(){
        var selectedTime = new Date("1970-01-01 " + this.value).getTime();
        var minTime = new Date("1970-01-01 08:30").getTime();
        var maxTime = new Date("1970-01-01 17:00").getTime();
        if(selectedTime < minTime) {
            alert("Lütfen seçtiğiniz saat 08:30'dan sonra olsun");
            this.value = "08:30";
        } else if (selectedTime > maxTime) {
            alert("Lütfen seçtiğiniz saat 17:00'den önce olsun");
            this.value = "17:00";
        }
    });
}
>>>>>>> c07e20af7726e8c06d8ee07aed5268482a0437be
</script>
 

