<html>
<head>
  <title>Pinyator - Inscrits esdeveniment</title>
  <meta charset="utf-8">
<?php include "./Head.php";?>
</head>
<?php include "./Style.php";?>
<body>
<?php $menu=2; include "./Menu.php";

$id = intval($_GET["id"]);

?>
	<div>
	</div> 
	<table class='butons'>
		<tr class='butons'>
			<th class='butons'><a href="Event.php" class="boto" >Torna</a>
			<a href="Event_Comentari_Fitxa_Privat.php?id=<?php echo $id?>&nom=" class="boto" >Nou</a></th>
		</tr>
	</table>

	<br>
<?php
	include "./Event_Comentari_Llista.php";
?>
   </body>
</html>

