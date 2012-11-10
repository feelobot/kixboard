<?php
class AdminCount {
  function get() {
    $payload = array(
      "total_players"     => User::count()
    );
    
    echo json_encode($payload);
  }
}