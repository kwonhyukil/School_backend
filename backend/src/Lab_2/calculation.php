<?php
// 리스트 형식으로 받음
$values = $_POST['value'];

// 받은 데이터 숫자(int)화
$numbers = array_map('intval', $values);

// 합계
$sum = array_sum($numbers);

// 리스트 갯수
$count = count($numbers);

// 평균
$avg = $sum / $count;

// 분산 계산
$variance_sum = 0;
foreach ($numbers as $num) {
    $variance_sum += pow($num - $avg, 2);
}
$variance = $variance_sum / $count;

// 표준편차
$std_dev = sqrt($variance);

echo "입력 값 : " . implode(" ", $numbers) . "<br>";
echo "평균 : " . round($avg, 2) . "<br>";
echo "분산 : " . round($variance, 2) . "<br>";
echo "표준편차 : " . round($std_dev, 2);
