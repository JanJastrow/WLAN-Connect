<?php
// Set mime-type for mobileconfiguration-profiles
header('Content-type: application/x-apple-aspen-config; chatset=utf-8');

// include config
include 'config.php';

$wlan = (int) 0;
if (empty($_GET)) {
	$wlan = (int) 0;
} elseif ($_GET['id'] == 1){
	$wlan = (int) 1;
} else {
	$wlan = (int) $_GET['id'];
}

// Wifi is hidden?

if ($arr_wlan[$wlan]["hidden"] == true) {
	$hidden = (string) "<true/>";
} else {
	$hidden = (string) "<false/>";
}

echo '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>PayloadContent</key>
	<array>
		<dict>
			<key>EncryptionType</key>
			<string>Any</string>
			<key>HIDDEN_NETWORK</key>
			'.$hidden.'
			<key>Password</key>
			<string>'.$arr_wlan[$wlan]["pass"].'</string>
			<key>PayloadDescription</key>
			<string>'.$description.'</string>
			<key>PayloadDisplayName</key>
			<string>'.$arr_wlan[$wlan]["name"].'</string>
			<key>PayloadIdentifier</key>
			<string>'.$identifier.'</string>
			<key>PayloadOrganization</key>
			<string>'.$organization.'</string>
			<key>PayloadType</key>
			<string>com.apple.wifi.managed</string>
			<key>PayloadUUID</key>
			<string>F68D18C8-23A2-413B-A2AF-65F43E970B4C</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>SSID_STR</key>
			<string>'.$arr_wlan[$wlan]["name"].'</string>
		</dict>
	</array>
	<key>PayloadDescription</key>
	<string>'.$description.'</string>
	<key>PayloadDisplayName</key>
	<string>'.$arr_wlan[$wlan]["name"].'</string>
	<key>PayloadIdentifier</key>
	<string>'.$identifier.'</string>
	<key>PayloadOrganization</key>
	<string>'.$organization.'</string>
	<key>PayloadRemovalDisallowed</key>
	<false/>
	<key>PayloadType</key>
	<string>Configuration</string>
	<key>PayloadUUID</key>
	<string>C5D1927E-C4AA-4FAD-8A1C-D816D3D573F2</string>
	<key>PayloadVersion</key>
	<integer>1</integer>
	<key>SSID_STR</key>
	<string>'.$arr_wlan[$wlan]["name"].'</string>
</dict>
</plist>';
?>
