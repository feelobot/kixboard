<?php
class AdminAll {
  function get() {
    $payload = array(
      "total_games_ever"  => Game::all()
    );
    echo json_encode($payload);
  }
}