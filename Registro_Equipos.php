<?php			
	include 'conexion.php';
	include 'sweetAlert.php';
	
	session_start();
			
	if ($_SERVER["REQUEST_METHOD"] == "POST") {			
		// Obtiene los datos del formulario
		$strID_Equipo  = $_POST['strID_Equipo'];
		$strSerie = $_POST['strSerie'];
		$strModelo = $_POST['strModelo'];
		$strDescripcion = $_POST['strDescripcion'];
		$strID_Usuario = $_POST['strID_Usuario'];
		$strCondicion = $_POST['strCondicion'];
		$dtFechaAsignacion = $_POST['dtFechaAsignacion'];
		
		echo "<script>console.log('Debug Objects: " . $strID_Equipo . "' );</script>";
		echo "<script>console.log('Debug Objects: " . $strSerie . "' );</script>";
		echo "<script>console.log('Debug Objects: " . $strModelo . "' );</script>";
		echo "<script>console.log('Debug Objects: " . $strDescripcion . "' );</script>";
		echo "<script>console.log('Debug Objects: " . $strID_Usuario . "' );</script>";
		echo "<script>console.log('Debug Objects: " . $strCondicion . "' );</script>";
		echo "<script>console.log('Debug Objects: " . $dtFechaAsignacion . "' );</script>";

		// Prepara la consulta SQL para insertar un nuevo usuario
		$sql = "INSERT INTO equipos (`strID_Equipo`, `strSerie`, `strModelo`, `strDescripcion`, `strID_Usuario`, `strCondicion`, `dtFechaAsignacion`) VALUES ('$strID_Equipo', '$strSerie', '$strModelo', '$strDescripcion', '$strID_Usuario', '$strCondicion', '$dtFechaAsignacion');";
		
		echo "<script>console.log('SQL: " . $sql . "' );</script>";

		// Ejecuta la consulta
		if ($conn->query($sql) === TRUE) {				
			echo "<script>
					Swal.fire({
					icon: 'success',
					title: 'Registro...!',
					text: 'Equipo Registrado exitosamente.', 
					confirmButtonText: 'Continuar a la página Principal.',
					}).then((result) => {
						  if (result.isConfirmed) {
							  window.location.href = 'Principal.php'
						  }
					  });
				</script>"; 			
		} else {
			echo "<script>
					Swal.fire({
					icon: 'error',
					title: 'ERROR',
					text: 'El Equipo No Se Registró correctamente.', 
					confirmButtonText: 'Volver a intentar.',
					}).then((result) => {
						  if (result.isConfirmed) {
							  window.location.href = 'Registro_Equipos.php'
						  }
					  });
				</script>"; 	
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Metalco</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<!--<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
		<link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</head>

	<body>	
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="img/Metalco_Logo.png" alt="Metalco Logo" height="100">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>	
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a class="nav-link" id="logInBtnNavbar" href="Principal.php">Volver al Principal</a></li>
					</ul>
				</div>				
			</div>
		</nav>
		
		<!-- Modal de Autenticación (Sign In)  -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="Registrare_Label">Registar equipo</h5>
				</div>
				<div class="modal-body">
					<form id="Registrarse" method="post" action="Registro_Equipos.php">
						<div id="strID_EquipoField" class="mb-3">
							<label class="form-label">ID Equipo</label>
							<input type="text" name="strID_Equipo" id="strID_Equipo" class="form-control" required>
						</div>
						<div id="strSerieField" class="mb-3">
							<label class="form-label">Serie</label>
							<input type="text" name="strSerie" id="strSerie" class="form-control" required>
						</div>
						<div id="strModeloField" class="mb-3">
							<label class="form-label">Modelo</label>
							<input type="text" name="strModelo" id="strModelo" class="form-control" required>
						</div>
						<div id="strDescripcionField" class="mb-3">
							<label class="form-label">Descripcion</label>
							<input type="text" name="strDescripcion" id="strDescripcion" class="form-control" required>
						</div>						
						<div id="strID_UsuarioField" class="mb-3">
							<label class="form-label">ID_Usuario</label>
							<input type="text" name="strID_Usuario" id="strID_Usuario" class="form-control" required>
						</div>	
						<div id="strCondicionField" class="mb-3">
							<label class="form-label">Condicion</label>
							<input type="text" name="strCondicion" id="strCondicion" class="form-control" required>
						</div>	
						<div id="dtFechaAsignacionField" class="mb-3">
							<label class="form-label">Fecha Asignacion	</label>
							<input type="text" name="dtFechaAsignacion" id="dtFechaAsignacion" class="form-control" required>
						</div>	
						<button type="submit" class="btn btn-primary w-100">Agregar Equipo</button>
					</form>
				</div>
			</div>
		</div>
		
		<!-- Pie de página -->
		<footer class="bg-dark text-light text-center py-3 mt-5">
			<p>&copy; 2025 Metalco. Todos los derechos reservados.</p>
			<p>
				<a href="#" class="text-light mx-2">Política de Privacidad</a> |
				<a href="#" class="text-light mx-2">Términos y Condiciones</a> |
				<a href="#" class="text-light mx-2">Contáctanos</a>
			</p>
		</footer>

		<!-- Footer con redes sociales e iconos -->
		<footer class="bg-dark text-white text-center py-3">
			<div class="footer-social">
				<a href="https://www.facebook.com/acerosmetalco/?locale=es_LA" target="_blank">
					<i class="bi bi-facebook social-icon"></i> <!-- Icono de Facebook -->
				</a>
				<a href="" target="_blank">
					<i class="bi bi-whatsapp social-icon"></i> <!-- Icono de WhatsApp -->
				</a>
			</div>
		</footer>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>
</html>