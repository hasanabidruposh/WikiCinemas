<?php
ob_start();
session_start();
	session_unset();
	header("Refresh: 0.1; URL=Home.php");
?>