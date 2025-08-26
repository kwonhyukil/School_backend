<?php

require_once 'DB.php';

# DB 연결 확인 connect error 발생시 에러메시지 출력 exit;

# GET 방식으로 게시글 id 값 저장

# SQL 문 작성 -> 해당 게시글의 id 가 DB에 저장되어있는지 확인
# True -> 해당 id에 해당하는 게시글 정보 가져옴
#          - Title, Writer, Content, Created_at, Updated_at( Null 값이 아닐경우 )
# False -> '해당 게시물이 존재하지 않음' 에러 메시지 출력 후 Board_list.php 로 이동

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 상세보기</title>
</head>
<body>
    <h1><?php #게시글 id ?> 상세보기</h1>
<!-- 
    해당 id에 게시글 정보 출력
    제목 : Title
    작성자 : Writer
    작성일자 : Created_at
    수정일자 : updated_at
    내용 : Content
    
    버튼 생성 ( 수정 버튼과 삭제 버튼은 Login 이 되어있고, 작성자과 게시글 작성자가 동일할 경우에만 표시 )
    목록 버튼 클릭 시 Board_list.php 로 이동
    수정 버튼 클릭 시 edit.php?id=' ' 로 이동
    삭제 버튼 클릭 시 delete.php?id=' ' 로 이동
-->

</body>
</html>