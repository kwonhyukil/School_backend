<?php

session_start();

require_once 'db.config.php';

$db_conn = new mysqli (
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);
$db_conn->set_charset("utf8mb4");

$post = isset($_GET['post']) ? (int)$_GET['post'] : 0;

if ($post > 0) {
  $sql = "SELECT * FROM post WHERE id='$post'";
  $result = mysqli_query($db_conn, $sql);

  $data = mysqli_fetch_array($result);
} else {
  $data = ['user_id' => '', 'title' => '', 'content' =>'']; 
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시글 작성</title>
</head>
<body>
<h1>게시글 작성</h1>

<?php  
  if (isset($_SESSION['error'])){
    echo "<p style='color: red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo "<p style='color: green'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['success']);
  }
?>
<!-- 게시글 작성 Form 작성
  1. 제목, 작성자, 내용 입력
    제목 : title
    작성자 : user_id
    내용 : content
  2. 게시글 등록 클릭 시 POST 방식으로 write_process.php 로 전달
    button submit
  3. 취소 클릭시 board 화면으로 이동
  
-->

<form action="write_process.php" method="post">
  <input type="hidden" name="post" value=<?= $post ?>>
  <table width=800 border="1" cellpadding=5 >
    <tr>
      <th> 이름 </th>
      <td> <input type="text" name="user_id" value="<?= $data['user_id']?>"></td>
    </tr>
    <tr>
      <th> 제목 </th>
      <td> <input type="text" name="title" style="width:100%; " value="<?= $data['title']?>"></td>
    </tr>
    <tr>
      <th> 내용</th>
      <td> <textarea name="content" style="width:100%; height:300px; "><?= $data['content']; ?></textarea></td>
    </tr>
    
    <tr>
      <td colspan="2">
          <div style="text-align:center;">
            <input type="submit" value="저장">
          </div>
          <div style= "text-align:center;">
            <button><a href="list.php"> 뒤로가기 </a></button>
          </div>
      </td>
    </tr>
  </table>
</form>
  
</body>
</html>