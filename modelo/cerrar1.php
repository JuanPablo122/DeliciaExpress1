<?php
if (isset($_POST['button'])) {
	session_start();
	session_destroy();
	header("location:../index.php");	
	exit();
}
?>
