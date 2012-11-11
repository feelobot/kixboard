<?php
class UserHandler {
  function get($facebook_id) {
    $user = new User($facebook_id,null ,false);
    if ($user->exists)
      echo json_encode($user);
    else
      echo json_encode(array('id' => $facebook_id, 'error' => 'No user with that id'));
  }
  
  function post() {
    $user = new User($facebook_id);
    $game = new Game($user->id, $_GET["score"]);
    echo json_encode($game);
  }
}
