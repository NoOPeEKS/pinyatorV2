<html>
<head>
  <title>Pinyator - Inscrits esdeveniment</title>
  <meta charset="utf-8">
</head>
<?php include "./Style.php";?>
<body>
<?php  
	$id = intval($_GET["id"]);
	$nom = strval($_GET["nom"]);
	$url="Event_Comentari_Public";
	include "./Event_Comentari_Fitxa.php";
?>
   </body>
</html>

