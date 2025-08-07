<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시판 목록</title>
</head>
<body>

<h1>게시판 목록</h1>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <?php for ( $i = 1 ; $i <= 5 ; $i++ ) : ?>
      <tr>
        <?php for ( $j = 1 ; $j <= 10 ; $j++) :?>
          <td><?php echo $i, $j; ?></td>
        <?php endfor ?>
      </tr>
    <?php endfor ?>
  </tr>
</table>
</body>
</html>