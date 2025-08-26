<?php
require_once 'DB.php';
# DB 연결 설정 connect error 발생시 exit

# View 에서 수정 버튼 클릭시 전달되는 id 값 저장

# 전달된 id 값이 존재 유무 확인
# True : id 값 존재 -> 제목, 작성자, 작성일자, 수정일자, 내용 SQL문 실행
# select title, writer, content, created_at, updated_at From poster where id=?
# False : id 값이 없을 경우 에러 메시지 출력 ( 해당 게시물이 존재 x )

# Writer 과 Login 되어 있는 사용자의 정보가 같은지 확인
# True -> 수정 페이지로 이동
# False -> 수정 권한이 없습니다 메시지 출력

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title><?php #id?>게시물 수정</title>
</head>
<body>
<!-- 
    form action="edit_process.php" method="post"
    해당 id에 게시글 정보 출력
    제목 : Title
    작성자 : Writer
    내용 : Content

    버튼 생성
    수정완료 버튼 클릭 시 edit_process.php 로 이동
    취소 버튼 클릭 시 view.php?id=' ' 로 이동

-->

</body>
</html>