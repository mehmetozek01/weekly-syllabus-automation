<!-- Header kısmını import etmemiz için gerekli olan kod parçacığı -->

<?php

include 'includes/header.php';
// Yetkisiz kullanıcı grişi kontrol
if ($yetki != 1 && $yetki != 5) {
  echo "<h1>Yetkisiz Giriş</h1>";
 exit;
}
?>


<div class="content-wrapper">
  <!-- Content -->

  <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
      <!-- Kullanıcı Yönetimi -->
      <span class="text-muted fw-light">Kullanıcı Yönetimi / Listele /</span> Ekle
    </h4>
    <div class="row gy-4">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Kullanıcı Paneli</h5>
          </div>
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex justify-content-between align-content-center flex-wrap gap-4">
                <div class="d-flex align-items-center gap-2" style="position: relative;">
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop">
                    <!-- Butona tıklayıp yeni kullanıcı ekleme -->
                    <span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Yeni Kullanıcı Ekle</span></span></button>
                  <div class="resize-triggers">
                    <div class="expand-trigger">
                      <div style="width: 185px; height: 51px;"></div>
                    </div>
                    <div class="contract-trigger"></div>
                  </div>
                </div>
                <div class="d-flex align-items-center gap-2" style="position: relative;">

                  <div class="resize-triggers">
                    <div class="expand-trigger">
                      <div style="width: 168px; height: 51px;"></div>
                    </div>
                    <div class="contract-trigger"></div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Eklenen kullanıcların gösterileceği tablo -->
          <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered">
              <thead>
                <tr>
                  <th>S. No</th>
                  <th>Yetki </th>
                  <th>Ad Soyad</th>
                  <th>Email</th>
                  <th>İşlem</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="kategoriBodyDiv">
                <?php
                $listele = $vt->select("kullanici", "");
                if (!empty($listele)) {
                  foreach ($listele as $key => $value) {
                    $id = $value['id'];
                ?>
                    <tr>
                      <td class="text-nowrap">
                        <?php echo $key + 1; ?>
                      </td>
                      <td>
                        <!-- Kullanıcı yetkisi -->
                        <select disabled class="form-control mb-4" name="yetki" id="">
                          <option <?php if ($value['yetki'] == 0) {
                           echo "selected";
                          } ?> value="0">Müdür</option>
                          <option <?php if ($value['yetki'] == 1) {
                           echo "selected";
                          } ?>  value="1">Müdür Yardımcısı</option>
                          <option <?php if ($value['yetki'] == 2) {
                           echo "selected";
                          } ?>  value="2">Öğretmen</option>
                            <option <?php if ($value['yetki'] == 3) {
                           echo "selected";
                          } ?>  value="3">Öğrenci</option>
                          </select>
                      </td>
                      <td><?php echo $value['ad_soyad']; ?> </td>
                      <td><?php echo $value['email']; ?> </td>
                      <td>
                        <button onclick="editBtn(this)" class="btn btn-icon btn-label-linkedin" data-id="<?php echo $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#animationModal"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button onclick="kullaniciDelete(this)" data-id="<?php echo $value['id']; ?>" data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top" data-color="secondary" title="" data-bs-original-title="Silme" type="button" class="btn btn-icon rounded-pill btn-outline-youtube">

                          <i class="tf-icons fa-solid fa-trash-can"></i>
                        </button>

                      </td>
                    </tr>
                <?php }
                } else {
                  echo '
                 <div class="alert alert-danger" role="alert">Kayıtlı Kullanıcı Bulunmadı</div>
                  ';
                }
                ?>




              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<?php

include 'includes/footer.php';
?>

<!-- / Content -->
<!-- Açılan pop-up kısmı -->
<div class="modal fade animate__slideInRight fadeIn" id="animationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Kullanıcı yetkisi -->
        <h5 class="modal-title" id="exampleModalLabel5">Kullanıcı Güncelle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalBody">

      </div>
      <div class="modal-footer">
        <!-- Girilen Güncelleme iptal kaydet -->
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Kapat</button>
        <button onclick="kullaniciGuncelle(this)" type="button" class="btn btn-primary">Güncelle</button>
      </div>
    </div>
  </div>
