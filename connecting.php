<?php error_reporting(E_ALL ^ E_NOTICE);
session_start();

include 'parameters.php';

$mac=$_SESSION["id"];
$ap=$_SESSION["ap"];
$last_updated = date("Y-m-d H:i:s");

if($_SESSION["user_type"]=="new" || $_SESSION["user_type"]=="repeat_old"){
  $phone=$_SESSION["phone"];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $aptunit = $_POST['aptunit'];
  $offers = $_POST['c2'];  
  
  if ($offers != "Y") {
          $offers = "N";
  }
}

require __DIR__ . '/vendor/autoload.php';

$unifi_connection = new UniFi_API\Client($controlleruser, $controllerpassword, $controllerurl, $site_id, $controllerversion);
$set_debug_mode   = $unifi_connection->set_debug($debug);
$loginresults     = $unifi_connection->login();

$auth_result = $unifi_connection->authorize_guest($mac, $duration);

if($_SESSION["user_type"]!="repeat_recent"){

  $con=mysqli_connect($host_ip,$db_user,$db_pass,$db_name);

  if (mysqli_connect_errno()) {
          echo "Failed to connect to SQL: " . mysqli_connect_error();
  }

  if($_SESSION["user_type"]=="new"){

    mysqli_query($con, "
    CREATE TABLE IF NOT EXISTS $table_name (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `phone` varchar(45) NOT NULL,
      `firstname` varchar(45) NOT NULL,
      `lastname` varchar(45) NOT NULL,
      `apartment` varchar(45) NOT NULL,
      `offers` varchar(45) NOT NULL,
      `mac` varchar(45) NOT NULL,
      `ap` varchar(45) NOT NULL,
      `last_updated` varchar(45) NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `id_UNIQUE` (`id`)
    )");

    mysqli_query($con,"INSERT INTO $table_name (phone, firstname, lastname, apartment, offers, mac, ap, last_updated) VALUES ('$phone', '$fname', '$lname', '$aptunit', '$offers', '$mac', '$ap', '$last_updated')");

  }
  else {
    $db_id = $_SESSION["db_id"];
    mysqli_query($con,"UPDATE $table_name SET phone='$phone', firstname='$fname', lastname='$lname', apartment='$aptunit', offers='$offers', ap='$ap', last_updated='$last_updated' WHERE id='$db_id'");
  }

  mysqli_close($con);
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>WiFi AW</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="refresh" content="5;url=thankyou.htm" />
  <link rel="stylesheet" href="bulma.min.css" />
  <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css" />
  <script defer src="fontawesome-free-5.3.1-web\js\all.js"></script>
  <link rel="icon" type="image/png" href="favicomatic\favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-16x16.png" sizes="16x16" />  
</head>

<body>

	<div class="bg">

		<div id="alphawifi" class="content is-size-2">AlphaWifi</div>
		<div id="devices" class="content is-size-6">Please wait, you are being </div>
		<div id="devices" class="content is-size-6">authorized on AlphaWiFi</div>

	</div>

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

		#alphawifi {text-align: center; margin-top: 40px; margin-bottom: 5px;}

    #devices {text-align: center; margin: 0;}

    @media only screen and (min-width: 768px) {
      html {overflow: hidden;}
      .bg {position: absolute; background: url('background.jpg') fixed; background-size: 100% 100%;}
			#alphawifi {text-align: center; margin-top: 80px; margin-bottom: 5px;}
			#devices {text-align: center; margin: 0;}
    }

  </style>

</body>
</html>
