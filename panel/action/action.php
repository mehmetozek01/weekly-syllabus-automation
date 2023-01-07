<?php
ob_start();
session_start();
include 'db.php';

$vt = new Action($dbname, $user, $password);

$action = $_GET['action'];

switch ($action) {

	case 'sinifEkle':

		$baslik = $_POST['baslik'];
		$ogretmen_id = $_POST['ogretmen_id'];
		$dizi =  array(
			"baslik" => $baslik,
			"ogretmen_id" => $ogretmen_id
		);
		$sonuc = $vt->ekle("sinif", $dizi);
		Header("Location:../tema/sinif.php?case=ok");
		break;


	case 'programDelete':
		$id =  $_POST['id'];
		$delete = $vt->idSil("program", $id);

		break;

	case 'sinifDelete':
		$id =  $_POST['id'];
		$delete = $vt->idSil("sinif", $id);

		break;



	case 'yeni_program':

		@$pazartesi_saat = implode(",", $_POST['pazartesi_saat']);
		@$pazartesi_program = implode(",", $_POST['pazartesi_program']);
		@$sali_saat = implode(",", $_POST['sali_saat']);
		@$sali_program = implode(",", $_POST['sali_program']);
		@$carsamba_saat = implode(",", $_POST['carsamba_saat']);
		@$carsamba_program = implode(",", $_POST['carsamba_program']);
		@$persembe_saat = implode(",", $_POST['persembe_saat']);
		@$persembe_program = implode(",", $_POST['persembe_program']);
		@$cuma_saat = implode(",", $_POST['cuma_saat']);
		@$cuma_program = implode(",", $_POST['cuma_program']);
		@$cumartesi_saat = implode(",", $_POST['cumartesi_saat']);
		@$cumartesi_program = implode(",", $_POST['cumartesi_program']);
		@$program_yayin = $_POST['program_yayin'];
		@$sinif = $_POST['sinif'];
		@$program_aciklama =  $_POST['program_aciklama'];
		$dizi =  array(
			"pazartesi_saat" => $pazartesi_saat,
			"pazartesi_program" => $pazartesi_program,
			"sali_saat" => $sali_saat,
			"sali_program" => $sali_program,
			"carsamba_saat" => $carsamba_saat,
			"carsamba_program" => $carsamba_program,
			"persembe_saat" => $persembe_saat,
			"persembe_program" => $persembe_program,
			"cuma_saat" => $cuma_saat,
			"cuma_program" => $cuma_program,
			"cumartesi_saat" => $cumartesi_saat,
			"cumartesi_program" => $cumartesi_program,
			"program_yayin" => $program_yayin,
			"program_aciklama" => $program_aciklama,
			"sinif" => $sinif
		);
		$sonuc = $vt->ekle("program", $dizi);
		Header("Location:../tema/program.php?case=ok");
		break;



	case 'emailKontrol':
		$deger =  $_POST['deger'];
		$kontrol = $vt->kontrol("kullanici", "where email = '{$deger}' ");
		if ($kontrol > 0) {
			echo 1;
		} else {
			echo 0;
		}
		break;

	case 'kullaniciDelete':
		$id =  $_POST['id'];
		$delete = $vt->idSil("kullanici", $id);
		/// logs
		$dizi =  array(
			"islem" => "Kullanıcı Silindi"
		);
		$sonuc = $vt->ekle("logs", $dizi);

		break;

	case 'kullaniciList':
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
						<select class="form-control mb-4" name="yetki" id="">
							<option <?php if ($value['yetki'] == 0) {
										echo "selected";
									} ?> value="0">Admin</option>
							<option <?php if ($value['yetki'] == 1) {
										echo "selected";
									} ?> value="1">User</option>
							<option <?php if ($value['yetki'] == 2) {
										echo "selected";
									} ?> value="2">Misafir</option>
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
		break;


	case 'kullaniciGuncelle':
		$id = $_POST['id'];
		$ad_soyad = $_POST['ad_soyad'];
		$yetki = $_POST['yetki'];
		$email = $_POST['email'];
			if ($ad_soyad == "") {
				echo "Ad Soyad boş bırakılamaz!";
				return;
			} 
			else {
	$sonuc = $vt->guncelle("kullanici", array(
	"ad_soyad" => $ad_soyad,
	"email" => $email,
	"yetki" => $yetki
	), "id = '{$id}'");

	$dizi = array("islem" => "Kullanıcı Güncellendi");
		$sonuc = $vt->ekle("logs", $dizi);
	}
break;


	case 'kullaniciEditBody':
		$id =  $_POST['id'];
		$listele = $vt->select("kullanici", "where id = '{$id}' ");
		foreach ($listele as $key => $value) {
			$ad_soyad = $value['ad_soyad'];
			$email = $value['email'];
			$yetki = $value['yetki'];
		}
		?>
		<form id="kategoriEdit">
			<input class="form-control" name="id" value="<?php echo $id; ?>" type="hidden">
			<div class="mb-3">

				<select class="form-control mb-4" name="yetki" id="">
					<option <?php if ($yetki == 0) {
								echo "selected";
							} ?> value="0">Admin</option>
					<option <?php if ($yetki  == 1) {
								echo "selected";
							} ?> value="1">Kullanıcı</option>
					<option <?php if ($yetki  == 2) {
								echo "selected";
							} ?> value="2">Misafir</option>
				</select>
				<label>Kullanıcı Ad Soyad *</label>
				<input required type="text" class="form-control mb-4" value="<?php echo $ad_soyad; ?>" name="ad_soyad" placeholder="Kullanıcı Ad Soyad">
				<label>Kullanıcı Email *</label>
				<input onkeyup="emailKontrol(this)" required type="email" value="<?php echo $email; ?>" class="form-control mb-4" name="email" id="email" placeholder="Kullanıcı Email">



			</div>
		</form>
		<?php
		break;

	case 'yeniKullanici':
		$yetki = $_POST['yetki'];
		$ad_soyad = $_POST['ad_soyad'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);

	

			///Müşteri Kontrol
			$emailkontrol = $vt->kontrol("kullanici", "WHERE email= '{$email}' ");
			if ($emailkontrol > 0) {
				Header("Location:../tema/kullanici.php?case=mukerrer");
			} else {
				$dizi =  array(
					"yetki" => $yetki,
					"ad_soyad" => $ad_soyad,
					"email" => $email,
					"password" => $password
				);
				$sonuc = $vt->ekle("kullanici", $dizi);
				/// logs
				$dizi =  array(
					"islem" => "Yeni Kullanıcı Eklendi"
				);
				Header("Location:../tema/kullanici.php?case=insertok");
			}
		


		break;





	case 'kategoriList':
		$listele = $vt->select("kategori", "");
		if (!empty($listele)) {
			foreach ($listele as $key => $value) { ?>
				<div class=" mb-4 col-xl-3 col-lg-3 col-md-3">
					<div class="card-body">
						<div class="card mb-3">
							<img style="max-height: 200px; min-height:200px;" class="card-img-top" src="../action/<?php echo $value['resim']; ?>" alt="Card image cap">
							<div class="card-body   ">
								<div class=" d-flex  justify-content-sm-between">

									<h5 class="card-title mt-2"><?php echo $value['baslik']; ?></h5>

									<button onclick="editBtn(this)" class="btn btn-icon btn-label-linkedin" data-id="<?php echo $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#animationModal"><i class="fa-solid fa-pen-to-square"></i></button>

									<button onclick="kategoriDelete(this)" class="btn btn-icon btn-outline-reddit" data-url="<?php echo $value['resim']; ?>" data-id="<?php echo $value['id']; ?>"><i class="fa-solid fa-trash-can"></i></button>

								</div>

							</div>
						</div>
					</div>
				</div>
		<?php }
		} else {
			echo '
			<div class="alert alert-danger" role="alert">Kayıtlı Kategori Bulunmadı</div>
			';
		}
		break;


	case 'kategoriGuncelle':

		$id = $_POST['id'];
		$baslik = $_POST['baslik'];
		$aciklama = $_POST['aciklama'];
		$ust_kategori = $_POST['ust_kategori'];
		$sonuc = $vt->guncelle("kategori", array(
			"baslik" => $baslik,
			"aciklama" => $aciklama,
			"ust_kategori" => $ust_kategori
		), "id = '{$id}'");
		/// logs
		$dizi =  array(
			"islem" => "Kategori Güncellendi"
		);
		$sonuc = $vt->ekle("logs", $dizi);
		break;

	case 'kategoriEditBody':
		$id =  $_POST['id'];
		$listele = $vt->select("kategori", "where id = '{$id}' ");
		foreach ($listele as $key => $value) {
			$baslik = $value['baslik'];
			$aciklama = $value['aciklama'];
			$ust_kategori = $value['ust_kategori'];
		}
		?>
		<form id="kategoriEdit">
			<input class="form-control" name="id" value="<?php echo $id; ?>" type="hidden">
			<div class="mb-3">
				<label for="formFile" class="form-label  mb-2">Başlık * </label>
				<input required class="form-control" name="baslik" value="<?php echo $baslik; ?>" type="text" id="formFile">
				<label for="formFile" class="form-label  mb-2">Açıklama Başlık (Varsa Ekleyin zorunlu değildir.)</label>
				<input class="form-control" name="aciklama" value="<?php echo $aciklama; ?>" type="text" id="formFile">
				<label for="formFile" class="form-label  mb-2">Üst Kategori</label>
				<select class="form-control" name="ust_kategori">
					<option value="0">Yok</option>
					<?php
					$listele = $vt->select("kategori", "");
					foreach ($listele as $key => $value) { ?>
						<option <?php if ($value['id'] == $ust_kategori) {
									echo "selected";
								} ?> value="<?php echo $value['id']; ?>"><?php echo $value['baslik']; ?></option>

					<?php }
					?>
				</select>

			</div>
		</form>
<?php
		break;



	case 'kategoriDelete':
		$old_url =  $_POST['old_url'];
		$id =  $_POST['id'];
		unlink($old_url);
		$delete = $vt->idSil("kategori", $id);
		/// logs
		$dizi =  array(
			"islem" => "Kategori Silindi"
		);
		$sonuc = $vt->ekle("logs", $dizi);

		break;

	case 'kategoriUpload':
		$resim = $_POST['resim'];
		$baslik = $_POST['baslik'];
		$ust_kategori = $_POST['ust_kategori'];
		$aciklama = $_POST['aciklama'];
		$one_cikar = $_POST['one_cikar'];
		$uploads_dir = 'galeri';
		@$tmp_name = $_FILES['resim']["tmp_name"];
		@$name = $_FILES['resim']["name"];

		$benzersizsayi4 = rand(20000, 32000);
		$resim = substr($uploads_dir, 12) . $benzersizsayi4 . $name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
		$resim = "galeri/$resim";

		$dizi =  array(
			"resim" => $resim,
			"baslik" => $baslik,
			"aciklama" => $aciklama,
			"one_cikar" => $one_cikar,
			"ust_kategori" => $ust_kategori
		);
		$sonuc = $vt->ekle("kategori", $dizi);

		/// logs
		$dizi =  array(
			"islem" => "Kategori Eklendi"
		);
		$sonuc = $vt->ekle("logs", $dizi);
		Header("Location:../tema/kategori.php?case=insertok");

		break;


	default:

		break;
}
