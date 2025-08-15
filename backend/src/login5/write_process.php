<?php

# require_once 'DB.php'

# DB 연결 정보 불러오고 연결 상태 확인 -> connect error 발생시 exit;

# write.php 에서 전달한 데이터 ( title, writer, content ) 값 저장
#   1) $title = isset($_POST['title']) 가 존재하는지 확인
#   2) $writer = isset($_POST['writer']) 가 존재하는지 확인
#   3) $content = isset($_POST['content']) 가 존재하는지 확인

# 전달 받은 ( $title, $writer, $content )가 공백인지 검증하고 공백일 경우
#   1) header("Location: write.php") 로 이동 exit;

# 전달 받은 ( $title, $writer, $content )의 글자 수 검증을 위한 함수 생성

# 제목  ( title )    1자 이상 30자 이하   ( 함수 호출하여 반환값으로 True or False ) 
# 작성자( writer )   1자 이상 20자 이하   ( 함수 호출하여 반환값으로 True or False )
# 내용은( content )  1자 이상 1000자 이하 ( 함수 호출하여 반환값으로 True or False )
# false 일 경우 에러 메시지 저장

# 글자 수 검증이 완료 후 DB에 저장 SQL 문 작성
# $sql = "INSERT INTO poster VALUES (title, writer, content, created_at(NOW()))
# $result = mysqli_query($db_conn, $sql)

# $result 의 실행 결과가 True 일 경우 -> Board_list.php로 이동 후 성공 메시지 출력
# $result 의 실행 결과가 False 일 경우 -> write.php 로 이동 후 에러 메시지 출력


?>