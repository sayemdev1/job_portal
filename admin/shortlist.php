<?php
include("php/conn.php");
$jid = $_GET['jid'];
$uid = $_GET['uid'];
mysqli_query($con, "UPDATE `candidates` SET `status` = '1' WHERE job_id = '$jid' and candidate_id='$uid'");
header('location: job-single.php?id=' . $jid);
exit();
?>