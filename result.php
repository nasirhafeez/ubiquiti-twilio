<?php error_reporting(E_ALL ^ E_NOTICE); 
session_start();

include 'parameters.php';

$_SESSION['code'] = trim($_POST['code']);

require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$twilio = new Client($sid, $token);

$verification_check = $twilio->verify->v2->services($serviceid)
                                         ->verificationChecks
                                         ->create($_SESSION['code'], // code
                                                  ["to" => $_SESSION['phone']]
                                         );

//print($verification_check->status);

if ($verification_check->status == "approved") {
    header("Location: verify_pass.php");
}
else {
    header("Location: verify_fail.php");
}

?>

