# Ubiquiti Captive Portal with Twilio Verify
Ubiquiti external captive portal with SMS login using Twilio Verify. 

The captive portal web server can be setup using the instructions given [here](https://gist.github.com/nasirhafeez/4e1c2c5536d313db96e2b4ce4b3b269e). The following actions are required to use the code given in this repo:
 
Create a file `parameters.php` with the following variables (be sure to set the appropriate permissions so that it's not accessible by unauthorized users):
 ```
<?php

#MySQL DB table name for this site

$table_name = "";

#Unifi Site ID for this site

$site_id = "";

?>
```

Copy the `.env.example` file to the upper level folder and change its name to `.env`. Set the values of the given project-wide environment variables in it.

*Install Composer*

Then run `php composer.phar install` to install the packages given in `composer.json`.
