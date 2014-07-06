<?php
// Set mime-type for png
header('Content-type: image/png; chatset=utf-8');

// include library & config
require 'phpqrcode.php';
include 'config.php';

// Which Wifi?

$wlan = (int) 0;
if (empty($_GET)) {
	$wlan = (int) 0;
} elseif ($_GET['id'] == 1){
	$wlan = (int) 1;
} else {
	$wlan = (int) $_GET['id'];
}

$size = 5;
$margin = 0;

// Wifi is hidden?

if ($arr_wlan[$wlan]["hidden"] == true) {
	$hidden = (string) ",H:true";
} else {
	$hidden = (string) "";
}

// Getting the security of the wifi

if ($arr_wlan[$wlan]["sec"] == "WPA" || $arr_wlan[$wlan]["sec"] == "WPA2" ) {
	$sec = (string) "T:WPA;";
} elseif ($arr_wlan[$wlan]["sec"] == "WEP") {
	$sec = (string) "T:WEP;";
} else {
	$sec = (string) "";
}

// Building the whole string

$qrstring = 'WIFI:S:'.$arr_wlan[$wlan]["name"].';'.$sec.'P:'.$arr_wlan[$wlan]["pass"].$hidden.';';

// create PNG
QRcode::PNG($qrstring, false, QR_ECLEVEL_L, $size, $margin);

?>
