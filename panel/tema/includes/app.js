/// Şifeeleme güncelleme
function updatePassword(){
	var account_new_password = document.getElementById('account-new-password').value;
	var confirm_new_password = document.getElementById('confirm-new-password').value;
	
	if (account_new_password == confirm_new_password) {
		$.ajax({
			type: "POST",
			data:{
				account_new_password:account_new_password,
			},
			url: "assets/ajax.php?action=account_new_password",
			success: function (data) {
				toastr.success('Şifre Değiştirme işlemi Başarılı');	
				var timerInterval
				Swal.fire({
					title: 'Şifre değiştirildi.!',
					html: 'yönlendiriliyorsunuz <strong></strong> zaman.',
					timer: 2000,
					confirmButtonClass: 'btn btn-primary',
					buttonsStyling: false,
					onBeforeOpen: function () {
						Swal.showLoading()
						timerInterval = setInterval(function () {
							Swal.getContent().querySelector('strong')
							.textContent = Swal.getTimerLeft()
						}, 100)
					},
					onClose: function () {
						clearInterval(timerInterval)
					}
				}).then(function (result) {
					if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.timer
        ) {
						console.log('I was closed by the timer')
				}
			})
				$.ajax({
					type: "POST",
					data:{

						data:null,
					},
					url: "assets/ajax.php?action=sessionDestory",
					success: function (data) {
						setTimeout(function(){                               
							window.location = "../../index.php";
						}, 2500);
					} 
				}); 
			} 
		});
	}
	else{
		toastr.error('Şifre Tekrarlar Hatalı');
		document.getElementById('account-new-password').value = "";
		document.getElementById('confirm-new-password').value = "";
	}

}


var confirm_new = document.getElementById('confirm-new-password');
var account_new = document.getElementById('account-new-password');
confirm_new.addEventListener('blur' , function(){
	if (confirm_new.value != "") {
		if (account_new.value == confirm_new.value ) {
			$("#confirm-new-password").css('border', '3px solid green');
		}	
	}
	
})

///// Eski ve yeni şifre karşılaştırma
var oldpassword = document.getElementById('oldpassword');
var account_new_password = document.getElementById('account-new-password');
account_new_password.addEventListener('blur' , function(){
	if (account_new_password.value != "") {
		if (account_new_password.value == oldpassword.value) {
			toastr.error('Yeni Şifre Eski şifreden farklı olmalıdır');
			document.getElementById('account-new-password').value = "";
			document.getElementById('account-new-password').focus();
			$("#account-new-password").css('border', '3px solid red');
		}else{
			$("#account-new-password").css('border', '3px solid green');
		}	
	}
	
})


////**** Kullanıcı eski şifre kontrol****
var oldpassword = document.getElementById('oldpassword');
oldpassword.addEventListener('blur' , function(){

	if (oldpassword.value != "") {
		$.ajax({
			type: "POST",
			data:{
				oldpassword:oldpassword.value,
			},
			url: "assets/ajax.php?action=password_control",
			success: function (data) {

				if (parseInt(data) === 1) {
					toastr.success('Şifre Doğrulama Başarılı');	
					$("#oldpassword").css('border', '3px solid green');
				}else{
					document.getElementById('oldpassword').value = "";
					toastr.error('Eski şifre hatalı');	
					$("#oldpassword").css('border', '3px solid red');
				}


			} 
		});	
	}

	
})

/// ****Genel Ayarlar Genel bilgi güncelleme Formu***
var generalInfoBtn = document.getElementById('generalInfoBtn');
generalInfoBtn.addEventListener('click', function(){
	var form = $("#generalInfo").serialize();
	$.ajax({
		type: "POST",
		data:form,
		url: "assets/ajax.php?action=generalInfo",
		success: function (data) {
			const myObj = JSON.parse(data);
			//alert(myObj.email)
			$("#name").innerHTML = myObj.name;
			$("#email").innerHTML = myObj.email;
			$("#companyname").innerHTML = myObj.companyname;
			toastr.success('Güncelleme işlemi başarılı...');	
			
		} 
	});
})

/// ****Kullanıcı resim resetleme***
function resetImage(){

	var old_url = document.getElementById("old-url").value;
	
	$.ajax({
		type: "POST",
		data:{
			old_url:old_url,
		},
		url: "assets/ajax.php?action=resetImage",
		success: function (data) {

			toastr.success('Resetleme işlemi başarılı...');	
			$('#user-profile').attr('src', "assets/resim-yok.png");
			
		} 
	});
}

/// *****Kullanıcı Resim seçme değiştirme***
$("#select-files").change(function(){ //dosya seçildiğinde
	var file_button = $(this); //butonu al
	var old_url = document.getElementById("old-url").value;
	
	var my_files = document.getElementById("select-files"); //file_upload id li elemanı al, file input
	if (my_files.files && my_files.files[0] && my_files.files[0].type.match('image.*')){ //dosya var ve resim türünde ise
		var reader = new FileReader(); //FileReader class kur
		reader.onload = function() { //veriyi yükle
			 //dosya verisi
			var file_data = reader.result; //dosya verisi
			$.ajax({ //dosya data sını ajax.php ye postala
				url: "assets/ajax.php?action=userPhoto", 
				type: "POST",             
				data: {
					veri:file_data,
					old_url:old_url

				},
				dataType: "json",
				success: function(data) {
					if (data.charAt(0) == "i"){
						toastr.success('Resim Başarı ile değiştirildi...');	
						$('#user-profile').attr('src', "assets/" + data);
						$('#old-url').val(data);
						//file_button.after('<br><br><hr><br><img src="'+file_data+'" width="350px">'); //file input elemanının sonrasına ekle
					}else{
						alert(data); //hata mesajini goster
					}
				} 

			});
		}
		reader.readAsDataURL(my_files.files[0]); //oku
		return false;
	}

});



////
/*
$(document).on("change",'form[name="userPhoto"]',function() {
	var $data = new FormData(this);
	$.ajax({
		data: $data,
		dataType:'json' ,
		type: "POST",
		url: "assets/ajax.php?action=userPhoto",
		success: function (data) {
		alert(data)
		} 
	}); 
});

*/
/////**** Kullanıcı çıkış butonu****
function logout(){
	Swal.fire({
		title: 'Oturum Kapatılsın mı ?',
		text: "Bu siteye ait güvenli çıkış işlemi yapılacaktır.",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Güvenli Çıkış Yap !',
		confirmButtonClass: 'btn btn-primary',
		cancelButtonClass: 'btn btn-danger ml-1',
		buttonsStyling: false,
	}).then(function (result) {
		if (result.value) {
			Swal.fire(
			{
				icon: "success",
				title: 'Güvenli Çıkış Yapıldı!',
				text: 'Giriş sayfasına yönlendiriliyorsunuz.',
				confirmButtonClass: 'btn btn-success',
			}
			)
			$.ajax({
				type: "POST",
				data:{

					data:null,
				},
				url: "action/ajax.php?action=sessionDestory",
				success: function (data) {
					setTimeout(function(){                               
						window.location = "../../index.php";
					}, 2000);
				} 
			}); 		

		}
	})
}

