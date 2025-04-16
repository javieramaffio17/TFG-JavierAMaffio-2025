<?php
	session_start();

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

	$email = $_POST['email'];
	$password = $_POST['password'];

	echo $email;
	echo $password;

	$sql = "SELECT * FROM usuarios WHERE strEmail='$email';";

	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
		$_SESSION['username'] = $email;
		header("Location: principal.php");
	} else {
		echo "Usuario o contraseña incorrectos.";
	}

	$conn->close();
?>