<html>
<head>
  <title>Pinyator - Inscrits esdeveniment</title>
  <meta charset="utf-8">
</head>
<?php include "./Style.php";?>
<body>
<?php  
	//$estat = intval($_GET["e"]);
	$id = intval($_GET["id"]);
	$esEditable = 0;
	$nom = strval($_GET["nom"]);
	$public = true;
  
	include "./Event_Llista.php";
?>
   </body>
</html>

