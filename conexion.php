<?php
	$servername ="localhost:3306"; 
	$username ="metalco"; 
	$password ="metalco1234"; 
	$dbname ="metalcobd";

	// Crear conexión
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Verificar conexión
	if ($conn->connect_error) {
		die("Conexión fallida: " . $conn->connect_error);
	}
?>