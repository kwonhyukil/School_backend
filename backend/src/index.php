<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  hello world
  <br />
  <? print("hello"); ?>
  <?php


  if($_GET['bar'] > 10) {
    echo "<h1 style='color:blue'>bar is greater than 10</h1>";
  }
  else {
    echo "<h1 style='color:green'>bar is less than or equal to 10</h1>";
  }
  $result = 20 + 30;
  echo "<h1 style='color:red'>{$result}</h1>";
  
  ?>
</body>

</html>