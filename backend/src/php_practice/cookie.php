<?php



// Reponse Body에 파일이 써진다.
// 
echo "asdfdsfjsfadlkjflkjfakjldfslk";

// 1) 쿠키 생성 요청 (A)
setcookie("bar", "milk");
setcookie("poo", "beer");
setcookie("pos", "water");
setcookie("kin", "cider", time() - 3600);

// http response 메시지에 bar 라는 이름과 milk 라는 값을 가지는 쿠키를 생성하는 메시지를 작성하시오.
// bar = milk


// 2) 쿠키 생성 (C)
// Web brower가 local에 쿠키 정보를 파일로 저장
// 도메인 단위 관리 : localhost//bar==milk


// 3) 쿠키 전달 (C)
// 4) 쿠키 읽기 (A)
