<?php
session_start();

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

    <form id="login_success" class="alphawifi_form" method="post" action="connecting.php">
      <div id="alphawifi" class="content is-size-2">AlphaWifi</div>
      <div id="devices" class="content is-size-6">Some devices may need to be</div>
      <div id="devices" class="content is-size-6">enrolled manually. Contact support</div>
      <div id="devices" class="content is-size-6">at 303.209.2128 for assistance.</div>

      <div id="gap" class="content is-size-6"></div>

      <div class="field">
        <div class="control has-icons-left">
          <input class="input" type="text" id="form_font" name="fname" placeholder="First Name" required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <div class="control has-icons-left">
          <input class="input" type="text" id="form_font" name="lname" placeholder="Last Name" required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <div class="control has-icons-left">
          <input class="input" type="text" id="form_font" name="aptunit" placeholder="Apt / Unit" required>
          <span class="icon is-small is-left">
            <i class="fas fa-building"></i>
          </span>
        </div>
      </div>

      <div id="access_wifi" class="control">
        <button id="button_font" onclick="smsLogin();" class="button is-danger">Click to Accept and Continue</button>
      </div>

  <div id="checkbox_align">
      <div id="check_1" class="field">
        <div class="control">
          <label class="checkbox">
            <div class="terms">
              <input type="checkbox" required>
               I agree to the <a id="modal-link" href="#modal-link">Terms and Conditions</a> and confirm I am over the age of 13.
            </div>
          </label>
        </div>
      </div>

      <div id="page-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Terms and Conditions</p>
            <button class="delete closeit" aria-label="close"></button>
          </header>
            <section id="modal-body" class="modal-card-body">
            <div class="content">
            AlphaWiF LLC, Terms and Conditions of Use

            We offer public wired and wireless WiFi internet access to Residents and Guests. This Service allows you access to the internet. By connecting you must first agree to the following terms of use (Terms of Use):
            <ol type="1">
            <li>When and as available, we will allow you non-exclusive WiFi connectivity on the premises. However, while we do provide you an internet connection; the bandwidth provided shall be at our discretion and your usage may be terminated at anytime without notice.</li>

            <li>While we may agree to troubleshoot any connectivity problems on our network, We may or may not provide technical assistance for any devices not owned by us. Any assistance you might receive from us is strictly on an as is basis, without any warranties or representations, and in some cases you may be charged. Should this occur will let you know our fees before any work is done.</li>

            <li>The service may be used for lawful purposes only, and our service and equipment complies with all Local, State and Federal laws.</li>

            <li>When using the internet you are giving consent to the use of cookies. Upon logging into the network you may provide some personal information, such as email address, name and apartment number. By providing this information you consent to allowing us to periodically send to you information regarding AlphaWiFi LLC, products and services.</li>

            <li>Using Our Service, You may download and upload content to and from your device(s). We incorporate wireless encryption technology and are HIPAA compliant. We further utilize a Firewall to prevent illegal access to our service and threat protection is always of importance. However, be advised that content sent to and from any wireless device could be captured on any platform and use of our service is no different. We are not responsible for your content whether it is personal and/or corporate in nature, and You assume sole responsibility for any theft, loss or corruption of your device or content.</li>

            <li>We are not responsible for any loss of or damage to, Your software and/or hardware, changes in configuration settings, security or data files while using Our WiFi Services. We are not responsible for any virus, Trojans, worms, malware or any other malicious software infecting Your wireless access device while connected to our WiFi network. We are not responsible for any power anomalies or other events that may cause damage to Your wireless access devices while using our Services.</li>

            <li>Your access to other devices not owned by you or without the owners express permission is strictly prohibited.</li>
            </ol>
            </div>
            <div class="title is-5">Privacy Policy & Your Info.</div>
            <div class="content">Submitted Registration Information: Email Address, First/Last Name, Unit number is private information and only used by AlphaWiFi LLC.</div>

            <div class="content">Other Information Collected: This is provided by the device you log in from as well as the gateway (Access Point and Firewall). This information is your devices MAC and IP address, the date/time of registration and the location of the gateway.</div>

            <div class="content">How Registration Information Is Used: The information collected is only used in support of the network and providing you with information pertaining to the status of the network. We may from time to time provide you with information regarding new services that are available to you.</div>
            <div class="title is-5">Technical Support</div>
            <div class="content">Devices without browser capabilities will require that you contact technical support to have the device added to the network manually. Please locate the device MAC address and email this information along with your Name, Email Address, Mailing Address and Unit Number to: <a id="support" href = "mailto: support@alphawifi.com">Support@Alphawifi.com</a> - You may also call us at 303.209.2128 - Thank You</div>

            </section>
              <footer class="modal-card-foot">
                <button class="button closeit">Close</button>
              </footer>
            </div>
          </div>

          <div id="check_2" class="field">
            <div class="control">
              <label class="checkbox">
                <div class="terms">
                  <input type="checkbox" name="c2" value="Y">
                  Yes, I would like to receive news and offers via email.
                </div>
              </label>
            </div>
          </div>
      </div>

        </form>

      </div>

      <script>

      var link = document.getElementById('modal-link');
      var modal = document.getElementById('page-modal');
      var close_cross = document.getElementsByClassName('closeit')[0];
      var close_button = document.getElementsByClassName('closeit')[1];

      link.onclick = function() {
        modal.style.display = 'block';
      }

      close_cross.onclick = function() {
        modal.style.display = 'none';
      }

      close_button.onclick = function() {
        modal.style.display = 'none';
      }

      window.onclick = function(event) {
        if (event.target.className == 'modal-background') {
          modal.style.display = 'none';
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

