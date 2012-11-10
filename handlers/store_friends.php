<?php
class StoreFriends {
  function post() {
  	$face_id = $_POST["user"];
  	$friends = $_POST["friends"];
    $user = new User($face_id,$friends);
    //$game = new Game($user->id, $_GET["score"]);
    echo json_encode( array('user'=>$face_id ,'friends' => $friends) );
  }
}