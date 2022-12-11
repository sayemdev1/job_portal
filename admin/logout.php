<?php
session_start();
session_destroy();
$_SESSION['admin'] = false;
$_SESSION['aid'] = '';
header('Location: index.php');
?>