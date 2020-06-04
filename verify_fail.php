<?php
session_start();

$redirect_url = "index.php?id=".$_SESSION["id"]."&ap=".$_SESSION["ap"];

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
  <meta http-equiv="refresh" content="5;url=<?php echo htmlspecialchars($redirect_url);?>" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-16x16.png" sizes="16x16" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="bg">

		<div id="alphawifi2" class="content is-size-2">AlphaWifi</div>
		<div id="devices" class="content is-size-6">Sorry! The code you entered</div>
		<div id="devices" class="content is-size-6">is not correct. You'll shortly be</div>
		<div id="devices" class="content is-size-6">redirected back to our main page</div>

	</div>
</body>
</html>