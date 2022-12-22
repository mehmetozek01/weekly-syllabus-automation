<?php
ob_start();
session_start();
include 'db.php';

$vt = new Action($dbname, $user, $password);
function resultInfo($db, $tablo, $diger = "", $sonuc)
{
	$bilgi = $db->prepare("SELECT * from " . $tablo . " " . $diger);
	$bilgi->execute();
	$bilgiGetir = $bilgi->fetch(PDO::FETCH_ASSOC);
	return $bilgiGetir[$sonuc];
}
$action = $_GET['action'];

switch ($action) {

	case 'sessionDestory':
		session_destroy();
		break;


	case 'resimguncelle':
		$id = $_POST['id'];
		$old_url = $_POST['old_url']; //eski dosyayı silme
		echo $harf = substr($old_url, 0, 1);
		if ($harf === "i") {
			unlink($old_url);
		}
		//exit();
		$uploads_dir = 'img/personel';
		//var_dump($_POST);
		@$tmp_name = $_FILES['photo']["tmp_name"];
		@$name = $_FILES['photo']["name"];

		$benzersizsayi4 = rand(20000, 32000);
		$refimgyol = substr($uploads_dir, 12) . $benzersizsayi4 . $name;
		//exit();

		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
		$refimgyol = "img/personel/$refimgyol";
		$sonuc = $vt->guncelle("users", array(
			"profile_photo_path" => $refimgyol
		), "id = '$id' ");
		Header("Location:../view/calisan-profil.php?id=" . $id);
		break;


	case 'user_delete':
		$id =  $_POST['id'];
		$delete = $vt->idSil("users", $id);

		break;



	case 'password_update':
		$id = $_POST['id'];
		$password = $_POST['passwordNew'];
		$password = md5($password);
		$sonuc = $vt->guncelle("users", array(
			"password" => $password
		), "id = '{$id}'");
		echo true;
		break;



	case 'login':
		// User Login checked
		 $email = $_POST['email'];
		$password  = md5($_POST['password']);
			$emailkontrol = $vt->kontrol("kullanici", "WHERE email= '{$email}' ");
			if ($emailkontrol > 0) {
				$sifrekontrol = $vt->kontrol("kullanici", "WHERE email= '{$email}' and  password= '{$password}'");
				if ($sifrekontrol > 0) {

					$_SESSION['email'] = $email;

					header('Location: ../tema/index.php?case=loginSuccess');
				} else {
					//echo "Password Error";
					header('Location: ../../index.php?case=passwordError');
				}
			} else {
				//echo "No Email";
				header('Location: ../../index.php?case=noEmail');
			}
		


		break;

	default:

		break;
}
