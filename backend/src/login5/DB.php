<?php

class db_info {
  const DB_URL = 'db';
  const DB_USER = 'root';
  const DB_PASSWORD = 'root';
  const DB_NAME = 'gsc';
}

$db_conn = new mysqli (
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);
$db_conn->set_charset("utf8mb4");

?>