<?php
// Include required library files.
require_once('../includes/config.php');
require_once('../autoload.php');


// Create PayPal object.
$PayPalConfig = array(
					  'Sandbox' => $sandbox,
					  'DeveloperAccountEmail' => $developer_account_email,
					  'ApplicationID' => $application_id,
					  'DeviceID' => $device_id,
					  'IPAddress' => $_SERVER['REMOTE_ADDR'],
					  'APIUsername' => $api_username,
					  'APIPassword' => $api_password,
					  'APISignature' => $api_signature,
					  'APISubject' => $api_subject,
                      'PrintHeaders' => $print_headers, 
					  'LogResults' => $log_results, 
					  'LogPath' => $log_path,
					);

$PayPal = new angelleye\PayPal\Adaptive($PayPalConfig);

// Prepare request arrays
$GetAccessTokenFields = array(
							'Token' => '', 					// Required.  The request token from the response to RequestPermissions
							'Verifier' => '' 				// Required.  The verification code returned in the redirect from PayPal to the return URL.
							);

$PayPalRequestData = array('GetAccessTokenFields' => $GetAccessTokenFields);

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->GetAccessToken($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
echo '<pre />';
print_r($PayPalResult);
?>
