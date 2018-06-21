<html>
<head>
</head>
<?php include "$_SERVER[DOCUMENT_ROOT]/pinyator/Style.php";?>
<body STYLE="background-color:transparent">

<?php
	
	include "$_SERVER[DOCUMENT_ROOT]/pinyator/Connexio.php";

	$sql="SELECT SUM(IFNULL(IU.ESTAT,0)) INSCRIT
	FROM INSCRITS IU 
	JOIN CASTELLER C ON C.CASTELLER_ID=IU.CASTELLER_ID
	JOIN POSICIO P ON P.POSICIO_ID=C.POSICIO_PINYA_ID
	WHERE IU.EVENT_ID=61
	AND IU.ESTAT = 1
	AND (P.ESNUCLI=1 OR P.ESTRONC=1 OR P.ESCORDO=1)";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
		echo "<b>#Objectiu200AVic</b>
			<table>
			<tr>";
		while($row = mysqli_fetch_assoc($result)) 
		{
			$number=str_split($row["INSCRIT"],1);
			if(count($number) > 2)
			{
				$centenes=$number[0];
				$decenes=$number[1];
				$unitats=$number[2];
			}
			else if(count($number) > 1)
			{
				$decenes=$number[0];
				$centenes=0;
				$unitats=$number[1];
			}
			else
			{
				$decenes=0;
				$centenes=0;
				$unitats=$number[0];
			}
			
			echo "<td class='countertd'><div class='counter'>".$centenes."</div></td>";
			echo "<td class='countertd'><div class='counter'>".$decenes."</div></td>";
			echo "<td class='countertd'><div class='counter'>".$unitats."</div></td>";
		}
		echo "</tr>
			</table>";
	}
	
	mysqli_close($conn);
	
?>

</body>
</html>