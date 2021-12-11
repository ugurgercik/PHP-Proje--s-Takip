<?php

function tr_degistirme($metin){
	$metin = trim($metin);
	$aranacak = array('Ç','ç','Ğ','ğ','Ü','ü','İ','ı','Ö','ö','Ş','ş',' ');
	$replace = array('c','c','g','g','u','u','i','i','o','o','s','s','-');
	$yeni_metin=str_replace($aranacak, $replace, $metin);
	return $yeni_metin;
}

function guvenlik($gelen){
	$giden=addslashes($gelen);
	$giden=htmlspecialchars($giden);
	$giden=strip_tags($giden);
	return $giden;
}


?>