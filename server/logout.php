<?php
	if(isset($_POST['logout']))
	{
		session_destroy();
		//header('location:#id01');
		include("../webclient/index.php");
	}
	else
	include("../webclient/index.php");
?>
