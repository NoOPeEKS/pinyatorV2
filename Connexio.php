<?php
	$conn = mysqli_connect('localhost','root','Bumbumru1','pinyator');
	if (!$conn) 
	{
		die('Could not connect: ' . mysqli_error($conn));
	}
	
function GetStrDB($str)
{	
    return addslashes(NotInjection($str));
}

function guidv4($data = null) {
	// Generate 16 bytes (128 bits) of random data or use the data passed into the function.
	$data = $data ?? openssl_random_pseudo_bytes(16);
	assert(strlen($data) == 16);

	// Set version to 0100
	$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
	// Set bits 6-7 to 10
	$data[8] = chr(ord($data[8]) & 0x3f | 0x80);

	// Output the 36 character UUID.
	return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


function NotInjection($str)
{	
	$str = str_replace("update", "", $str);
	$str = str_replace("delete", "", $str);
	$str = str_replace(" from ", "", $str);
	$str = str_replace("truncate", "", $str);
	$str = str_replace("drop ", "", $str);
	$str = str_replace("create ", "", $str);
	$str = str_replace("alter ", "", $str);
    return str_replace("select ", "", $str);
}

function GetFormatedDate($date, $format = 'Ymd')
{
	$combinedDT = date('Y-m-d', strtotime("$date"));
	$d = new DateTime($combinedDT);
	$data = $d->format($format);
	if ($data == "19700101")
		return "NULL";
	return "'".$data."'";
}

function GetFormatedDateTime($date, $time, $format = 'YmdHis')
{
	$combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
    $d = new DateTime($combinedDT);
    return $d->format($format);
}

function GetLastId($conne)
{
	$sql = "SELECT LAST_INSERT_ID() as ID";
	$result = mysqli_query($conne, $sql);

	if (mysqli_num_rows($result) > 0) 
	{		
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) 
		{	
			return $row["ID"];
		}
	}
	return -1;
}
?>
