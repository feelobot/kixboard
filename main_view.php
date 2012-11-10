<?php 

?>
<!DOCTYPE html>
<html>
  <head>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
    <script type='text/javascript' src="js/menu.js"></script>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>

  <div id='fb-root'></div>
    <script>
      /*
      // Additional JS functions here
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '126767144061773', // App ID
          channelUrl : 'channel.html', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });

        FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
            // connected
          } else if (response.status === 'not_authorized') {
            // not_authorized
          } else {
            // not_logged_in
          }
         });

      };

      // Load the SDK Asynchronously
      (function(d){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = '//connect.facebook.net/en_US/all.js';
         ref.parentNode.insertBefore(js, ref);
       }(document));

        
      /* Facebook Provided Code --------------------------------------------
      $app_id = "126767144061773";
      $app_secret = "21db65a65e204cca7b5afcbad91fea59";
      $app_token_url = "https://graph.facebook.com/oauth/access_token?"
        . "client_id=" . $app_id
        . "&client_secret=" . $app_secret 
        . "&grant_type=client_credentials";

        $response = file_get_contents($app_token_url);
        $params = null;
      parse_str($response, $params);

      echo("This app's access token is: " . $params['access_token']);
      $graph_url = "https://graph.facebook.com/app?access_token=" 
      . $params['access_token'];

      $app_details = json_decode(file_get_contents($graph_url), true);

      echo("<br />Here is a link to the app " . $app_details['link']);
      /*---------------------------------------------------------------------*/
    </script>
    <center>
      <pre>
 _  _______  ______   ___    _    ____  ____       _    ____ ___ 
| |/ /_ _\ \/ / __ ) / _ \  / \  |  _ \|  _ \     / \  |  _ \_ _|
| ' / | | \  /|  _ \| | | |/ _ \ | |_) | | | |   / _ \ | |_) | | 
| . \ | | /  \| |_) | |_| / ___ \|  _ <| |_| |  / ___ \|  __/| | 
|_|\_\___/_/\_\____/ \___/_/   \_\_| \_\____/  /_/   \_\_|  |___|</pre>

      <div id='content'>
        <h1>API Examples:</h1>
        <nav>
          <li><a href=''>Lookup User</a></li>
          <li><a href=''>Total Players</a></li>
          <li><a href=''>Games Today</a></li>
          <li><a href=''>Total Games Played</a></li>
          <li><a href=''>Top 10 Players</a></li>
          <li><a href=''>Top 10 Improved</a></li>
        </nav>
        <div id='results'>
          <h3></h3>
          <p></p>
        </div>
        <div id="facebook">
          <fb:activity 
          site="http://www.kixeye.com"
          app_id="126767144061773">
          </fb:activity>
      </div>
      </div>
      <footer>
        <img src='http://upload.wikimedia.org/wikipedia/en/a/aa/Kixeye_logo.png' height='20px' /> 
      <footer>
    </center>
  </body>
</html>