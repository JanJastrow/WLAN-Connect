<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8" />
<title>Schwerkraftlabor WLAN</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'Mac'))
{
echo '
<div class="center">
<a href="alpha.mobileconfig" class="install">
	<h1>Schwerkraftlabor&nbsp;Alpha</h1>
	<p>802.11n/a – 5 GHz</p>
	<p><i class="fa fa-cog"></i>&nbsp;WLAN-Profil installieren</p>
</a>
<a href="beta.mobileconfig" class="install">
	<h1>Schwerkraftlabor&nbsp;Beta</h1>
	<p>802.11n/g – 2.4 GHz</p>
	<p><i class="fa fa-cog"></i>&nbsp;WLAN-Profil installieren</p>
</a>
</div>
';
} else {
echo '
<div class="center">
<div class="install">
	<h1>Schwerkraftlabor&nbsp;WLAN</h1>
	<p><i class="fa fa-exclamation-triangle"></i>&nbsp;Diese Funktion ist nur auf iOS oder Mac-Geräten verfügbar.</p>
</div>
</div>
';
}
?>
</body>
</html>
