<?php error_reporting(E_ALL ^ E_NOTICE); 
session_start();

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
  <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css" />
  <script defer src="fontawesome-free-5.3.1-web\js\all.js"></script>
  <link rel="icon" type="image/png" href="favicomatic\favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-16x16.png" sizes="16x16" />
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
          <input class="input" type="text" id="code" name="code" placeholder="Code" required>
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

<style>

/*
    *{ border: 1px solid red; }
*/

    body {
      color: white;
      font-family: "Ariel", sans-serif;
    }

    .bg {
      position:fixed;
      padding:0;
      margin:0;
      top:0;
      left:0;
      width: 100%;
      height: 100%;
      background: url('background.jpg') center;
      background-size: cover;
    }

    .alphawifi_form {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
      flex-direction: column;
      align-items: center;
    }

    #codeError {
      display: none;
      margin-bottom: 10px;
      }

    #country_code {width: 265px;}

    #alphawifi {margin-bottom: 5px;}

    #devices {text-align: center; margin: 0;}

    #gap {margin-top: 5px;}

    .terms {
      font-size: 10px;
    }

    .terms:hover {
      color: white;
    }

    a {
      color: white;
      text-decoration: underline;
    }

    a:hover {
      color: white;
    }

    #support {
      color: blue;
      text-decoration: underline;
    }

    #checkbox_align {margin: auto; width: 76%; margin-left: 45px;}
    #check_1 {margin-top: 10px; margin-bottom: 0;}

    #modal-body {
      color: black;
      font-family: "Ariel", sans-serif;
    }

    @media only screen and (min-width: 768px) {
      html {overflow: hidden;}
      .bg {position: absolute; background: url('background.jpg') fixed; background-size: 100% 100%;}
      .alphawifi_form {margin-top: 50px; display: flex; flex-wrap: wrap; flex-direction: column; align-items: center;}
      #country_code {width: 230px;}
      #checkbox_align {margin: auto; width: 30%; margin-left: 500px;}
      #check_1 {margin-left: 20px; margin-top: 15px;}
      #check_2 {margin-left: 20px;}
    }

  </style>

</body>
</html>

