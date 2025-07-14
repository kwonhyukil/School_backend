<?php

setcookie('order', '', time() - 3600, '/');
header('Location:Lab2_index.php');
exit;
