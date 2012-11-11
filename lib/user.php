<?php
class User {
  public $id = null;
  public $facebook_user_id = null;
  public $created_at = null;
  public $exists = false;
  public $friends = null;

  public function __construct($facebook_user_id, $friends=null, $create = true) {
    $this->facebook_user_id = $facebook_user_id;
    $search_result = $this->find_by_facebook_id($this->facebook_user_id);
    $this->friends = $friends;

    
    # Find or create this user in the db
    if ($search_result) {
      $this->exists = true;
      $this->map_data($search_result);
    /*} elseif ($this->friends == array('')){
      $this-> updateUser();*/
    } else if ($create) {
      $this->exists = true;
      $this->create();
    }

  }
  
  public static function top_ten() {
    global $dbh;
    $sth = $dbh->prepare('SELECT users.id, users.facebook_user_id, games.score FROM users, games 
        WHERE users.id = games.user_id ORDER BY games.score DESC LIMIT 10');
    $sth->execute();
    $result = $sth->fetchall(PDO::FETCH_ASSOC);
    return $result;
  }
  
  public static function top_ten_by_delta() {
    global $dbh;
    $sth = $dbh->prepare('SELECT games_this_week.user_id, (games_this_week.score - games_last_week.score) AS delta
      FROM 
        games games_this_week
      INNER JOIN games games_last_week ON
          games_this_week.user_id = games_last_week.user_id
      WHERE 
        games_this_week.score > games_last_week.score AND
        games_last_week.created_at <= :one_week_ago AND
        games_last_week.created_at >= :two_weeks_ago AND
        games_this_week.created_at >= :one_week_ago
      ORDER BY delta DESC
      LIMIT 10');
    
    $sth->execute(array(':one_week_ago' => strtotime("Last Sunday"), ':two_weeks_ago' => strtotime('Sunday 2 weeks ago')));
    $result = $sth->fetchall(PDO::FETCH_ASSOC);
    return $result;
  }
  
  public static function count() {
    global $dbh;
    $sth = $dbh->query('SELECT COUNT(id) as total_users FROM users');
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result["total_users"];
  }
  
  public function find_by_facebook_id($fb_id) {
    global $dbh;
    $sth = $dbh->prepare('SELECT * FROM users WHERE facebook_user_id = :facebook_user_id LIMIT 1');
    $sth->bindParam(':facebook_user_id', $fb_id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
  }
  
  private function create() {
    global $dbh;
    $this->created_at = time();
    $sth = $dbh->prepare('INSERT INTO users (facebook_user_id, created_at, friends) VALUES (:facebook_user_id, :created_at, :friends)');
    $sth->bindParam(':facebook_user_id', $this->facebook_user_id, PDO::PARAM_INT);
    $sth->bindParam(':created_at', $this->created_at, PDO::PARAM_INT);
    $sth->bindParam(':friends', json_encode($this->friends), PDO::PARAM_INT);
    $sth->execute();
    $this->id = $dbh->lastInsertId('id');
  }
  
  
  private function map_data($result_data) {
    $this->id = $result_data["id"];
    $this->created_at = $result_data["created_at"];
    $this->friends = $result_data["friends"];
  }

  private function updateUser(){
    global $dbh;
    $this->created_at = time();
    $sth = $dbh->prepare('UPDATE users SET friends = :friends WHERE facebook_user_id = :facebook_user_id');
    $sth->bindParam(':facebook_user_id', $this->facebook_user_id, PDO::PARAM_INT);
    $sth->bindParam(':friends', $this->freinds, PDO::PARAM_INT);
    $sth->execute();
  }
}