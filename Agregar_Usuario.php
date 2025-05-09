<?php			
	include 'conexion.php';
	include 'sweetAlert.php';
	
	session_start();
			
	if ($_SERVER["REQUEST_METHOD"] == "POST") {			
		// Obtiene los datos del formulario
		$strID_Usuario = $_POST['strID_Usuario'];
		$nroEmpleado = $_POST['nroEmpleado'];
		$strNombre = $_POST['strNombre'];
		$strApellidos = $_POST['strApellidos'];
		$strEmail = $_POST['strEmail'];
		$strRol = $_POST['strRol'];
		$dtFecha = $_POST['dtFecha'];
		$strPassword = $_POST['strPassword'];

		// Prepara la consulta SQL para insertar un nuevo usuario
		$sql = "INSERT INTO `usuarios` (`strID_Usuario`, `nroEmpleado`, `strNombre`, `strApellidos`, `strEmail`, `strRol`, `dtFecha`, `strPassword`) VALUES ('$strID_Usuario', '$nroEmpleado', '$strNombre', '$strApellidos', '$strEmail', '$strRol', '$dtFecha', '$strPassword');";

		// Ejecuta la consulta
		if ($conn->query($sql) === TRUE) {			
			echo "<script>
					Swal.fire({
					icon: 'success',
					title: 'Agregar...',
					text: 'El Usuario se Agregó Correctamente.', 
					confirmButtonText: 'Aceptar.',
					}).then((result) => {						 
				});
				</script>"; 	
		
		} else {
			echo "<script>
					Swal.fire({
					icon: 'error',
					title: 'ERROR',
					text: 'El Usuario No Se Agregó Correctamente.', 
					confirmButtonText: 'Volver a intentar.',
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.href = 'Agregar_Usuario.php'
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
						<li class="nav-item"><a class="nav-link" id="logInBtnNavbar" href="Principal_Admin.php">Volver al Principal</a></li>
					</ul>
				</div>				
			</div>
		</nav>
		
		<!--  -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="Registrarse_Label">Agregar Usuario</h5>
				</div>
				<div class="modal-body">
					<form id="Agregar" method="post" action="Agregar_Usuario.php">
						<div id="strID_UsuarioField" class="mb-3">
							<label class="form-label">ID Usuario</label>
							<input type="text" name="strID_Usuario" id="strID_Usuario" class="form-control" required>
						</div>
						<div id="nroEmpleadoField" class="mb-3">
							<label class="form-label">Número de Empleado</label>
							<input type="text" name="nroEmpleado" id="nroEmpleado" class="form-control" required>
						</div>
						<div id="strNombreField" class="mb-3">
							<label class="form-label">Nombre</label>
							<input type="text" name="strNombre" id="strNombre" class="form-control" required>
						</div>
						<div id="strApellidosField" class="mb-3">
							<label class="form-label">Apellidos</label>
							<input type="text" name="strApellidos" id="strApellidos" class="form-control" required>
						</div>
						<div id="strEmailField" class="mb-3">
							<label class="form-label">Email</label>
							<input type="email" name="strEmail" id="strEmail" class="form-control" required>
						</div>		
						<div id="strRolField" class="mb-3">
							<label class="form-label">Rol</label>
							<input type="text" name="strRol" id="strRol" class="form-control" required>
						</div>
						<div id="dtFechaField" class="mb-3">
							<label class="form-label">Fecha</label>
							<input type="date" name="dtFecha" id="dtFecha" class="form-control" min="<?= date('Y-m-d'); ?>" required>	
						</div>		
						<div id="strPasswordField" class="mb-3">
							<label class="form-label">Password</label>
							<input type="password" name="strPassword" id="strPassword" class="form-control" required>
						</div>
						<button type="submit" class="btn btn-primary w-100">Aceptar</button>
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