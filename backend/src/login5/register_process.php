<?php
# 데이터 베이스 정보 가져오기
#   1) require_once 'DB.php'
require_once "DB.php";

session_start();

# 1. DB 연결정보 불러오고 연결 상태 확인 -> connect error 발생시 exit
if ($db_conn-> connect_error) {
    $_SESSION['error'] = "DB 연결 실패했습니다!";
    header("Location: register.php");
    exit;
}

# 2. register.php 에서 POST 방식으로 전달된 정보 저장
#    1) $user_id = isset($_POST['user_id'])
#    2) $name = isset($_POST['name'])
#    3) $password =isset($_POST['password'])
$user_id = trim($_POST['user_id'] ?? '');
$name = trim($_POST['name'] ?? '');
$password = trim($_POST['password'] ?? '');

#    SQL 인젝션 방지
#    $user_id = mysqli_real_escape_string($db_conn, $user_id)
#    $name = mysqli_real_escape_string($db_conn, $name)
#    $password = mysqli_real_escape_string($db_conn, $password)
$user_id = mysqli_escape_string($db_conn, $user_id);
$name = mysqli_escape_string($db_conn, $name);
$password = mysqli_escape_string($db_conn, $password);

# 3. 전달된 데이터 ( $user_id, $name, $password ) 공백인지 확인하고 공백일 경우
#    1) header("Location: register.php") 로 이동 exit;
if ($user_id === '' || $name === '' || $password === ''){
    $_SESSION['error'] = "모두 입력해주세요";
    header("Location: register.php");
    exit;
}

# 4. $user_id 중복된 값이 있는지 확인
#    $sql = "SELECT * FROM user user_id='$user_id'"
#    $result = mysqli_query($db_conn, $sql) -> True 중복( 존재 )
#    1) 중복된 값이 있을 경우( True ) 에러 메시지 저장 header("Location: register.php");
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($db_conn, $sql);

if ($result && $result->num_rows > 0){
    $_SESSION['error'] = "중복되는 아이디가 존재합니다.";
    header("Location: register.php");
    exit;
} else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(user_id, name, password) VALUES ('$user_id', '$name', '$password_hash')";
    $result = mysqli_query($db_conn, $sql);
    
    if (!$result) {
        $_SESSION['error'] = "데이터 베이스 저장 실패";
        header("Location: register.php");
        exit;
    } else {
        $_SESSION['success'] = "회원가입 성공!!";
        $_SESSION['register'] = True;
        header("Location: mainpage.php");
        exit;
    }


}

# 5. $user_id 값이 중복이 아닐 경우
#    $!result && $row = mysqli_fetch_row() == 0
#    1) 비밀번호를 hash 처리하고 DB 에 저장 sql 실행
#    $password_hash = password_hash($password, PASSWORD DEFAULT)
#    $sql = INSERT INTO user VALUES ($user_id, $name, $password_hash, created_at)
#    $result = mysqli_query($db_conn, $sql)

# 6. $result ( query문 실행 값이 True or False )
#    session['register'] = True
#    header("Location: login.php") 이동 후 회원가입 성공 메시지 출력 exit
#    session['register] = False
#    header("Location: register.php") 이동 후 에러메시지 출력 exit
?>