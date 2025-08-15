<?php

# 글 작성은 로그인을 한 사용자만 가능 
# $SESSION['login'] = True 일 경우에 write.php 사용

# $SESSION['login'] = False 일 경우에는 Board_list.php 로 이동

# 글작성 시 작성자 항목에 현재 로그인 되어있는 사용자의 아이디 출력 
# $writer = ($SESSION['user_id'])



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
</body>
</html>