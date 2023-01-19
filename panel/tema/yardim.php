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
            <span class="text-muted fw-light">Yardım /</span> Ekle
        </h4>
        <div class="row gy-4">
            <!-- User Sidebar -->
            <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
                <!-- User Card -->
                <!-- Yardım sekmesi -->

                <div class="card mb-4">
                    <div class="card-body">
                        
                            <div class="alert alert-primary" role="alert">Yardım</div>
                            <h1>Ders Programı Hazırlama Otomasyonuna Hoşgeldiniz...</h1>
                        <br></br>
                        <h3>İlk Öncelikle <a href="kullanici.php">Kullanıcı Yönetimi</a> Kısmından Öğretmenlerimizin, Müdür Yardımcılarının ve Öğrencilerimizin Kaydını Yapıyoruz.</h3>
                        <br></br>
                            <h3>Ardından <a href="sinif.php">Sınıflar</a> Kısmından Sınıflarımızın Atamasını Yapıyoruz.</h3>
                        <br></br>
                            <h3><a href="dersler.php">Dersler</a> Kısmından Derslerimizi Atıyoruz</h3>
                        <br></br>
                        <h3><a href="program-ekle.php">Ders Programımızı</a> Buradan Ekliyoruz. Dersleri Atıyoruz.</a></h3>
                        <br></br>
                        <h3><a href="program.php">Ders Programımızı</a> da Buradan Görüntülüyoruz.</h3>
                            
                        
                            <div class="mb-3"></div>

                            </div>
                    </div>
                </div>


            <!-- Footer kısmını import etmemiz için gerekli olan kod parçacığı -->
            <?php

            include 'includes/footer.php';
<<<<<<< HEAD
            ?>
=======
            ?>
>>>>>>> c07e20af7726e8c06d8ee07aed5268482a0437be
