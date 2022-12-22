<?php
if (!empty($_GET['case'])) {
	$case = $_GET['case'];



if ($case == "loginSuccess") {
	echo "<script >
		toastr.info('Varsayılan ayarlar ve dosyalar yükleniyor. Lütfen bekleyiniz..!')	
		</script>";
	}
else if ($case == "ok") {
	echo "<script >
	Swal.fire({

		position: 'bottom-start',
		icon: 'success',
		title: 'Güncelleme İşlemi Başarılı',
		showConfirmButton: false,
		timer: 4000,
		confirmButtonClass: 'btn btn-primary',
		buttonsStyling: false,
		})
		</script>";
	}
	else if ($case == "insertok") {
		echo "<script >
		toastr.info('İşlem başarılı')	
			</script>";
		}
		else if ($case == "mukerrer") {
			echo "<script >
			toastr.error('Email ile kayıtlı kullanıcı var.')	
				</script>";
			}
	else if ($case == "musteriemailvar") {
	echo "<script >
	Swal.fire({

		position: 'bottom-end',
		icon: 'error',
		title: 'Bu email ile daha önce kayıt yapılmış',
		showConfirmButton: false,
		timer: 4000,
		confirmButtonClass: 'btn btn-primary',
		buttonsStyling: false,
		})
		</script>";
	}
}
	?>
