<?php

require_once "db.config.php";
# require db.config.php


session_start();
# db 연결
# db_conn = new mysqli(db.config 이용)
$db_conn = new mysqli(
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);
$db_conn->set_charset("utf8mb4");

if ($db_conn->connect_error) {
  $_SESSION['error'] = "DB 연결 실패";
  exit;
}
if ( isset($_COOKIE['id']) && isset($_COOKIE['password'])) {
  $user_id = $_COOKIE['id'];
  $password = $_COOKIE['password'];

  $sql = "SELECT user_id,password FROM user WHERE user_id='$user_id'";
  $result = $db_conn->query($sql);

  if($result && $row = $result->fetch_assoc()){
    if ($user_id === $row['user_id']) {
      
      if (hash_equals($row['password'], $password)) {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $row['user_id'];
        session_regenerate_id(true);
        header("Location: welcome.php");
        exit;
      } else {
        $_SESSION['error'] = "비밀번호가 일치하지 않습니다.";
        header("Location: login.php");
        exit;
      }
    }
  }
}
if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}
# login 에서 POST 방식으로 전달된 정보 변수에 저장
# user_id = POST['user_id']
# password = POST['password']
$user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

# user_id 와 password 가 공백인지 확이
# if user_id !== '' , password !== ''
if ($user_id === '' || $password === '') {
  $_SESSION['error'] = "아이디와 비밀번호를 모두 입력하세요";
  header("Location: login.php");
  exit;
}

$sql = "SELECT * FROM user WHERE user_id='$user_id'";
$result = $db_conn->query($sql);

$db_conn->close();

if(!$result) {
  $_SESSION['error'] = "아이디가 존재하지 않습니다.";
  header("Location: login.php");
  exit;
}

# user_id 가 DB 에 있는지 확인
# SELECT * FROM user WHERE id='$user_id'
# True : password 검증 시작
# False : 아이디가 존재하지 않음 -> 에러메시지 출력후 login.php로 이동
if ($result && $row = $result->fetch_assoc()) {
  # 입력된 password 와 데이터 베이스에 해시 처리된 비밀번호 비교
  # True : 로그인 성공 -> welcome.php 로 이동
  # False : 비밀번호 잘못 입력 -> 에러메시지 출력후 login.php로 이동
  if (password_verify($password, $row['password'])){
    $_SESSION['login'] = true;
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['password'] = $row['password'];
    # POST 에 remember 이 전달되면 cookie 생성
    if(isset($_POST['remember'])) {
      setcookie('id', $row['user_id'], time() + 3600);
      setcookie('password', $row['password'], time() + 3600);
    }
    header("Location: welcome.php");
    exit;
  } else {
    $_SESSION['error'] = "비밀번호가 일치하지 않습니다.";
    header("Location: login.php");
    exit;
  }
} else {
  $_SESSION['error'] = "아이디가 일치하지 않습니다.";
  header("Location: login.php");
  exit;
}

# user_id 와 password 가 모두 일치할 때
# session 생성

# db->close()


?>