<?php // model.php

function open_database_connection() {
  return new PDO("sqlite:" . __DIR__ . "/flat.db");
}


function close_database_connection(&$connection) {
  $connection = null;
}


function get_all_posts() {
  $connection = open_database_connection();

  $result = $connection->query('SELECT id, title FROM post');

  $posts = [];
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $posts[] = $row;
  }

  close_database_connection($connection);

  return $posts;
}


function get_post_by_id($id) {
  $connection = open_database_connection();

  $sql = 'SELECT * FROM post WHERE id = :id';
  $stmt = $connection->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  close_database_connection($connection);

  return $row;
}