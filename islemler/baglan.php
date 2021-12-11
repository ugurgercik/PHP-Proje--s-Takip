<?php 
$host="localhost";   //host adınız
$veritabani_ismi="adminpage";  //veritabanı ismi
$kullanici_adi="root";  //veritabanı kullanıcı adı
$sifre=""; 	 	//kullanıcı şifresi

try {
	$db=new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8", $kullanici_adi,$sifre);
	//echo "veritabanı baglantısı başarılı";
} 
catch (PDOException $e) {
	echo "veritabanı baglantısı başarısız";
	echo $e->getMessage();  
}


?>