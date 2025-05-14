<?php			
	include 'conexion.php';
	include 'sweetAlert.php';
	
	session_start();
			
	if ($_SERVER["REQUEST_METHOD"] == "POST") {			
		// Obtiene los datos del formulario
		$strID_Usuario = trim($_SESSION['strID_Usuario']);
		$strPassword = trim($_POST['strPassword']);
		$strConfirmPassword = trim($_POST['strConfirmPassword']);
		
		echo "<script>console.log('strID_Usuario: " . $strID_Usuario . "' );</script>";

		// Prepara la consulta SQL para insertar un nuevo usuario
		$sql = "UPDATE usuarios SET `strPassword`='$strPassword', boolPrimeraVez=1 WHERE strID_Usuario='$strID_Usuario'";

		// Ejecuta la consulta
		if ($conn->query($sql) === TRUE) {	
			echo "<script>
						Swal.fire({
						icon: 'success',
						title: 'Registro...!',
						text: 'Contraseña Creada Exitosamente.', 
						confirmButtonText: 'Volver a la Página de Logueo.',
						}).then((result) => {
							  if (result.isConfirmed) {
								  window.location.href = 'Login.php'
							  }
						  });
					</script>"; 			
		} else {
			echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'ERROR',
						text: 'La Contraseña No Se Creó Correctamente.', 
						confirmButtonText: 'Volver a intentar.',
						}).then((result) => {
							  if (result.isConfirmed) {
								  window.location.href = 'Crear_Contraseña.php'
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
						<li class="nav-item"><a class="nav-link" id="logInBtnNavbar" href="Login.php">Volver al Logueo</a></li>
					</ul>
				</div>				
			</div>
		</nav>
		
		<!-- Modal de Autenticación (Sign In)  -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="Crear_Contraseña_Label">Crear Contraseña</h5>
				</div>
				<div class="modal-body">
					<form id="CrearContraseña" method="post" action="Crear_Contraseña.php">				
						<div id="password" class="mb-3">
							<label class="form-label">Contraseña</label>
							<input type="password" name="strPassword" id="strPassword" class="form-control" required>
						</div>
						<div id="password" class="mb-3">
							<label class="form-label">Confirmar Contraseña</label>
							<input type="password" name="strConfirmPassword" id="strConfirmPassword" class="form-control" required>
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