</div>



<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
  <!-- Yeni kullancıı ekleme -->
  <div class="offcanvas-header">
    <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Kullanıcı Bilgilerini Giriniz</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body my-auto mx-0 flex-grow-0">
    <form action="../action/action.php?action=yeniKullanici" method="POST">
      <!-- Kullanıcı yetkisi -->
      <label>Yetki*</label>
      <select class="form-control mb-4" name="yetki" id="">
        <option value="0">Müdür</option>
        <option value="1">Müdür Yardımcısı</option>
        <option value="2">Öğretmen</option>
        <option value="3">Öğrenci</option>
      </select>
      <!-- Kullanıcı Ad Soyad -->
      <label>Kullanıcı Ad Soyad *</label>
      <input required type="text" class="form-control mb-4" name="ad_soyad" placeholder="Kullanıcı Ad Soyad">
      <!-- Kullanıcı Email -->
      <label>Kullanıcı Email *</label>
      <!-- Email kontrol -->
      <input onkeyup="emailKontrol(this)" required type="email" class="form-control mb-4" name="email" id="email" placeholder="Kullanıcı Email">
      <label>Şifre Belirleyin</label>
      <input type="password" class="form-control mb-4" name="password" placeholder="Kullanıcı Şifre">

      <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Kayıt Et</button>
    </form>
    <button type="button" class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas">
      Kapat
    </button>
  </div>
</div>
<script>

  // Açılan pup-up kısmında emailin daha önce kullanıldığını gösterir
  function emailKontrol(e) {
    var deger = $(e).val();
    $.ajax({
      type: "POST",
      data: {
        deger: deger
      },
      url: "../action/action.php?action=emailKontrol",
      success: function(data) {
        if (data == 1) {
          toastr.error("Bu email ile daha önce kayıt yapılmış");
          $("#email").val("");
        }
      }
    });
  }

  // Ad soyad - Email boş olup olmadığını kontrol eder
  function kullaniciGuncelle(e) {
    var formum = $("#kategoriEdit").serialize();
    if ($("#ad_soyad").val() == "") {
      toastr.error("Ad Soyad Boş Olamaz");
    } else if ($("#email").val() == "") {
      toastr.error("Email Boş Olamaz");
    } else {
      $.ajax({
        type: "POST",
        data: formum,
        url: "../action/action.php?action=kullaniciGuncelle",
        success: function(data) {
          toastr.success("Güncelleme İşlemi Başarılı");
          $("#kategoriBodyDiv").load("../action/action.php?action=kullaniciList");
          $("#animationModal").modal('toggle');
          //window.location.reload(false);

        }
      });
    }

  }
  // Kullanıcıya verdiği id

  function editBtn(e) {
    var id = $(e).attr("data-id");
    $.ajax({
      type: "POST",
      data: {
        id: id
      },
      url: "../action/action.php?action=kullaniciEditBody",
      success: function(data) {
        $("#modalBody").html(data);
      }
    });
  }
  

  // Açılan pop-up kısmında silinsin mi mesajı verir
  function kullaniciDelete(e) {
    var id = $(e).attr("data-id");
    Swal.fire({
      title: 'Kullanıcı Silinsin mi ?',
      text: "Bu işlem geri alınmaz.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Evet, silinsin!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function(result) {
      // İşlemin gerçekleştiğine dair pop-up açılır
      if (result.value) {
        Swal.fire({
          icon: "success",
          title: 'Silindi',
          text: 'İşlem başarılı.',
          confirmButtonClass: 'btn btn-success',
        })
        $.ajax({
          type: "POST",
          data: {

            id: id
          },
          url: "../action/action.php?action=kullaniciDelete",
          success: function(data) {
            window.location.reload(false);
          }
        });

      }
    })
  }
</script>