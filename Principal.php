<?php	
	include 'conexion.php';
	include 'sweetAlert.php';
		
	session_start();

	echo "<script>console.log('Debug Objects: " . $_SESSION['strID_Usuario'] . "' );</script>";
	echo "<script>console.log('Debug Objects: " . $_SESSION['nroEmpleado'] . "' );</script>";
	echo "<script>console.log('Debug Objects: " . $_SESSION['strNombre'] . "' );</script>";
	echo "<script>console.log('Debug Objects: " . $_SESSION['strApellidos'] . "' );</script>";
	echo "<script>console.log('Debug Objects: " . $_SESSION['strEmail'] . "' );</script>";
	echo "<script>console.log('Debug Objects: " . $_SESSION['strRol'] . "' );</script>";
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
						<li class="nav-item"><a class="nav-link" id="logInBtnNavbar" href="Index.php">Volver al Inicio</a></li>
					</ul>
				</div>				
			</div>
		</nav>
		
		<!-- Modal de Opciones Iniciales -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Sistema de Inventario de Portátiles</h5>
				</div>
				<div class="modal-body">
					<button id="botonAdminitrados" class="btn btn-primary w-100 mb-2" onclick="location.href='Registro_Equipos.php'">Registro de Equipos</button>
					<button id="BotonUsuario" class="btn btn-success w-100 mb-2" onclick="location.href=''">Busqueda de Equipos</button>
					<button id="BotonUsuario" class="btn btn-primary w-100 mb-2" onclick="location.href=''">Estado de los Equipos</button>
					<button id="BotonUsuario" class="btn btn-success w-100 mb-2" onclick="location.href=''">Gestor de Averías</button>
					<button id="BotonUsuario" class="btn btn-primary w-100 mb-2" onclick="location.href=''">Reporte de Averías</button>
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
