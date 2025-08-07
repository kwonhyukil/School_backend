<?php

# 데이터 베이스 정보 가져오기 db_config.php (require)
# DB 연결
# db_conn = new mysqli(DB_URL, DB_USER, DB_PASSWORD, DB_NAME)
require_once 'db.config.php';

session_start();

$db_conn = new mysqli(
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);

$db_conn->set_charset("utf8mb4");

if ($db_conn->connect_error) {
  $_SESSION['error'] = "DB 연결 실패";
  header("Location: register.php");
  exit;
}
# POST 방식으로 전달된 ID 값과 PW 값 변수에 저장
# user_id, password
$user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

# ID 와 PW 가 모두 입력되었는지 검증 
# user_id !== '' && password !== ''
if ($user_id === '' || $password === '') {
  $_SESSION['error'] = "아이디 / 비밀번호를 입력 해주세요";
  header("Location: register.php");
  exit;
}  
# ID 가 중복값이 있는지 확인 
# SELECT * FROM user WHERE id='user_id'
# True : Location: register.php : 중복 아이디 출력 -> register.php 로 이동
$sql = "SELECT user_id FROM user WHERE user_id='$user_id'";
$result = $db_conn->query($sql);

if ($result && $result->num_rows > 0) {
  $_SESSION['error'] = "중복된 아이디가 있습니다.";
  header("Location: register.php");
  exit;
# False : 중복값 없음!
# ID의 중복값이 없을 경우 PW를 해시 처리
# password_hash = passwordhash($password, PASSWORD DEFAULT)
# 사용자의 아이디와 해시처리된 PW 를 DB에 저장
# (INSERT INTO user (user_id, pasaword_hash))
} else {
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO user(user_id,password) VALUES ('$user_id', '$password')";
  $result = $db_conn->query($sql);
  $_SESSION['success'] = "회원가입이 완료되었습니다. 로그인 후 이용하세요!";
  $db_conn->close();
  header("Location: login.php");
  exit;
}  





# 저장 성공 : Location: login.php 성공메시지 출력 후 로그인 페이지로 이동
# 저장 실패 : Location: register.php 에러메시지 출력 후 회원가입 페이지로 이동

# DB 종료
# db_conn -> close()

?>