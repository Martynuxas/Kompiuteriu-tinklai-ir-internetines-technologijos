<?php
$con = mysqli_connect('localhost', 'stud', 'stud', 'pvz');
	if(!$con )
	{
		die("Cannot connect: ".mysqli_error($con));
	}
	if(mysqli_connect_errno()){
		die("failed to connect to Mysql: ".mysqli_connect_errno()." : ".mysqli_connect_error());
	}
$duomenys = file_get_contents('keliones.json');
$json = json_decode($duomenys, true);

foreach ($json['data'] as $value)
{
	$query = "INSERT INTO keliones2 (kur, kada, kiekdienu, maitinimas, kaina)
	VALUES('".$value['kur']."','".$value['kada']."','".$value['kiekdienu']."','".$value['maitinimas']."', '".$value['kaina']."')";
	@mysqli_query($con, $query);
	echo "duomenys iterpti!";
}


mysqli_close($con);
?>