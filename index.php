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
  require 'handlers/store_friends.php';
  
  //$pretend_signed_request = "cjv1NZlSRCthYq9rAyWEidD7QE98p0PKZvVwpQ7gPwg.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImV4cGlyZXMiOjEzMjI4NTYwMDAsImlzc3VlZF9hdCI6MTMyMjg1MDc1NCwib2F1dGhfdG9rZW4iOiJBQUFCelMwYVhTMDBCQUlob0I1bmhrYnZJU0xLSGpNb3ZIN2ZTTmMzWkFxbnVNT2NvYmpJUHoxNGFmWXV1dzBkbkZzeVpBV2JHU2MycXZBakdjRzZUQ1RWZzBLOUVGUWJ5WkJwNTU0ZXE5M2FTWkFXZXpVeEYiLCJ1c2VyIjp7ImNvdW50cnkiOiJ1cyIsImxvY2FsZSI6ImVuX1VTIiwiYWdlIjp7Im1pbiI6MjF9fSwidXNlcl9pZCI6IjEwMDAwMzI5MTY2MTkwOSJ9";
  //$parsed_request = parse_signed_request($pretend_signed_request, "21db65a65e204cca7b5afcbad91fea59");


  class MainHandler {

    function get() {
      require_once 'main_view.php';
      // $parsed_request = parse_signed_request($signed_request, ffd93ff362fe4deb72d3e7f514f969e5);
      //echo($parse_signed_request);
      //$current_user = new User($parsed_request["user_id"]);  
    }
  } 

  Toro::serve(array(
    "/"                         => "MainHandler",
    "/api/storefriends"         => "StoreFriends",
    "/api/user/:number"         => "UserHandler",
    "/api/admin/count"          => "AdminCount",
    "/api/admin/today"          => "AdminToday",
    "/api/admin/all"            => "AdminAll",
    "/api/admin/top10"          => "AdminTop10",
    "/api/admin/top10Improved"  => "AdminTop10Improved"
  ));
?>  
