<?php
class Game {
  public function __construct($user_id, $score, $time = false) {
    global $dbh;
    if (!$time)
      $time = time();
    
    $sth = $dbh->prepare('INSERT INTO games (user_id, score, created_at) VALUES (:facebook_user_id, :score, :created_at)');
    $sth->execute(array(
      ':facebook_user_id' => $user_id,
      ':score' => $score,
      ':created_at' => $time
    ));
  }
  
  public static function all() {
    global $dbh;
    $sth = $dbh->prepare('SELECT COUNT(*) as total_games FROM games');
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result["total_games"];
  }
  
  public static function today() {
    global $dbh;
    $sth = $dbh->prepare('SELECT COUNT(*) as total_games FROM games WHERE created_at >= :time_ago');
    $sth->execute(array(':time_ago' =>strtotime("24 hours ago")));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result["total_games"];
  }
}