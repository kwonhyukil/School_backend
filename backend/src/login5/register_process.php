<?php
# 데이터 베이스 정보 가져오기
#   1) require_once 'DB.php'

# 1. DB 연결정보 불러오고 연결 상태 확인 -> connect error 발생시 exit

# 2. register.php 에서 POST 방식으로 전달된 정보 저장
#    1) $user_id = isset($_POST['user_id'])
#    2) $name = isset($_POST['name'])
#    3) $password =isset($_POST['password'])
#    SQL 인젝션 방지
#    $user_id = mysqli_real_escape_string($db_conn, $user_id)
#    $name = mysqli_real_escape_string($db_conn, $name)
#    $password = mysqli_real_escape_string($db_conn, $password)


# 3. 전달된 데이터 ( $user_id, $name, $password ) 공백인지 확인하고 공백일 경우
#    1) header("Location: register.php") 로 이동 exit;

# 4. $user_id 중복된 값이 있는지 확인
#    $sql = "SELECT * FROM user user_id='$user_id'"
#    $result = mysqli_query($db_conn, $sql) -> True 중복( 존재 )
#    1) 중복된 값이 있을 경우( True ) 에러 메시지 저장 header("Location: register.php");

# 5. $user_id 값이 중복이 아닐 경우
#    $!result && $row = mysqli_fetch_row() == 0
#    1) 비밀번호를 hash 처리하고 DB 에 저장 sql 실행
#    $password_hash = password_hash($password, PASSWORD DEFAULT)
#    $sql = INSERT INTO user VALUES ($user_id, $name, $password_hash, created_at)
#    $result = mysqli_query($db_conn, $sql)

# 6. $result ( query문 실행 값이 True or False )
#    True = header("Location: login.php") 이동 후 회원가입 성공 메시지 출력 exit
#    False = header("Location: register.php") 이동 후 에러메시지 출력 exit
?>