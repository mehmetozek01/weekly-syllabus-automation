<!-- Header kısmını import etmemiz için gerekli olan kod parçacığı -->
<?php
include 'includes/header.php';
// Yetkisiz kullanıcı grişi kontrol
if ($yetki != 1 && $yetki != 5) {
    echo "<h1>Yetkisiz Giriş</h1>";
   exit;
  }
?>


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Sınıf Yönetimi / Listele /</span> Ekle
        </h4>
        <div class="row gy-4">
            <!-- User Sidebar -->
            <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
                <!-- User Card -->
                <!-- Yeni sınıf ekleme varsa öğretmen belirleme -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="../action/action.php?action=sinifEkle" method="post" enctype="multipart/form-data">
                            <div class="alert alert-primary" role="alert">Yeni Sınıf Ekleme</div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label  ">Başlık * </label>
                                <input required class="form-control mb-2" name="baslik" type="text" id="formFile" placeholder="Başlık">
                                <label for="formFile" class="form-label  ">Öğretmen * </label>
                                <select class="form-control mb-2" name="ogretmen_id">
                                    <?php
                                    $listele = $vt->select("kullanici", " where yetki = 2 ");
                                    foreach ($listele as $key => $value) {
                                        echo '
                                        <option value="' . $value['id'] . '">' . $value['ad_soyad'] . '</option>
                                        ';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info col-md-12 ">Yeni Sınıf Ekle</button>
                        </form>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->
            <div class="row" id="SınıfBodyDiv">
                <!-- User Card -->
                <?php
                $listele = $vt->select("sinif", "");
                if (!empty($listele)) {
                    foreach ($listele as $key => $value) { ?>
                        <div class=" mb-4 col-xl-3 col-lg-3 col-md-3">
                            <div class="card-body">
                                <div class="card mb-3">
                                    <div class="card-body   ">
                                        <div class=" d-flex  justify-content-sm-between">

                                            <h5 class="card-title mt-2"><?php echo $value['baslik']; ?></h5>

                                              <button onclick="sinifDelete(this)" class="btn btn-icon btn-outline-reddit"  data-id="<?php echo $value['id']; ?>"><i class="fa-solid fa-trash-can"></i></button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } else {
                    echo '
                    <div class="alert alert-danger" role="alert">Kayıtlı Sınıf Bulunmadı</div>
                    ';
                }
                ?>

                <!-- /User Card -->

            </div>


        </div>
    </div>
</div>


<!-- / Content -->

<!-- Footer kısmını import etmemiz için gerekli olan kod parçacığı -->
<?php

include 'includes/footer.php';
?>


<script>

// Eklenen sınıf silinsin mi kısmı pop-up olarak uyarı verir
    function sinifDelete(e) {
        var id = $(e).attr("data-id");
        Swal.fire({
            title: 'Sınıf Silinsin mi ?',
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
                    url: "../action/action.php?action=sinifDelete",
                    success: function(data) {
                        window.location.reload(false);
                    }
                });

            }
        })
    }
</script>