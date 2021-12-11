<?php
	session_start();
	session_destroy();

	$routeUrl="../giris.php";
	header("Location:$routeUrl");
	exit("3 Saniye içerisinde başka sayfaya yönlendirilecektir.");


?>