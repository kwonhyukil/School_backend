<?php



// hoisting // - 변수 선언이 함수의 최상단으로 끌어올려지는 현상



// 변수의 접근 범위
// 변수의 생명 주기
// - 출생 - 소멸
//   선언   전역 or 지역


// 자바 -> 블럭 기반
// pyphon -> 함수 기반
// php -> 함수 기반

$bar = "hello";

function foo()
{
    global $bar; // 전역 변수 $bar를 사용
    print $bar . "<br />";
}

foo(); // hello

$bar = "Hello, World!" . "<br />";

print $bar; // Hello, World!


function Bar()
{
    static $count = 0;

    $count++;

    echo "Count: $count<br />";
}

Bar();
Bar();
Bar();

// 상수 선언_1
define('NAME', "Hyukil");
echo NAME . "<br />"; // Hyukil

// 상수 선언_2
const NAME2 = "Hyukil2";
echo NAME2 . "<br />"; // Hyukil2
