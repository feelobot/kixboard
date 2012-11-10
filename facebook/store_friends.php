<?php
class StoreFriends {
  function post($object) {
  	$facebook_id = $object.user;
  	$friends = $object.friends;
    $user = new User($facebook_id);
    $game = new Game($user->id, $_GET["score"]);
    echo json_encode($game);
  }
}