<?php
	$mysqli = mysqli_connect("localhost:3306", "root", "", "webstats");
	
	if (!$mysqli) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	$res = $mysqli->query("SELECT id FROM ".$_POST["JOUEUR"]." ORDER BY id ASC");
	
	$array = [];
	while ($row = $res->fetch_assoc()) {
		$array[] = array('Value' => $row['id']);
	}
	
	echo json_encode($array);
	mysqli_close($mysqli);
?>