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
    <center>
    <header>
      <pre>
 _  _______  ______   ___    _    ____  ____       _    ____ ___ 
| |/ /_ _\ \/ / __ ) / _ \  / \  |  _ \|  _ \     / \  |  _ \_ _|
| ' / | | \  /|  _ \| | | |/ _ \ | |_) | | | |   / _ \ | |_) | | 
| . \ | | /  \| |_) | |_| / ___ \|  _ <| |_| |  / ___ \|  __/| | 
|_|\_\___/_/\_\____/ \___/_/   \_\_| \_\____/  /_/   \_\_|  |___|</pre>

    <div>
        <div id="fb-root"></div>
        <fb:login-button show-faces="false" perms="user_hometown,user_about_me,email" autologoutlink="true" width="100" max-rows="1">
        </fb:login-button>
        <div id="fb-root"></div>
        <script type="text/javascript" src ="js/facebook.js"></script>
        <img src='http://upload.wikimedia.org/wikipedia/en/a/aa/Kixeye_logo.png' height='20px' /> 
        <div class="fb-like" data-href="http://local.kixboard.com" data-send="true" data-width="200" data-show-faces="false"></div>
        <hr />
    </div>
    </header>
      <div id='content'>
        <h1>API Examples:</h1>
        <nav>
          <li><a href=''>Profile</a></li>
          <li><a href=''>Total Players</a></li>
          <li><a href=''>Games Today</a></li>
          <li><a href=''>Total Games Played</a></li>
          <li><a href=''>Top 10 Players</a></li>
          <li><a href=''>Top 10 Improved</a></li>
        </nav>
        <div id='results'>
          <h3></h3>
          <p>
          </p>
          <ul>
            <li></li>
          </ul>
        </div>
        <footer>
          <div id="box1">
            <div class="fb-comments" data-href="http://local.kixboard.com" data-num-posts="2" data-width="600"></div>
          </div>
          <div id="box2">
            <div class="fb-activity" data-site="local.kixboard.com" data-app-id="484120638294778" data-width="250" data-height="160" data-header="true" data-colorscheme="light" data-recommendations="false"></div> 
          </div>
          <div id="box3">
          </div>
          
        <footer>
    </center>
  </body>
</html>