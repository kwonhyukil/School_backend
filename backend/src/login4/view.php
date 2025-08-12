<?php
require_once 'db.config.php';

session_start();
# 1. DB 정보 불러오기 
# require 'db.config.php'
# 2. DB 연결 확인
# $db_conn = new mysqli (db_info::DB_URL, db_info::DB_USER, db_info::DB_PASSWORD, db_info::DB_NAME)
$db_conn = new mysqli (
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);

$db_conn->set_charset("utf8mb4");


# 3. 가져온 post의 번호를 사용하여 DB의 정보 가져오기
# $sql = "SELECT * FROM post WHERE='$post'"
# $result = mysqli_query($db_conn, $sql)
# $data = msyqli_fetch_array($result)
$post = $_GET['post'];

$sql = "SELECT * FROM post WHERE id='$post'";
$result = mysqli_query($db_conn, $sql);
$data = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>글 상세보기</title>
</head>
<body>

<!-- Table 작성 
  1. 해당 post에 대한 정보 가져오기 ( 제목, 작성자, 내용 )
  2. title, user_id, content 정보 출력
    1) $data['title']
    2) $data['user_id']
    3) $data['content']
  3. 목록으로 클릭시 list.php 로 이동
  4. 수정 클릭시 edit.php로 이동
  5. 삭제 클릭시 delete.php 로 이동
-->
  <h1>글 상세보기</h1>
<form action="write_process.php" method="post">
  <table width=800 border="1" cellpadding=5>
    <tr>
      <th style="width: 20%;"> 제목 </th>
      <td> <?= $data['title'];?></td>
    </tr>
    <tr>
      <th> 작성자 </th>
      <td> <?= $data['user_id'];?></td>
    </tr>
    <tr>
      <th> 내용 </th>
      <td> <?= $data['content'];?></td>
    </tr>
    <tr>
      <td colspan=2>
        <a href="list.php">목록으로</a>
        <div style="float:right;">
          <a href="write.php?post=<?=$data['id']?>">수정</a>
          <a href="delete.php?post=<?=$data['id']?>">삭제</a>
        </div>
      </td>
    </tr>
    </tr>
  </table>
</form>
</body>
</html>