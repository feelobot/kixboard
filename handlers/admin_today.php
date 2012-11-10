<?php
class AdminToday {
  function get() {
    $payload = array(
      "total_games_today" => Game::today()
    );
    
    echo json_encode($payload);
  }
}