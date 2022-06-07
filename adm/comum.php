<?php

@$obj_mysqli = new mysqli('localhost', 'morrocav_root', 'morrocav_toor', 'morrocav_bd_cafe');

if ($obj_mysqli->connect_errno)
{
	$obj_mysqli = new mysqli('localhost', 'root', 'toor', 'bd_cafe');
}


if ($obj_mysqli->connect_errno)
{
	echo "Ocorreu um erro na conexão com o banco de dados.";
	exit;
}
	/* change character set to utf8 */
if (!$obj_mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $obj_mysqli->error);
    exit();
} else {
}

	/*
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
		?>
	*/


?>