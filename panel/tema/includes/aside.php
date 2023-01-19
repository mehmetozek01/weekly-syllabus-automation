<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.php" class="app-brand-link text-center">
      <img width="75" src="resim.jpg">

    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
      <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-divider mt-0"></div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <!-- Side bar -->

    <li class="menu-item ">
      <a href="index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="AnaSayfa">AnaSayfa</div>
      </a>
    </li>


    <!-- Yetkisi varsa burayı görebilir -->
    <?php
   if ($yetki != 1 && $yetki != 5) {?>
     <li class="menu-item ">
       <a href="program.php" class="menu-link">
         <i class="menu-icon tf-icons fa-brands fa-buffer"></i>
         <div data-i18n="Programlar">Programlar</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="dersler.php" class="menu-link">
          <i class="menu-icon tf-icons fa-brands fa-buffer"></i>
          <div data-i18n="Dersler">Dersler</div>
        </a>
      </li>
      
      
      <!-- Yetkisi varsa burayı görebilir -->
    <?php } elseif ($yetki == 1 || $yetki == 5) { ?>

        
      <li class="menu-item ">
        <a href="kullanici.php" class="menu-link">
          <i class="menu-icon tf-icons fa-solid fa-users"></i>
          <div data-i18n="Kullanıcı Yönetimi">Kullanıcı Yönetimi</div>
        </a>
      </li>

      <li class="menu-item ">
        <a href="sinif.php" class="menu-link">
          <i class="menu-icon tf-icons fa-brands fa-buffer"></i>
          <div data-i18n="Sınıflar">Sınıflar</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="dersler.php" class="menu-link">
          <i class="menu-icon tf-icons fa-brands fa-buffer"></i>
          <div data-i18n="Dersler">Dersler</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="yardim.php" class="menu-link">
          <i class="menu-icon tf-icons fa-brands fa-buffer"></i>
          <div data-i18n="Yardım">Yardım</div>
        </a>
      </li>
    
      <li class="menu-item">
        <a href="program-ekle.php" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons  bx bx-food-menu"></i>
          <div data-i18n="Program Yönetimi">Program Yönetimi</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="program-ekle.php" class="menu-link">
              <div data-i18n="Yeni program">Yeni Program</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="program.php" class="menu-link">
              <div data-i18n="Tüm programlar">Program programlar</div>
            </a>
          </li>

        </ul>
      </li>

    <?php  }
    ?>






  </ul>
</aside>
<!-- / Menu -->