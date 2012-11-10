<?php
class AdminHandler {
  function get() {
    $payload = array(
      "total_players"     => User::count(),
      "total_games_today" => Game::today(),
      "total_games_ever"  => Game::all(),
      "top_ten_players"   => User::top_ten(),
      "top_ten_improved"  => User::top_ten_by_delta()
    );
    
    echo json_encode($payload);
  }
}