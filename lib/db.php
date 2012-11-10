<?php

try {
  $dbh = new PDO('mysql:dbname=leaderboard;host=127.0.0.1', 'root', 'k1zkaz');
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

