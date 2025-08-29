<?php
session_start();

require_once 'DB.php';
# DB 연결 설정 connect error 발생시 exit
if ($db_conn->connect_error) {
    $_SESSION['error'] = "DB 연결 실패!!";
    exit;
}
# View 에서 수정 버튼 클릭시 전달되는 id 값 저장
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
# 전달된 id 값이 존재 유무 확인
if ($id === '') {
    $_SESSION['error'] = "게시글이 존재하지 않습니다.";
    exit;
}

$sql = "SELECT * FROM poster WHERE id='$id'";
$result = mysqli_query($db_conn, $sql); 

# True : id 값 존재 -> 제목, 작성자, 작성일자, 수정일자, 내용 SQL문 실행
# select title, writer, content, created_at, updated_at From poster where id=?
# False : id 값이 없을 경우 에러 메시지 출력 ( 해당 게시물이 존재 x )

if ($result) {
    $sql = "SELECT id, title, writer, content, created_at FROM poster WHERE id='$id'";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    $_SESSION['error'] = "게시물이 존재하지 않습니다.";
    header("Location: Board_list.php");
    exit;
}

# Writer 과 Login 되어 있는 사용자의 정보가 같은지 확인
# True -> 수정 페이지로 이동
# False -> 수정 권한이 없습니다 메시지 출력

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>게시물 수정</title>
</head>
<body>
    <h1><?= $row['id'] . "번 "?> 게시글 수정</h1>
<!-- 
    form action="edit_process.php" method="post"
    해당 id에 게시글 정보 출력
    제목 : Title
    작성자 : Writer
    내용 : Content

    버튼 생성
    수정완료 버튼 클릭 시 edit_process.php 로 이동
    취소 버튼 클릭 시 view.php?id=' ' 로 이동
-->
<form action="edit_process.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'];?>" >
    <table border='1' cellpadding='10'>
        <tr>
            <td>제목</td>
            <td><input type="text" id="title" name="title" value="<?= $row['title'] ?>"></td>
        </tr>
        <tr>
            <td>작성자</td>
            <td><input type="text" id="writer" name="writer" value="<?= $_COOKIE['user_id'];?>"></td>
        </tr>
        <tr>
            <td>내용</td>
            <td><textarea name="content" id="content" cols="50" rows="15"><?= $row['content'];?></textarea></td>
        </tr>
    </table>
    <button type="submit">수정하기</button>
</form>
<button><a href="view.php?id=<?= $row['id'];?>">취소</a></button>

</body>
</html>