
<?php
	include "./Head_public.php";
	session_start();
	if (empty($_SESSION["usuari"]))
	{		
		echo "<meta http-equiv='Refresh' content='0;url=Login.php'>";
	}
	
 ?>