<?php
// include config
require 'config.php';

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo $organization; ?> WiFi</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui" />
<style>
*, *::before, *::after {
	margin: 0;
	padding: 0;
}

html {
	font-family: sans-serif;
	background-image: url(img/bg.png);
}

a {
	text-decoration: none;
}

h1 {
	font-size: 1.5em;
}
@media only screen and (max-width: 320px) {
	h1 {
		font-size: 1.2em;
	}
}

.install {
	width: 230px;
	margin: 1em .2em;
	display: inline-block;
	color: #000000;
	padding: 10px 20px;
	background: -webkit-gradient(linear, left top, left bottom, from(white), to(#e0e0e0));
	background: -webkit-linear-gradient(top, white 0%, #e0e0e0);
	background: -moz-linear-gradient(top, white 0%, #e0e0e0);
	background: linear-gradient(top, white 0%, #e0e0e0);
	border-radius: 6px;
	border: 1px solid #bbb;
	-webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5), inset 0px -1px 0px rgba(255, 255, 255, 0.7);
	box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5), inset 0px -1px 0px rgba(255, 255, 255, 0.7);
	text-shadow: 0px -1px 1px rgba(158, 158, 158, 0.2), 0px 1px 0px rgba(255, 255, 255, 0.3);
}
.install p {
	margin: .5em 0;
}

.cog {
	width: 12px;
	height: 12px;
}

.center {
	position: absolute;
	left: 50%;
	top: 50%;
	-webkit-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
}
</style>
</head>
<body>
<?php
#echo '<img src="qrcode.php" alt="QR-Code" />';
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'Mac'))
{
echo '<div class="center">';
$n = 0;
while ($n <= (count($arr_wlan)-1) ) {
	echo '
	<a href="mobileconfig.php?id=0" class="install">
	<h1>'.$arr_wlan[$n]["name"].'</h1>
	<p>802.11'.$arr_wlan[$n]["standards"].' – '.$arr_wlan[$n]["freq"].' GHz</p>
	<p><object data="img/cog.svg" type="image/svg+xml" class="cog"></object>&nbsp;Install WiFi-profile</p>
	</a>';
	$n++;
}
echo '</div>';
} else {
echo '
<div class="center">
<div class="install">
	<h1>Schwerkraftlabor&nbsp;WLAN</h1>
	<p>(!)&nbsp;Diese Funktion ist nur auf iOS oder Mac-Geräten verfügbar.</p>
</div>
</div>
';
}
?>
</body>
</html>
