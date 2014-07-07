<?php
// includes the config
// make your changes there!
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

body {
	font-family: sans-serif;
	background: <?php echo $bgcolor; ?>;
	font-size: 12pt;
}
a {
	text-decoration: none;
	color: #000;
}

h1 {
	font-size: 1.5em;
	white-space: nowrap;
}
@media only screen and (max-width: 320px) {
	h1 {
		font-size: 1.2em;
	}
}

a.profiles {
	display: inline-block;
}
.profiles {
	margin: 1em .2em;
	color: #000;
	padding: 1em 1em;
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
.profiles p {
	margin: .5em 0;
}

.desktop .links {
	display: inline-block;
	border: 1px solid #aaa;
	padding: 0.5em 0.5em 0.4em 0.5em;
	background:rgba(255,255,255,0.3);
}
.mobile .links {
	display: block;
	border: 1px solid black;
	padding: 0.5em 0.5em;
	background:rgba(255,255,255,0.65);
}
.mobile {
	margin: 4%;
}

.icon {
	width: 12px;
	height: 12px;
}

.password input{
	border: 1px solid #bbb;
	background: #fff;
	font-size: 9pt;
	padding: 5px;
}

.info {
	font-size: 11pt;
}

.center {
	position: absolute;
	left: 50%;
	top: 50%;
	-webkit-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
}

.overlay {
	margin: 0 auto;
	background: #fff;
	padding: 1.5em;
	z-index: 999;
	display: none;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-o-border-radius: 10px;
	border-radius: 10px;
}

<?php
$n = 0;
while ($n <= ($wificount-1) ) {
echo '
.mask'.$n.' {
	position: fixed;
	top: 0;
	left: 0;
	background: rgba(0,0,0,0.65);
	z-index: 50'.$n.';
	width: 100%;
	height: 100%;
	display: none;
}
#overlay'.$n.':target, #overlay'.$n.':target + .mask'.$n.' {
	display: block;
	opacity: 1;
}
';
	$n++;
}
?>
</style>
</head>
<body>
<?php
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
{
/*
-- iOS Version
*/
echo '<div class="mobile">';
$n = 0;
while ($n <= ($wificount-1) ) {
	echo '
<div class="profiles">
	<h1>'.$arr_wlan[$n]["name"].'</h1>
	<p>802.11'.$arr_wlan[$n]["standards"].' – '.$arr_wlan[$n]["freq"].' GHz – '.$arr_wlan[$n]["sec"].'</p>
	<p><a class="links" href="mobileconfig.php?id='.$n.'"><object data="img/cog.svg" type="image/svg+xml" class="icon"></object>&nbsp;Install WiFi-profile</a></p>
	<p><a class="links" href="#overlay'.$n.'"><object data="img/cog.svg" type="image/svg+xml" class="icon"></object>&nbsp;Show QR-code</a></p>
</div>';
	$n++;
}
echo '</div>';
$n = 0;
while ($n <= ($wificount-1) ) {
	echo '
<div id="overlay'.$n.'" onclick="document.location=\'#\';" class="overlay center"><img src="qrcode.php?id='.$n.'" alt="QR-Code" /></div><div class="mask'.$n.'" onclick="document.location=\'#\';"></div>';
	$n++;
	}

} else {
/*
-- Desktop Version
*/
echo '
<div class="center desktop">
	<div class="profiles">
		<h1>Schwerkraftlabor.de</h1>
	</div>
';
$n = 0;
while ($n <= ($wificount-1) ) {
	echo '
	<div class="profiles">
	<h1>'.$arr_wlan[$n]["name"].'</h1>
	<p class="info">802.11'.$arr_wlan[$n]["standards"].' – '.$arr_wlan[$n]["freq"].' GHz – '.$arr_wlan[$n]["sec"].'-protected</p>
	<p class="password">Password:&nbsp;<input type="text" onfocus="this.select()" value="'.$arr_wlan[$n]["pass"].'"></input></p>';

// If Mac => display WiFi-profile too
if(strstr($_SERVER['HTTP_USER_AGENT'],'Mac')) {
	echo '<p><a class="links" href="mobileconfig.php?id='.$n.'"><object data="img/cog.svg" type="image/svg+xml" class="icon"></object>&nbsp;Install WiFi-profile</a></p>';
}

echo '<p><a class="links" href="#overlay'.$n.'"><object data="img/cog.svg" type="image/svg+xml" class="icon"></object>&nbsp;Show QR-code</a></p>
</div>
	';
	$n++;
}
echo '</div>';
$n = 0;
while ($n <= ($wificount-1) ) {
	echo '
<div id="overlay'.$n.'" onclick="document.location=\'#\';" class="overlay center"><img src="qrcode.php?id='.$n.'" alt="QR-Code" /></div><div class="mask'.$n.'" onclick="document.location=\'#\';"></div>';
	$n++;
	}
}
?>
</body>
</html>
