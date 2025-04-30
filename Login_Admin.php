<?php	
	include 'conexion.php';
	include 'sweetAlert.php';
		
	session_start();
			
	if ($_SERVER["REQUEST_METHOD"] == "POST") {			
		$correo = $_POST['correo'];
		$contraseña = $_POST['contraseña'];
		$rol = "Administrador";
					
		$sql = "SELECT * FROM usuarios WHERE strEmail='$correo'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
						
			if ($contraseña == $row['strPassword']) {	
				if ($rol == $row['strRol']) {	
						// Obtiene los datos del formulario			
						$_SESSION['strID_Usuario'] = $row['strID_Usuario'];
						$_SESSION['nroEmpleado'] = $row['nroEmpleado'];
						$_SESSION['strNombre'] = $row['strNombre'];
						$_SESSION['strApellidos'] = $row['strApellidos'];
						$_SESSION['strEmail'] = $row['strEmail'];
						$_SESSION['strRol'] = $row['strRol'];	

						echo "<script>
								Swal.fire({
								icon: 'success',
								title: 'Logueo...!',
								text: 'Usuario Logueado correctamente ADMIN.', 
								confirmButtonText: 'Continuar a la página Principal.',
								}).then((result) => {
									  if (result.isConfirmed) {
										  window.location.href = 'Principal_Admin.php'
									  }
								  });
							</script>"; 	
				} else {
					echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'ERROR',
						text: 'El usuario no es Administrador.', 
						confirmButtonText: 'Volver a intentar.',
						}).then((result) => {
							  if (result.isConfirmed) {
								  window.location.href = 'Login_Admin.php'
							  }
						  });
					</script>"; 
				}				
			} else {
				echo "<script>
					Swal.fire({
					icon: 'error',
					title: 'ERROR',
					text: 'Contraseña incorrecta.', 
					confirmButtonText: 'Volver a intentar.',
					}).then((result) => {
						  if (result.isConfirmed) {
							  window.location.href = 'Login_Admin.php'
						  }
					  });
				</script>"; 
			}
		} else {
			echo "<script>
					Swal.fire({
					icon: 'error',
					title: 'ERROR',
					text: 'Usuario incorrecto.', 
					confirmButtonText: 'Volver a intentar.',
					}).then((result) => {
						  if (result.isConfirmed) {
							  window.location.href = 'Login.php'
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
		<title>METALCO</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<!--<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
		<link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS -->
	</head>

	<body>	
		<!-- Navbar con navegación y botones de Sign In / Log In -->
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
						<li class="nav-item"><a class="nav-link" id="logInBtnNavbar" href="Index.php">Volver al Inicio</a></li>
					</ul>
				</div>				
			</div>
		</nav>
		
		<!-- Modal de Autenticación (Log In)  -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="Login_Label" class="modal-title">Autenticación</h5>
				</div>
				<div class="modal-body">
					<form id="Login" method="post" action="Login_Admin.php">
						<div id="email" class="mb-3">
							<label class="form-label">Correo Electrónico</label>
							<input type="email" name="correo" id="correo" class="form-control" required>
						</div>
						<div id="password" class="mb-3">
							<label class="form-label">Contraseña</label>
							<input type="password" name="contraseña" id="contraseña" class="form-control" required>
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