<?php

require 'lib/db.php';
require 'lib/toro.php';
require 'lib/parse_signed_request.php';

require 'lib/user.php';
require 'lib/game.php';

require 'handlers/user_handler.php';
require 'handlers/admin_count.php';
require 'handlers/admin_today.php';
require 'handlers/admin_all.php';
require 'handlers/admin_top10.php';
require 'handlers/admin_top10Improved.php';

$pretend_signed_request = "cjv1NZlSRCthYq9rAyWEidD7QE98p0PKZvVwpQ7gPwg.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImV4cGlyZXMiOjEzMjI4NTYwMDAsImlzc3VlZF9hdCI6MTMyMjg1MDc1NCwib2F1dGhfdG9rZW4iOiJBQUFCelMwYVhTMDBCQUlob0I1bmhrYnZJU0xLSGpNb3ZIN2ZTTmMzWkFxbnVNT2NvYmpJUHoxNGFmWXV1dzBkbkZzeVpBV2JHU2MycXZBakdjRzZUQ1RWZzBLOUVGUWJ5WkJwNTU0ZXE5M2FTWkFXZXpVeEYiLCJ1c2VyIjp7ImNvdW50cnkiOiJ1cyIsImxvY2FsZSI6ImVuX1VTIiwiYWdlIjp7Im1pbiI6MjF9fSwidXNlcl9pZCI6IjEwMDAwMzI5MTY2MTkwOSJ9";
$parsed_request = parse_signed_request($pretend_signed_request, "21db65a65e204cca7b5afcbad91fea59");
   

            
            class MainHandler {

              function get() {

                $current_user = new User($parsed_request["user_id"]);
                echo("
                  <! DOCTYPE html>
                  <html xmlns='http://www.w3.org/1999/xhtml' xmlns:fb='http://www.facebook.com/2008/fbml'>
                    <head>
                      <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
                      <script type='text/javascript'>
                        $(document).ready(
                          function(){
                            $('nav li:eq(0)').click(
                              function(event){
                                event.preventDefault();
                                $('#results h3').text('index.php/api/user/:number');
                                $('#results p').load('index.php/api/user/1');
                            });
                            
                            $('nav li:eq(1)').click(
                              function(event){
                                event.preventDefault();
                                $('#results h3').text('index.php/api/admin/count');
                                $('#results p').load('index.php/api/admin/count');
                              
                            });
                            $('nav li:eq(2)').click(
                              function(event){
                                event.preventDefault();
                                $('#results h3').text('index.php/api/admin/today');
                                $('#results p').load('index.php/api/admin/today');
                              
                            });
                            $('nav li:eq(3)').click(
                              function(event){
                                event.preventDefault();
                                $('#results h3').text('index.php/api/admin/all');
                                $('#results p').load('index.php/api/admin/all');
                              
                            });
                            $('nav li:eq(4)').click(
                              function(event){
                                event.preventDefault();
                                $('#results h3').text('index.php/api/admin/top10');
                                $('#results p').load('index.php/api/admin/top10');
                              
                            });
                            $('nav li:eq(5)').click(
                              function(event){
                                event.preventDefault();
                                $('#results h3').text('index.php/api/admin/top10Improved');
                                $('#results p').load('index.php/api/admin/top10Improved');
                              
                            });
                          });
                      </script>

                      <meta charset='UTF-8'>
                      <link rel='stylesheet' href='style.css'>
                    </head>
                    <body>
                      <center>
                        <pre>
 _  _______  ______   ___    _    ____  ____       _    ____ ___ 
| |/ /_ _\ \/ / __ ) / _ \  / \  |  _ \|  _ \     / \  |  _ \_ _|
| ' / | | \  /|  _ \| | | |/ _ \ | |_) | | | |   / _ \ | |_) | | 
| . \ | | /  \| |_) | |_| / ___ \|  _ <| |_| |  / ___ \|  __/| | 
|_|\_\___/_/\_\____/ \___/_/   \_\_| \_\____/  /_/   \_\_|  |___|</pre>
                    
                            <div id='login'>
                              <p></p>
                            </div>
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
                        </div>
                        <footer>
                          <img src='http://upload.wikimedia.org/wikipedia/en/a/aa/Kixeye_logo.png' height='20px' /> 
                        <footer>
                      </center>
                    </body>
                  </html>
                ");  
              }
            } 
            
            Toro::serve(array(
              "/"                         => "MainHandler",
              "/api/user/:number"         => "UserHandler",
              "/api/admin/count"          => "AdminCount",
              "/api/admin/today"          => "AdminToday",
              "/api/admin/all"            => "AdminAll",
              "/api/admin/top10"          => "AdminTop10",
              "/api/admin/top10Improved"  => "AdminTop10Improved"
            ));
          ?>  
