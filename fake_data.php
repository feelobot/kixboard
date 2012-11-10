<?php
date_default_timezone_set('UTC');

require 'lib/db.php';
require 'lib/user.php';
require 'lib/game.php';

$users_to_generate = 1000000;
$users = array();

for ($i = 1; $i <= $users_to_generate; $i++) {
  $user = new User(rand(1,100));
  $score = rand(100,99999999);
  $text = "User $user->id - Game score: $score";
  
  
  $users[] = $user;

  if ($i % 2 == 0)
    new Game($user->id, $score, strtotime("Last Sunday"));
  else
    new Game($user->id, $score);

  echo "\033[31m$text\033[37m\r\n";
}
/*
foreach ($users as $user) {
  $score = rand(100,99999999);
  $text = "User $user->id - Game score: $score";
  echo "\033[32m$text\033[37m\r\n";
  $users[] = $user;
 
}
 */
echo 'done!\n'
?>