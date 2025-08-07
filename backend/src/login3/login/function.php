<?php
require_once 'db_config.php';


$db_conn = new mysqli(
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASS,
  db_info::DB
);

function register($data) {

  global $db_conn;

  $username = strtolower($data["username"]);
  $password = $db_conn->real_escape_string($data["password"]);
  $password2 = $db_conn->real_escape_string($data["password2"]);

  $result = mysqli_query($db_conn, "SELECT username FROM user WHERE username='$username'");

  if ( mysqli_fetch_assoc($result)) {
    echo "<script>
          alert('중복되는 아이디 입니다. 다른 아이디로 가입하세요!!')
          </script>";
    return false;
  }

  if ( $password !== $password2 ) {
    echo "<script>
          alert('패스워드가 일치하지 않습니다. 다시 입력하세요!!')
          </script>";
    return false;
  }
  
  // 패스워드 해싱
  $password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($db_conn, "INSERT INTO user(username, password) VALUES('$username','$password')");

  return mysqli_affected_rows($db_conn);
}

// function write($data) {

//   global $db_conn;

//   $title = trim($data["title"]);
//   $writer = trim($data["writer"]);
//   $content = trim($data["content"]);

//   mysqli_query($db_conn, "INSERT INTO post(title, writer, content) VALUES('$title','$writer','$content')");
  
//   return mysqli_affected_rows($db_conn);


// }

?>