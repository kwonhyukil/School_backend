<?php
  
require_once 'db.config.php';

session_start();

$db_conn = new mysqli (
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);
$db_conn->set_charset("utf8mb4");

$post = $_GET['post'];

$sql = "DELETE FROM post WHERE id='$post'";
$result = mysqli_query($db_conn, $sql);

if($result) {
  $_SESSION['success'] = "삭제완료";
  header("Location: list.php");
  exit;
} else {
  $_SESSION['error'] = "삭제실패";
  header("Location:view.php?post='$post'");
  exit;
}

?>