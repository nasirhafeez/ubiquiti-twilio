<?php
session_start();
?>
<!DOCTYPE HTML>

<html>

<head>
  <meta charset="utf-8">
  <title>WiFi AW</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="bulma.min.css" />
  <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css" />
  <script defer src="fontawesome-free-5.3.1-web\js\all.js"></script>
  <meta http-equiv="refresh" content="5;url=login_success.php" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-16x16.png" sizes="16x16" />
</head>

<body>

	<div class="bg">

		<div id="alphawifi" class="content is-size-2">AlphaWifi</div>
		<div id="devices" class="content is-size-6">Great! Your code has been approved!</div>
		<div id="devices" class="content is-size-6">You'll be automatically redirected</div>
    <div id="devices" class="content is-size-6">in a few moments</div>
    
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

