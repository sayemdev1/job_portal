<?php
include ("php/conn.php");
if($_GET['id']) {
    $id = $_GET['id'];
	$sql = "SELECT * FROM companies WHERE id='$id'";
	$resultset = mysqli_query($con, $sql);	
	$data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>