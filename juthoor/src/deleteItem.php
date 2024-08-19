<?php

	session_start();
	if(isset($_GET['index']))
	{
		$i=$_GET['index'];
		unset($_SESSION['Cart']['Product'][$i]);
		$_SESSION['Cart']['Product']=array_values($_SESSION['Cart']['Product']);
	
	}
	 header('Location: new.php');
	
?>