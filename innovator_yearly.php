<?php
require_once('lib/recurly.php');
 
// Required for the API
Recurly_Client::$subdomain = 'supportpay';
Recurly_Client::$apiKey = '3d301163be884aa5935baa1b76bc50a7';
Recurly_js::$privateKey = 'a26316e92322494689c59a1d65b72e5b';
$planCode = 'innovator-yearly';
$currency = 'USD';
$signature = Recurly_js::sign(array($planCode));     
?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Innovator Yearly Subscription</title>
<html>
  <head>
  <link rel="stylesheet" href="css/recurly.css" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/recurly.js"></script>
    <script>
    $(function(){
      Recurly.config({
        subdomain: 'supportpay'
        , currency: 'USD' // GBP | CAD | EUR, etc...
      });

      Recurly.buildSubscriptionForm({
        target: '#recurly-subscribe',
        planCode: 'innovator-yearly',
        successURL: 'success.php',
        signature: '<?php echo $signature;?>',
distinguishContactFromBillingInfo: false,
    collectCompany: false,
    collectContact: true,
    termsOfServiceURL: 'http://supportpay.com/contact/terms-of-use/',
    acceptPaypal: false,
    acceptedCards: ['mastercard',
                    'discover',
                    'american_express',
                    'visa'],
      });

    });
    </script>
</head>
  <body>
     
    <div id="recurly-subscribe">
  
    </div>
  </body>
</html>
