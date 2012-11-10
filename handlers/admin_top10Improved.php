<?php
class AdminTop10Improved {
  function get() {
    $payload = array(
      "top_ten_improved"  => User::top_ten_by_delta()
    );
    
    echo json_encode($payload);
  }
}