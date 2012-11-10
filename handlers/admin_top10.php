<?php
class AdminTop10 {
  function get() {
    $payload = array(
      "top_ten_players"   => User::top_ten()
    );
    
    echo json_encode($payload);
  }
}