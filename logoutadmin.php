<?php
	session_start();

	session_destroy();
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('ออกจากระบบเรียบร้อย')
	window.location.href='loginadmin.php';
	</SCRIPT>");
?>
