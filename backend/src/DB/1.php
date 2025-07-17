<?php

// db 라는 주소를 가지는 mysql에 접속
// 인증 ID : root
// passward : root
// 선택 DB : gsc

// 1. 연결설정

// 2. SQL 전송 client -> DBMS Server
// 3. 반환 값을 처리 
// 작성된 프로그램에 따라 req, res을 반복한다.

// 4. 연결 종료

$db_conn = new mysqli("db", "root", "root", "gsc");

print_r($_POST);

$std_id = $_POST['std_id'];
$id = $_POST['id'];
$password = $_POST['password'];
$name = $_POST['name'];
$age = $_POST['age'];
$birth = $_POST['birth'];

$sql = "insert into student(std_id, id, password, name, age, birth) values ('$std_id', '$id', '$password', '$name', $age, '$birth')";

// SQL 에 종속적. 명령어에 따라 결과 값이 정해짐. true, object false
$result = $db_conn->query($sql);

if ($result) {
  echo "<hr><br> 레코드 생성 성공 <br><hr>";
} else {
  echo "<hr><br> 레코드 생성 실패 <br><hr>";
}

var_dump($result);




// // 1번 작업 : DBMS와의 연결
// $db_conn = new mysqli("db", "root", 'root', 'gsc'); // 연결 설정
// // DBMS 접속 : mysql -u root -p
// // passward 입력 : root 
// // DB 선택 : use gsc

// // 연결 결과 확인
// if ($db_conn->errno) {
//   // 연결 실패시 -> 프로그램 종료
//   echo $db_conn->error;
//   exit;
// }
// // echo "DBMS 연결 성공, gsc db 선택 완료";
// // <---- 2번 작업 : SQL 전송 ---->

// // 새로운 레코드를 생성
// // 2-1 : SQL문 작성 -> 문자열을 이용하여 실행하고자 하는 SQL문 생성
// $sql = "insert into student(std_id, id, password, name, age, birth) values ('2423003', 'test3', '6666', 'kim3', 30, '1900-3-2')";
// echo $sql;
// // 2-2 : SQL문 전송 client -> DBMS 서버로
// // $result 결과값
// // 1) True
// // 2) Instance of mysqli_result class
// // 3) false
// $result = $db_conn->query($sql);

// // <---- 2번 작업 ---->

// // 3번 작업 : 반환 값 처리
// if ($result) {
//   echo "<hr><br> 레코드 생성 성공 <br><hr>";
// } else {
//   echo "<hr><br> 레코드 생성 실패 <br><hr>";
// }

// // 4번 작업 : 연결 종료
// $db_conn->close();




// class Bar
// {
//   function __construct()
//   {
//     echo "생성자 호출";
//     Bar::$id++;
//   }

//   function __destruct()
//   {
//     echo "소멸자 호출";
//   }

//   public $value = 2;

//   function get_value()
//   {
//     return $this->value;
//   }

//   public static $id = 0;
// }

// $obj = new Bar();
// print $obj->value;

// unset($obj);

// echo "프로그램 종료";
