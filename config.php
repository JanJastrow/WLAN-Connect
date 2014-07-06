<?php

/*
// Configure your own wifi(s) here
*/

// name your company, apartment-name, whatever
$organization = "Schwerkraftlabor.de";
// choose an identifier (not that important)
$identifier = "de.schwerkraftlabor.wlan";

$arr_wlan = array(
					array(
						// the SSID (Name) of your WiFi
						'name' => 'Schwerkraftlabor Alpha',
						// the password
						'pass' => 'Douglas42',
						// the encryption-method
						'sec' => 'WPA2',
						// the 802.11-standards
						'standards' => 'n/a',
						// the frequency (5Ghz / 2.4 GHz)
						'freq' => '5',
						// is the WiFi hidden?
						'hidden' => false,
						// a description for this WiFi
						'description' => '– IN WIFI WE TRUST! –',
					),

					// If you got only 1 WiFi you can delete the following part:
					// or change the configuration to your own needs.

					array(
						// the SSID (Name) of your WiFi
						'name' => 'Schwerkraftlabor Beta',
						// the password
						'pass' => 'Douglas42',
						// the encryption-method
						'sec' => 'WPA2',
						// the 802.11-standards
						'standards' => 'n/g',
						// the frequency (5Ghz / 2.4 GHz)
						'freq' => '2.4',
						// is the WiFi hidden?
						'hidden' => false,
						// a description for this WiFi
						'description' => '– IN WIFI WE TRUST! –',
					),

					// delete to this line (^ above)

				);


// this counts the number of WiFis (nothing to change here)
$wificount = count($arr_wlan);
?>
