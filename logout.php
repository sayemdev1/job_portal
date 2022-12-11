<?php
session_start();
// session_destroy();
$_SESSION['loggedin']=false;
$_SESSION['id']='';
header('Location: index.php');
exit();
?>