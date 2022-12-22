<!-- Header kısmını import etmemiz için gerekli olan kod parçacığı -->

<?php
include 'includes/header.php';

?>


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <!-- Ders programı -->
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Program Yönetimi / Listele /</span> Ekle
        </h4>
        <div class="row gy-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Program</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="d-flex justify-content-between align-content-center flex-wrap gap-4">
                                <div class="d-flex align-items-center gap-2" style="position: relative;">
                                    <a class="btn btn-primary" href="program-ekle.php">
                                        Yeni program Ekleme
                                    </a>
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
                    <div class="table-responsive">
                        <table class="table border-top">
                            <thead>
                                <tr>
                                    <th>Sınıf</th>
                                    <th>Pazartesi</th>
                                    <th>Salı</th>
                                    <th>Çarşamba</th>
                                    <th>Perşembe</th>
                                    <th>Cuma</th>
                                    <th>Cumartesi</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                // Program ekle kısmından eklenen ders, saat ve sınıf kısmı
                                $listele = $vt->select("program", "");
                                if (!empty($listele)) {
                                    foreach ($listele as $key => $value) {
                                        $id = $value['id'];
                                        $sinif_id = $value['sinif'];
                                        $pazartesi_saat = $value['pazartesi_saat'];
                                        $pazartesi_program = $value['pazartesi_program'];
                                        $sali_saat = $value['sali_saat'];
                                        $sali_program = $value['sali_program'];
                                        $carsamba_saat = $value['carsamba_saat'];
                                        $carsamba_program = $value['carsamba_program'];
                                        $persembe_saat = $value['persembe_saat'];
                                        $persembe_program = $value['persembe_program'];
                                        $cuma_saat = $value['cuma_saat'];
                                        $cuma_program = $value['cuma_program'];
                                        $cumartesi_saat = $value['cumartesi_saat'];
                                        $cumartesi_program = $value['cumartesi_program'];

                                        $sinif = $vt->select("sinif", "where id = '{$sinif_id}' ");
                                        foreach ($sinif as $akey => $avalue) {
                                            $sinif_baslik = $avalue['baslik'];
                                        }



                                ?>
                                <!-- Günlere eklenen ders saati ve ders ismini kontrol eder -->
                                        <tr>
                                            <td class="text-nowrap">
                                                <?php echo $sinif_baslik;  ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <?php
                                                if ($pazartesi_saat != "") { 

                                                    $pazartesi_saat = explode("," , $pazartesi_saat);
                                                    $pazartesi_program = explode("," , $pazartesi_program);
                                                    foreach ($pazartesi_saat as $key => $value) {
                                                        echo $value." ".$pazartesi_program[$key]."<br>";
                                                    }
                                                 }
                                                ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <?php
                                                if ($sali_saat != "") { 

                                                    $sali_saat = explode("," , $sali_saat);
                                                    $sali_program = explode("," , $sali_program);
                                                    foreach ($sali_saat as $skey => $svalue) {
                                                        echo $svalue." ".$sali_program[$skey]."<br>";
                                                    }
                                                 }
                                                ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <?php
                                                if ($carsamba_saat != "") { 

                                                    $carsamba_saat = explode("," , $carsamba_saat);
                                                    $carsamba_program = explode("," , $carsamba_program);
                                                    foreach ($carsamba_saat as $ckey => $cvalue) {
                                                        echo $cvalue." ".$carsamba_program[$ckey]."<br>";
                                                    }
                                                 }
                                                ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <?php
                                                if ($persembe_saat != "") { 

                                                    $persembe_saat = explode("," , $persembe_saat);
                                                    $persembe_program = explode("," , $persembe_program);
                                                    foreach ($persembe_saat as $pkey => $pvalue) {
                                                        echo $pvalue." ".$persembe_program[$pkey]."<br>";
                                                    }
                                                 }
                                                ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <?php
                                                if ($cuma_saat != "") { 

                                                    $cuma_saat = explode("," , $cuma_saat);
                                                    $cuma_program = explode("," , $cuma_program);
                                                    foreach ($cuma_saat as $ckey => $cvalue) {
                                                        echo $cvalue." ".$cuma_program[$ckey]."<br>";
                                                    }
                                                 }
                                                ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <?php
                                                if ($cumartesi_saat != "") { 

                                                    $cumartesi_saat = explode("," , $cumartesi_saat);
                                                    $cumartesi_program = explode("," , $cumartesi_program);
                                                    foreach ($cumartesi_saat as $cckey => $ccvalue) {
                                                        echo $ccvalue." ".$cumartesi_program[$cckey]."<br>";
                                                    }
                                                 }
                                                ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <!-- Yetkili ise silme butonu gelir -->
                                            <?php
                                                if ($yetki == 1 || $yetki == 5) {?>
                                              
                                            <button onclick="programDelete(this)" class="btn btn-icon btn-outline-reddit"  data-id="<?php echo $id; ?>"><i class="fa-solid fa-trash-can"></i></button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                <?php }
                                } else {
                                    echo '
                                        <div class="alert alert-danger" role="alert">Kayıtlı Program Bulunmadı</div>
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

<!-- / Content -->


<!-- / Content -->


<?php

include 'includes/footer.php';
?>
<script>
// Açılan pop-up kısmında programın silinimesi için onay ister
    function programDelete(e) {
        var id = $(e).attr("data-id");
        var old_url = $(e).attr("data-url");
        Swal.fire({
            title: 'Program Silinsin mi ?',
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

                        id: id,
                        old_url: old_url
                    },
                    url: "../action/action.php?action=programDelete",
                    success: function(data) {
                        window.location.reload(false);
                    }
                });

            }
        })
    }
</script>