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
        <div id="fb-root">
    </div>
    <script type="text/javascript">
        var faceid;
        var face_friends;

        window.fbAsyncInit = function () {
            FB.init({ appId: '484120638294778', status: true, cookie: true, xfbml: true });

            /* All the events registered */
            FB.Event.subscribe('auth.login', function (response) {
                // Successfully Connected
                testAPI();
                $('#results p').show();
            });
            FB.Event.subscribe('auth.logout', function (response) {
                // Log Out
                $('#results h3').text('Goodbye');
                $('#results li').remove();
                $('#results p').hide('slow');
            });

            FB.getLoginStatus(function (response) {
                if (response.authResponse) {
                    // logged in and connected user, someone you know
                    testAPI();
                }
                else
                  //user is not logged in
                  $('#results h3').text('Please Log In First');
            });

        };
        (function () {
            var e = document.createElement('script');
            e.type = 'text/javascript';
            e.src = document.location.protocol +
            '//connect.facebook.net/en_US/all.js';
            e.async = true;
            document.getElementById('fb-root').appendChild(e);
        } ());

        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(user) {
                $('#results h3').text('Good to see you, ' + user.name + '( ' + user.id +' ) Here are your friends:');
                console.log(user.id);
                faceid = user.id;
            });

            FB.api('/me/friends', function(response) {
                if(response.data) {
                    $('#results p').hide();
                    $.each(response.data,function(index,friend) {
                        $('#results ul').append('<li>' + friend.name + ' has id:' + friend.id + '</li>');
                        //console.log(response);
                    });
                } else {
                    alert("Error!");
                }
                $.ajax({
                  type: "POST",
                  url: "index.php/api/storefriends",
                  data: { user: faceid, friends: response.data }

                }).done(function( msg ) {
                  console.log( "Data Saved: ");
                });
                });
            }
    </script>
        <img src='http://upload.wikimedia.org/wikipedia/en/a/aa/Kixeye_logo.png' height='20px' /> 
        <div class="fb-like" data-href="http://local.kixboard.com" data-send="true" data-width="200" data-show-faces="false"></div>
        <hr />
    </div>
    </header>
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