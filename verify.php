<?php error_reporting(E_ALL ^ E_NOTICE); 
session_start();

/*
This page sends the API request to Twilio to send SMS to user's provided number, and the user is given is asked to
enter code received on their phone. Some basic error handling is also given using the Javascript function
*/

include 'parameters.php';

$phone = $_POST['country_code'].$_POST['phone_number']; 

$_SESSION['phone'] = trim($phone);

require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$twilio = new Client($sid, $token);

$verification = $twilio->verify->v2->services($serviceid)
                                   ->verifications
                                   ->create($_SESSION['phone'], "sms");

//print($verification->status);

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>WiFi AW</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="bulma.min.css" />
  <script defer src="vendor\fortawesome\font-awesome\js\all.js"></script>
  <link rel="icon" type="image/png" href="favicomatic\favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-16x16.png" sizes="16x16" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="bg">

    <form id="login_success" class="alphawifi_form" method="post" action="result.php" onsubmit="return codeCheck()">
      <div id="alphawifi" class="content is-size-2">AlphaWifi</div>
      <div id="devices" class="content is-size-6">Please enter the 6 digit </div>
      <div id="devices" class="content is-size-6">code received on your provided</div>
      <div id="devices" class="content is-size-6">mobile number</div>

      <div id="gap" class="content is-size-6"></div>

      <div class="field">
        <div class="control has-icons-left">
          <input class="input" type="number" id="code" name="code" placeholder="Code" required>
          <span class="icon is-small is-left">
            <i class="fas fa-comment"></i>
          </span>
        </div>
      </div>

      <p class="help is-warning" id="codeError">Code Invalid: not a 6 digit number</p>
      
      <div id="access_wifi" class="control">
        <button id="button_font" class="button is-danger">Verify</button>
      </div>

    </form>

  </div>

  <script>

    function codeCheck() {
      var codeInput = document.getElementById('code').value;
    
      //The SMS code has to be a 6 digit number. Checking for that:
      
      if (codeInput.length != 6 || isNaN(codeInput)) {
        document.getElementById("codeError").style.display = "block";
        return false;
      }
      else {
        return true;
      }
    }
  </script>
</body>
</html>