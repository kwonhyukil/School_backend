<?php
session_start();

if ( !isset($_SESSION['login']) ){
  $_SESSION['error'] = "작성 권한이 없습니다. 로그인 후 이용할 수 있습니다.";
  header("Location: Board_list.php");
  exit;
}
# 글 작성은 로그인을 한 사용자만 가능 
# $_SESSION['login'] = True 일 경우에 write.php 사용

# $_SESSION['login'] = False 일 경우에는 Board_list.php 로 이동

# 글작성 시 작성자 항목에 현재 로그인 되어있는 사용자의 아이디 출력 
# $writer = ($_COOKIE['user_id'])

if ( isset($_SESSION['title']) && isset($_SESSION['content'])) {
  $title = $_SESSION['title'];
  $content = $_SESSION['content'];
} else {
  $title = '';
  $content = '';
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
<!-- 
Form action = "write_process.php" method = "post" 방식으로 전달
1. 게시글 제목 입력창 생성 title
2. 게시글 작성자 입력창 생성 writer
3. 게시글 내용 입력창 생성 content
4. 작성하기 버튼 생성 클릭시 POST 방식으로 write_process.php 로 전달
5. 취소 버튼 생성 -> Board_list.php 로 이동

-->
<?php

if ( isset($_SESSION['error'])) {
  echo htmlspecialchars($_SESSION['error']);
  unset($_SESSION['error']);
} 

?>

<form action="write_process.php" method="post">
  <table border="1" cellpadding="10">
    <tr>
      <td>제목</td>
      <td><input type="text" id="title" name="title"></td>
    </tr>
    <tr>
      <td>작성자</td>
      <td><input type="text" id="writer" name="writer" value="<?= $_COOKIE['user_id'] ?>"></td>
    </tr>
    <tr>
      <td>내용</td>
      <td><textarea name="content" id="content" cols="50" rows="15"></textarea></td>
    </tr>
  </table>
  <br>
  <button type="submit">작성하기</button>
</form>                                                                                                                                                                                                                                                                                                                                                                                                                                                           
<button><a href="Board_list.php">뒤로가기</a></button>
</body>
</html>