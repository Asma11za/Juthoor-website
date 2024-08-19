<?php

	session_start();
	unset($_SESSION['Cart']);
	 header('Location: new.php');
	
?>