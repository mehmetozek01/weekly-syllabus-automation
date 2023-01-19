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
            <span class="text-muted fw-light">Dersler / Listele /</span> Ekle
        </h4>
        <div class="row gy-4">
            <!-- User Sidebar -->
            <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
                <!-- User Card -->
                <!-- Yeni sınıf ekleme varsa öğretmen belirleme -->
                 
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="../action/action.php?action=dersEkle" method="post" enctype="multipart/form-data">
                            <div class="alert alert-primary" role="alert">Yeni Ders Ekleme</div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label  ">Ders Kodu * </label>
                                <input required class="form-control mb-2" name="derskodu" type="text" id="derskodu" placeholder="Ders Kodunu Giriniz" pattern="[0-9]{0,6}" oninvalid="this.setCustomValidity('En fazla 6 hane girilebilir')">
                                <label for="formFile" class="form-label  ">Ders Adı * </label>
                                <input required class="form-control mb-2" name="dersadi" type="text" id="dersadi" placeholder="Ders Adını Giriniz">
                                <label for="formFile" class="form-label  ">Ders Saati * </label>
                                <input required class="form-control mb-2" name="derstime" type="text" id="derstime" placeholder="Ders Saatini Giriniz" pattern="[0-8]" oninvalid="this.setCustomValidity('En fazla 8 ders saati seçilebilir')">
                                <label for="formFile" class="form-label  ">Öğretmen Adı * </label>
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
                            <button type="submit" class="btn btn-info col-md-12 ">Yeni Ders Ekle</button>
                        </form>
                    </div>
                </div>
            
                <!-- /User Card -->
            </div>
            <div class="table-responsive">
                        <table class="table border-top">
                            <thead>
                                <tr>
                                    <th>Ders Kodu</th>
                                    <th>Ders Adı</th>
                                    <th>Ders Saati</th> 
                                    <th>Öğretmen</th> 
                                    <th>İşlem</th>
                                     
                                </tr>
                                
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <?php
    $listele = $vt->select("dersler", "");
    if (!empty($listele)) {
        foreach ($listele as $key => $value) {
            $ogretmen = $vt->select("kullanici", "WHERE id = ".$value['ogretmen_id']);
            echo '<tr>';
            echo '<td>'.$value['derskodu'].'</td>';
            echo '<td>'.$value['dersadi'].'</td>';
            echo '<td>'.$value['derstime'].'</td>';
            echo '<td>'.$ogretmen[0]['ad_soyad'].'</td>';              
?>
                                            
               <td class="text-nowrap">
                                                <!-- Yetkili ise silme butonu gelir -->
                                            <?php
                                                if ($yetki == 1 || $yetki == 5) {?>
                                              
                                            <button onclick="dersDelete(this)" class="btn btn-icon btn-outline-reddit"  data-id="<?php echo $value['id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                <?php }
                                }
                           
                                ?>
                                 


<!-- / Content -->
<script>
 
    function dersDelete(e) {
        var id = $(e).attr("data-id");
        Swal.fire({
            title: 'Ders Silinsin mi ?',
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
                    url: "../action/action.php?action=dersDelete",
                    success: function(data) {
                        window.location.reload(false);
                    }
                });

            }
        })
    }
</script>
<!-- Footer kısmını import etmemiz için gerekli olan kod parçacığı -->
<?php

include 'includes/footer.php';
?> 
