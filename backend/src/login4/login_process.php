<?php

# require db.config.php

# db 연결
# db_conn = new mysqli(db.config 이용)

# login 에서 POST 방식으로 전달된 정보 변수에 저장
# user_id = POST['user_id']
# password = POST['password']

# user_id 와 password 가 공백인지 확이
# if user_id !== '' , password !== ''

# user_id 가 DB 에 있는지 확인
# SELECT * FROM user WHERE id='$user_id'
# True : password 검증 시작
# False : 아이디가 존재하지 않음 -> 에러메시지 출력후 login.php로 이동

# 입력된 password 와 데이터 베이스에 해시 처리된 비밀번호 비교
# True : 로그인 성공 -> welcome.php 로 이동
# False : 비밀번호 잘못 입력 -> 에러메시지 출력후 login.php로 이동

# user_id 와 password 가 모두 일치할 때
# session 생성

# db->close()


?>