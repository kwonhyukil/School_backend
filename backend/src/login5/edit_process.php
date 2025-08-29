<?php

require_once 'DB.php';

session_start();
# DB 연결 확인 connect error 발생시 에러메시지 출력

if ($db_conn->connect_error) {
    $_SESSION['error'] = "DB 연결 실패 !!";
    exit;
}
$id = $_POST['id'];

# edit.php 에서 post 방식으로 전달 받은 데이터 저장
# Id, Title, Writer, content
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$writer = isset($_POST['writer']) ? trim($_POST['writer']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';

$title = mysqli_real_escape_string($db_conn, $title);
$writer = isset($_POST['writer']) ? trim($_POST['writer']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
# Id, Title, Writer, content 검증( 공백 확인, 글자 수 제한 )

if ($title === "" || $writer === "" || $content === "") {
    $_SESSION['error'] = "모두 입력하세요!";
    header("Location: edit.php");
    exit;
}

function word_num_check($a, $min, $max){
    if ($a < $min && $a > $max) {
        return False;
    }
    return true;
}

if (!word_num_check(strlen($title), 1, 30)){
    $_SESSION['error'] = "제목 글자 수를 확인하세요";
    header("Location: edit.php?id=$id");
    exit;
}
if (!word_num_check(strlen($writer), 1, 20)){
    $_SESSION['error'] = "작성자의 글자 수를 확인하세요";
    header("Location: edit.php?id=$id");
    exit;
}
if (!word_num_check(strlen($content), 1, 1000)){
    $_SESSION['error'] = "내용의 글자 수를 확인하세요";
    header("Location: edit.php?id=$id");
    exit;
}

# 검증이 완료된 후 Update SQL 문 실행

# SQL의 결과 값
# True -> 업데이트 완료 후 해당 id 게시물 View 로 이동
# False -> 에러 메시지 출력 후 해당 id 게시물 View 로 이동
$sql = "UPDATE poster SET title = '$title', writer = '$writer', content = '$content' WHERE id = $id";
$result = mysqli_query($db_conn, $sql);

if ($result) {
    $_SESSION['success'] = "게시글 수정 성공";
    header("Location: view.php?id=$id");
    exit;
} else {
    $_SESSION['error'] = "게시글 수정 실패";
    header("Location: view.php?id=$id");
    exit;
}


?>