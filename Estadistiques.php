<html>
<head>
  <title>Pinyator - Estadistiques</title>
<?php include "$_SERVER[DOCUMENT_ROOT]/pinyator/Head.php";?>
</head>
<?php include "$_SERVER[DOCUMENT_ROOT]/pinyator/Style.php";?>
<body>
<?php $menu=8; include "$_SERVER[DOCUMENT_ROOT]/pinyator/Menu.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/pinyator/Connexio.php";?>
<div class="sidenav" id="posicio" style="width:200px;" >
<br>

<button class="boto" style="margin-bottom:10px" onClick="ModificaiFrame('Estadistiques/Assistencia.php')">Gràfica assistència</button>


<select class="form_edit" id="castell">
<?php

	$sql="SELECT DISTINCT NOM
	FROM CASTELL
	ORDER BY NOM ";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result))
		{			
			echo "<option value=".$row["NOM"].">".$row["NOM"]."</option>";
		}
	}
?>
</select>
<button class="boto" style="margin-bottom:10px" title="Cal seleccionar el castell" onClick="ModificaiFrame2('Estadistiques/Castell_Posicio_estadistiques_taula.php')">Posició per casteller</button>


<button class="boto" style="margin-bottom:10px" onClick="ModificaiFrame('Estadistiques/Assistencia_Casteller_estadistiques_taula.php')">Assistència</button>


</div>
<div style="margin-left:200px">
<iframe id="mainFrame" src="" width="100%" height="90%" style="border:0" ></iframe>
</div>
</body>
<script>
function ModificaiFrame(loc)
{
	document.getElementById('mainFrame').src = loc;
}
function ModificaiFrame2(loc)
{
	document.getElementById('mainFrame').src = loc + "?id=" + document.getElementById('castell').value;
}
</script>
</html>

