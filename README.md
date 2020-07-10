# Ubiquiti Captive Portal with Twilio Verify
Ubiquiti external captive portal with SMS login using Twilio Verify. 

The captive portal web server can be setup using the instructions given [here](https://gist.github.com/nasirhafeez/4e1c2c5536d313db96e2b4ce4b3b269e). The following actions are required to use the code given in this repo:

This code will be placed in `/guest/s/<site ID>` directory on the virtual host's document root. The following procedure can be adopted for setting up this repo starting from document root working directory:

```
# mkdir -p guest/s
# cd guest/s
guest/s# git clone https://github.com/nasirhafeez/ubiquiti-twilio.git
guest/s# mv ubiquiti-twilio/ <site ID>
guest/s# cd <site ID>
```

Create a file `parameters.php` and manually set the two variables given below for this site:
 ```
<?php

include '../secret.php';

#MySQL DB table name for this site

$table_name = "";

#Unifi Site ID for this site

$site_id = "";

?>
```

The file `secret.php` will have some global variables - this example assumes that `secret.php` is located in the upper level directory compared to `parameters.php`. It could be placed anywhere - only it needs to be referenced in `parameters.php` based on its path.

```
<?php

#Twitter API parameters

$sid    = "";
$token  = "";
$serviceid = "";

#Unifi parameters

$duration = ;

$controlleruser     = ''; // the user name for access to the UniFi Controller
$controllerpassword = ''; // the password for access to the UniFi Controller
$controllerurl      = ''; // full url to the UniFi Controller, eg. 'https://22.22.11.11:8443'
$controllerversion  = ''; // the version of the Controller software, eg. '4.6.6' (must be at least 4.0.0)
$debug = false;

#DB parameters

$host_ip = "";
$db_user = "";
$db_pass = "";
$db_name = "";
?>
```

Be sure to set the appropriate permissions on `parameters.php` and `secret.php` so that it's not accessible by unauthorized users.

*Install Composer*

Then run `php composer.phar install` to install the packages given in `composer.json`.
