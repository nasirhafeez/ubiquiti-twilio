# Ubiquiti Captive Portal with Twilio Verify
Ubiquiti external captive portal with SMS login using Twilio Verify. The following actions are required to use the code given in this repo:
 
Create a file `parameters.php` with the following variables (be sure to set the appropriate permissions so that it's not accessible by unauthorized users):
 ```
#Twitter API parameters

$sid    = "";
$token  = "";
$serviceid = "";

#Unifi parameters

$duration = ;
$site_id = '';

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
$table_name = "";
```
*Install Composer*

Then run `php composer.phar install` to install the packages given in `composer.json`.

*Add Font Awesome*

Put the folders `fontawesome-free-5.3.1-web` in this directory (available [here](https://drive.google.com/file/d/1VewdN5J7ib1y9C1ya7cspws5yawmz3be/view?usp=sharing)).

<script src="https://gist.github.com/nasirhafeez/4e1c2c5536d313db96e2b4ce4b3b269e.js"></script>
