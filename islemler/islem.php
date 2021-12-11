
	<?php 
	
	include 'baglan.php';
	include '../fonksiyonlar.php';

	ob_start();
	session_start();

	if(isset($_POST['ayarkaydet'])){
    $ayarkaydet=$db->prepare("UPDATE ayarlar 
    	SET site_baslik=:site_baslik, 
    	site_aciklama=:site_aciklama, 
    	site_sahibi=:site_sahibi");

    $ayarkaydet->execute(array(
    	'site_baslik' => $_POST['site_baslik'],
    	'site_aciklama' => $_POST['site_aciklama'],
    	'site_sahibi' => $_POST['site_sahibi']
    ));

	}

	if(isset($_POST['oturumac'])){
		$usercheck=$db->prepare("SELECT * FROM kullanicilar WHERE 
			kul_mail=:kul_mail AND 
			kul_sifre=:kul_sifre");
		$usercheck->execute(array(
			'kul_mail'=>$_POST['kul_mail'],
			'kul_sifre'=>$_POST['kul_sifre']
		));
		$sonuc=$usercheck->rowcount();
		
		if ($sonuc == 0){
			echo "Mail veya Şifreniz Yanlış";
		} else{
			header("location:../index.php");
			$_SESSION['kul_mail']=$_POST['kul_mail'];
		}
	}
//soldaki degiskenler veritabanı alandakiyle aynı olacak!!!
	if(isset($_POST['projeekle'])){
		$projeekle=$db->prepare("INSERT INTO projeler SET 
			proje_baslik=:proje_baslik,
			proje_aciliyet=:proje_aciliyet,
			proje_durum=:proje_durum,
			proje_teslim_tarih=:proje_teslim_tarih,
			proje_detay=:proje_detay,
			dosya_yolu=:dosya_yolu
			");
		$projeekle->execute(array(
			'proje_baslik' => $_POST['proje_baslik'],			
			'proje_aciliyet' => $_POST['proje_aciliyet'],
			'proje_durum' => $_POST['proje_durum'],
			'proje_teslim_tarih' => $_POST['proje_teslim_tarih'],
			'proje_detay' => $_POST['proje_detay'],
			'dosya_yolu' =>$_FILES['dosya_yolu']
		));

		if ($_FILES["dosya_yolu"]) {

		  $yol = "../dosyalar";

		  $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["dosya_yolu"]["name"];

		  if ( file_exists($yuklemeYeri) ) {

		      echo "Dosya daha önceden yüklenmiş";

		  } else {

		      if ($_FILES["dosya_yolu"]["size"]  > 5000000) { # 5 MB dosya sınırı

		          echo "Dosya boyutu sınırı";

		      } else {

		      $sonuc = move_uploaded_file($_FILES["dosya_yolu"]["tmp_name"], $yuklemeYeri);

		      echo $sonuc ? "Dosya başarıyla yüklendi" :  "Hata oluştu";

		      header("location:../projeler.php");

		      }

		  }

			} else {

			  echo "Lütfen bir dosya seçin";

				}
			}


	if(isset($_POST['projeDuzenle'])){
			$projeDuzenle=$db->prepare("UPDATE projeler SET 
				proje_baslik=:proje_baslik,
				proje_teslim_tarih=:proje_teslim_tarih,
				proje_aciliyet=:proje_aciliyet,
				proje_durum=:proje_durum,
				proje_detay=:proje_detay  WHERE proje_id=:proje_id
				");
			$projeDuzenle->execute(array(
				'proje_baslik' => $_POST['proje_baslik'],
				'proje_teslim_tarih' => $_POST['proje_teslim_tarih'],
				'proje_aciliyet' => $_POST['proje_aciliyet'],
				'proje_durum' => $_POST['proje_durum'],
				'proje_detay' => $_POST['proje_detay'],
				'proje_id' => $_POST['proje_id'],
			));

			if($projeDuzenle){
				header("location:../projeler.php");
			}else{
				echo "Proje düzenlemesi başarısız!";
				exit;
			}
		}

		if(isset($_POST['projesilme'])){
			$projeSil=$db->prepare("DELETE FROM projeler WHERE proje_id=:proje_id");
			$projeSil->execute(array(
				'proje_id' => $_POST['proje_id']
			));
			if ($projeSil) {
				header("location:../index.php");
			}else{
				echo "Proje silinemedi !";
				exit;
			}
		}

		if(isset($_POST['projebak'])){
			$projebak=$db->prepare("SELECT * FROM projeler   
				proje_baslik=:proje_baslik,
				proje_teslim_tarih=:proje_teslim_tarih,
				proje_aciliyet=:proje_aciliyet,
				proje_durum=:proje_durum,
				proje_detay=:proje_detay WHERE proje_id=:proje_id
				");
			$projebak->execute(array(
				'proje_baslik' => $_POST['proje_baslik'],
				'proje_teslim_tarih' => $_POST['proje_teslim_tarih'],
				'proje_aciliyet' => $_POST['proje_aciliyet'],
				'proje_durum' => $_POST['proje_durum'],
				'proje_detay' => $_POST['proje_detay'],
				'proje_id' => $_POST['proje_id']
			));
			
			if($projebak){
				header("location:../projeler.php");
			}else{
				echo "Proje görüntülemesi başarısız!";
				exit;
			}
		}

	if(isset($_POST['siparisekle'])){
		$siparisEkle=$db->prepare("INSERT INTO siparis SET 
			musteri_isim=:musteri_isim,					
			musteri_tel=:musteri_tel,	
			musteri_mail=:musteri_mail,				
			sip_baslik=:sip_baslik,
			sip_durum=:sip_durum,
			sip_aciliyet=:sip_aciliyet,
			sip_ucret=:sip_ucret,
			sip_teslim_tarihi=:sip_teslim_tarihi,			
			sip_detay=:sip_detay			
			");
		$siparisEkle->execute(array(
			'musteri_isim' => $_POST['musteri_isim'],				
			'musteri_tel' => $_POST['musteri_tel'],
			'musteri_mail' => $_POST['musteri_mail'],
			'sip_baslik' => $_POST['sip_baslik'],
			'sip_durum' => $_POST['sip_durum'],
			'sip_aciliyet' => $_POST['sip_aciliyet'],
			'sip_ucret' => $_POST['sip_ucret'],
			'sip_teslim_tarihi' => $_POST['sip_teslim_tarihi'],			
			'sip_detay' => $_POST['sip_detay']
		));

		if ($_FILES["sip_dosya"]) {

		  $yol = "../dosyalar";

		  $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["sip_dosya"]["name"];

		  if ( file_exists($yuklemeYeri) ) {

		      echo "Dosya daha önceden yüklenmiş";

		  } else {

		      if ($_FILES["sip_dosya"]["size"]  > 5000000) { # 5 MB dosya sınırı

		          echo "Dosya boyutu sınırı";

		      } else {

		      $sonuc = move_uploaded_file($_FILES["sip_dosya"]["tmp_name"], $yuklemeYeri);

		      echo $sonuc ? "Dosya başarıyla yüklendi" :  "Hata oluştu";

		      header("location:../siparisler.php");

		      }

		  }

			} else {

			  echo "Lütfen bir dosya seçin";

				}
			}

	if(isset($_POST['siparisDuzenle'])){
		$siparisDuzenle=$db->prepare("UPDATE siparis SET 
			musteri_isim=:musteri_isim,
			musteri_tel=:musteri_tel,
			musteri_mail=:musteri_mail,						
			sip_baslik=:sip_baslik,
			sip_durum=:sip_durum,
			sip_ucret=:sip_ucret,
			sip_teslim_tarihi=:sip_teslim_tarihi,
			sip_aciliyet=:sip_aciliyet,
			sip_detay=:sip_detay WHERE sip_id=:sip_id
			");
		$siparisDuzenle->execute(array(
			'musteri_isim' => $_POST['musteri_isim'],
			'musteri_tel' => $_POST['musteri_tel'],
			'musteri_mail' => $_POST['musteri_mail'],			
			'sip_baslik' => $_POST['sip_baslik'],
			'sip_durum' => $_POST['sip_durum'],
			'sip_ucret' => $_POST['sip_ucret'],
			'sip_teslim_tarihi' => $_POST['sip_teslim_tarihi'],
			'sip_aciliyet' => $_POST['sip_aciliyet'],
			'sip_detay' => $_POST['sip_detay'],
			'sip_id' => $_POST['sip_id']
		));

		if($siparisDuzenle){
			header("location:../siparisler.php");
		}else{
			echo "Sipariş düzenlemesi başarısız!";
			exit;
		}
}																				


if(isset($_POST['siparisSilme'])){
		$siparisSil=$db->prepare("DELETE FROM siparis WHERE sip_id=:sip_id");
		$siparisSil->execute(array(
			'sip_id' => $_POST['sip_id']
		));
		if ($siparisSil) {
			header("location:../index.php");
		}else{
			echo "Sipariş silinemedi !";
			header("location:../index.php");
			exit;
		}
	}

if(isset($_POST['siparisbak'])){
		$siparisbak=$db->prepare("SELECT * FROM siparis  
			musteri_isim=:musteri_isim,
			musteri_tel=:musteri_tel,
			musteri_mail=:musteri_mail,						
			sip_baslik=:sip_baslik,
			sip_durum=:sip_durum,
			sip_ucret=:sip_ucret,
			sip_teslim_tarihi=:sip_teslim_tarihi,
			sip_aciliyet=:sip_aciliyet,
			sip_detay=:sip_detay WHERE sip_id=:sip_id
			");
		$siparisbak->execute(array(
			'musteri_isim' => $_POST['musteri_isim'],
			'musteri_tel' => $_POST['musteri_tel'],
			'musteri_mail' => $_POST['musteri_mail'],			
			'sip_baslik' => $_POST['sip_baslik'],
			'sip_durum' => $_POST['sip_durum'],
			'sip_ucret' => $_POST['sip_ucret'],
			'sip_teslim_tarihi' => $_POST['sip_teslim_tarihi'],
			'sip_aciliyet' => $_POST['sip_aciliyet'],
			'sip_detay' => $_POST['sip_detay'],
			'sip_id' => $_POST['sip_id']
		));
			
			if($siparisbak){
				header("location:../siparisler.php");
			}else{
				echo "Sipariş görüntülemesi başarısız!";
				header("location:../index.php");
				exit;
			}
		}




?>