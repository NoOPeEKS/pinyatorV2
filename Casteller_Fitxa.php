<html>
<head>
	<title>Pinyator</title>
	<?php include "$_SERVER[DOCUMENT_ROOT]/pinyator/Head.php";?>
</head>
<?php include "$_SERVER[DOCUMENT_ROOT]/pinyator/Style.php";?>
<body>
<?php $menu=1; include "$_SERVER[DOCUMENT_ROOT]/pinyator/Menu.php";

	include "$_SERVER[DOCUMENT_ROOT]/pinyator/Connexio.php";

	$id = 0;
	if (!empty($_GET['id']))
	{	
		$id = intval($_GET['id']);
	}
	
	$url = "";
	$malnom = "";
	$nom = "";
	$cognom1 = "";
	$cognom2 = "";
	$posicioPinya = 0;
	$posicioTronc = 0;
	$responsable1 = 0;
	$responsable2 = 0;
	$altura = 0;
	$alturaTroncs = 0;
	$estat = 0;
	$lesionat = 0;
	$portarpeu = 1;
	$urlInscripcio = "";
	$novell = 0;
				
	echo "<form method='post' action='Casteller_Desa.php'>";

	if ($id > 0)
	{
		$sql="SELECT CASTELLER_ID, MALNOM, NOM, COGNOM_1, COGNOM_2, 
		POSICIO_PINYA_ID, POSICIO_TRONC_ID, CODI, FAMILIA_ID, 
		ALTURA, ALTURA_TRONCS, ESTAT, LESIONAT, PORTAR_PEU, FAMILIA2_ID, NOVELL
		FROM CASTELLER
		WHERE CASTELLER_ID = ".$id."
		ORDER BY MALNOM ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$malnom = $row["MALNOM"];
				$url = $row["CODI"];
				$nom = $row["NOM"];
				$cognom1 = $row["COGNOM_1"];
				$cognom2 = $row["COGNOM_2"];
				$posicioPinya = $row["POSICIO_PINYA_ID"];
				$posicioTronc = $row["POSICIO_TRONC_ID"];
				$responsable1 = $row["FAMILIA_ID"];
				$responsable2 = $row["FAMILIA2_ID"];
				$altura = $row["ALTURA"];
				$alturaTroncs = $row["ALTURA_TRONCS"];
				$estat = $row["ESTAT"];
				$portarpeu = $row["PORTAR_PEU"];
				$lesionat = $row["LESIONAT"];
				$urlInscripcio = "src='Inscripcio.php?id=".$url."'";
				$novell = $row["NOVELL"];
			}
		}
		else if (mysqli_error($conn) != "")
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
?>
	<div>
		<table class="butons">
			<tr>
				<th><a href="Casteller.php" class="boto" >Torna als castellers</a></th>
			</tr>
		</table>
	</div> 
	<div id="panellLateral" style="position:absolute;padding-top:10px;width:320px;height:100%">
		<iframe id="mainFrame" <?php echo $urlInscripcio ?> width="100%" height="90%" style="border:0" ></iframe>
	</div>
	<div style="position:absolute;left:320px;width:500px">
		<div class="form_group">
			<label>ID - </label><?php echo "  <a href='Inscripcio.php?id=".$url."'>Link als seus esdeveniments</a>"?>
			<input type="text" class="form_edit" name="id" value="<?php echo $id ?>" readonly>
			<br><br>
			<label>MalNom</label>
			<input type="text" class="form_edit" name="malnom" value="<?php echo $malnom ?>" autofocus required>
			<br><br>			
			<table>
				<tr>
					<th>Lesió</th><th>Portar peu</th><th>Novell/a</th>
				</tr>	
				<tr>
					<td width=100px>
						<label class="switch">texte
							<input type="checkbox" name="lesionat" value=1 <?php if ($lesionat == 1) echo " checked";?>>
							<span class="slider round"></span>
						</label>
					</td>
					<td width=100px>
						<label class="switch">texte
							<input type="checkbox" name="portarpeu" value=1 <?php if ($portarpeu == 1) echo " checked";?>>
							<span class="slider round"></span>
						</label>
					</td>
					<td width=100px>
						<label class="switch">texte
							<input type="checkbox" name="novell" value=1 <?php if ($novell == 1) echo " checked";?>>
							<span class="slider slidergreen round"></span>
						</label>
					</td>
				</tr>
			</table>
			<br>
			<label>Nom</label>
			<input type="text" class="form_edit" name="nom" value="<?php echo $nom ?>" required>
			<br><br>
			<label>Cognom 1er</label>
			<input type="text" class="form_edit" name="cognom1" value="<?php echo $cognom1 ?>" required>
			<br><br>
			<label>Cognom 2on</label>
			<input type="text" class="form_edit" name="cognom2" value="<?php echo $cognom2 ?>">
			<br><br>
			<table style="width:100%;">
				<tr>
					<td style="padding-right:20px">
						<label>Alçada</label>
						<input type="number" class="form_edit" name="altura" value="<?php echo $altura ?>">
					</td>
					<td>
						<label>Alçada troncs</label>
						<input type="number" class="form_edit" name="alturaTroncs" value="<?php echo $alturaTroncs ?>">
					</td>
				</tr>
			</table>
			<br>
			<table style="width:100%;">
				<tr style="padding-top:20px">
					<td style="padding-right:20px">
						<label for="sel1">Posicio pinya:</label>
						<select class="form_edit" name="posiciopinyaid">
						<option value=0>Sense posicio</option>
