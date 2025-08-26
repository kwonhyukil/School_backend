<?php

require_once 'DB.php';

# DB 연결 확인 connect error 발생시 에러메시지 출력

# edit.php 에서 post 방식으로 전달 받은 데이터 저장
# Id, Title, Writer, content

# Id, Title, Writer, content 검증( 공백 확인, 글자 수 제한 )

# 검증이 완료된 후 Update SQL 문 실행

# SQL의 결과 값
# True -> 업데이트 완료 후 해당 id 게시물 View 로 이동
# False -> 에러 메시지 출력 후 해당 id 게시물 View 로 이동

?>