<html>
<head>
  <title>Pinyator - Inscrits esdeveniment</title>
  <meta charset="utf-8">
<?php include "./Head.php";?>
</head>
<script src="llibreria/inscripcio.js"></script>
<?php include "./Style.php";?>
<body>
<?php $menu=2; include "./Menu.php";

$estat = intval($_GET["e"]);
$id = intval($_GET["id"]);
$nom = "";
$public = false;


$link = "id=".$id."&e=".$estat;
$esEditable = 1;
?>
	<div>
	</div> 
	<table class='butons'>
		<tr class='butons'>
			<th class='butons'><a href="Event.php?e=<?php echo $estat?>" class="boto" >Torna</a></th>
			<th></th>
			<th class='butons'><a href="Inscripcio_DataHora.php?e=<?php echo $estat?>&id=<?php echo $id?>" class="boto" >Classificació</a></th>
			<th class='butons'>
				Ordena per:
				<a href="Event_LlistaPrivat.php?<?php echo $link?>"  class="boto" >Malnom</a>
				<a href="Event_LlistaPrivat.php?<?php echo $link?>&o=ESTAT" class="boto" >Estat</a>
			</th>
		</tr>
	</table>

	<br>
<?php
	include "./Event_Llista.php";
?>
   </body>
</html>