<?php

		$sql="SELECT POSICIO_ID, NOM
		FROM POSICIO
		WHERE ESTRONC=0
		ORDER BY NOM ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result))
			{		
				$selected="";
				if($row["POSICIO_ID"]==$posicioPinya)
				{
					$selected="selected";
				}
				echo "<option value=".$row["POSICIO_ID"]." ".$selected.">".$row["NOM"]."</option>";
			}
		}
		else if (mysqli_error($conn) != "")
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
?>
			</select>
			</td>
					<td>
			<label for="sel1">Posicio tronc:</label>
			<select class="form_edit" name="posiciotroncid">
			<option value=0>Sense posicio</option>
<?php

		$sql="SELECT POSICIO_ID, NOM
		FROM POSICIO
		WHERE ESTRONC=1
		ORDER BY NOM ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result))
			{		
				$selected="";
				if($row["POSICIO_ID"]==$posicioTronc)
				{
					$selected="selected";
				}
				echo "<option value=".$row["POSICIO_ID"]." ".$selected.">".$row["NOM"]."</option>";
			}
		}
		else if (mysqli_error($conn) != "")
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
?>
					</select>
				</td>
			</tr>
		</table>
			<br>
			<label for="sel2">Responsable apuntar-me a pinyes:</label>
			<select class="form_edit" name="responsableid1">
			<option value=0>Sense responsable</option>
<?php

		$sql="SELECT CASTELLER_ID, MALNOM
		FROM CASTELLER
		WHERE 1=1
		AND ESTAT = 1
		AND CASTELLER_ID <> ".$id."
		ORDER BY MALNOM ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result))
			{		
				$selected="";		
				if($row["CASTELLER_ID"]==$responsable1)
				{
					$selected="selected";
				}
				echo "<option value=".$row["CASTELLER_ID"]." ".$selected.">".$row["MALNOM"]."</option>";
			}
		}
		else if (mysqli_error($conn) != "")
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
?>
			</select>
			<br><br>
			<select class="form_edit" name="responsableid2">
			<option value=0>Sense responsable</option>
<?php

		if (mysqli_num_rows($result) > 0) 
		{			
			mysqli_data_seek($result,0);
			while($row = mysqli_fetch_assoc($result))
			{		
				$selected="";		
				if($row["CASTELLER_ID"]==$responsable2)
				{
					$selected="selected";
				}
				echo "<option value=".$row["CASTELLER_ID"]." ".$selected.">".$row["MALNOM"]."</option>";
			}
		}
		mysqli_free_result($result);		
		
?>
			</select>
			<br><br>
			<label>Baixa</label>
			<label class="switch">texte
			  <input type="checkbox" name="estat" value=2 <?php if ($estat == 2) echo " checked";?>>
			  <span class="slider round"></span>
			</label>
			<br><br>
			<button type="Submit" name= "Desa" value="desar" class="boto">Desa</button>
			<button type="Submit" name= "Desa" value="desarievents" class="boto" style="float:right">Desa sense sortir</button>
		</div>
	</div>
	</form>
	<div id="panellLateral2" style="position:absolute;right:10px;padding-top:10px;width:350px;height:100%">
		<label>TEMPORADA</label>
		<select class="form_edit" id="temporada" onchange="ModificaiFrame()">
		<?php

			echo "<option value='0'>TOTES</option>";
			$sql="SELECT DISTINCT E.TEMPORADA, C.TEMPORADA AS ACTUAL
			FROM EVENT E, CONFIGURACIO C
			ORDER BY E.TEMPORADA ";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) 
			{
				while($row = mysqli_fetch_assoc($result))
				{	
					$selected = "";
					if ($row["ACTUAL"] == $row["TEMPORADA"])
						$selected = "selected";
					echo "<option value='".$row["TEMPORADA"]."' ".$selected.">".$row["TEMPORADA"]."</option>";
					$temporadaActual = $row["ACTUAL"];
				}
			}
			mysqli_close($conn);
		?>
		</select>
		<iframe id="frameEstadistiques" src="Casteller_estadistiques_taula.php?id=<?php echo $id."&t=".$temporadaActual ?>" width="100%" height="90%" style="border:0" ></iframe>
	</div>
	
	<script>
		function ModificaiFrame()
		{
			document.getElementById('frameEstadistiques').src = "Casteller_estadistiques_taula.php?id=<?php echo $id ?>&t=" + document.getElementById('temporada').value;
		}
	</script>
</body>
</html>

