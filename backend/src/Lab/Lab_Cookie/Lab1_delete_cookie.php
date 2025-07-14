<?php

setcookie('username', '', time() - 3600, '/');
header('Location: Lab1_index.php');
exit;
