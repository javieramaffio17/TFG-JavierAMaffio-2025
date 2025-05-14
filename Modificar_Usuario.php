<?php			
	include 'conexion.php';
	include 'sweetAlert.php';
	
	session_start();

	$accion = $_POST['ACCION'];
	$strID_Usuario = "";
		
	if ($accion === "buscar") {
		// Obtiene los datos del formulario
		$strID_Usuario = trim($_POST['strID_Usuario']);

		$sql = "SELECT * FROM usuarios WHERE strID_Usuario='$strID_Usuario'";
		$result = $conn->query($sql);
		
		echo "<script>console.log('SQL: " . $sql . "' );</script>";

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();	

			echo "<script>
					Swal.fire({
					icon: 'success',
					title: 'Busqueda...',
					text: 'El Usuario Se Encontró.', 
					confirmButtonText: 'Aceptar.',
					}).then((result) => {						 
					});
				</script>"; 	

			// Obtiene los datos del formulario
			$strID_Usuario = trim($row['strID_Usuario']);
			$nroEmpleado = trim($row['nroEmpleado']);
			$strNombre = trim($row['strNombre']);
			$strApellidos = trim($row['strApellidos']);
			$strEmail = trim($row['strEmail']);
			$strRol = trim($row['strRol']);
			$dtFecha = trim($row['dtFecha']);
		} else {
			echo "<script>
					Swal.fire({
					icon: 'error',
					title: 'ERROR',
					text: 'El Usuario No Se Encontró.', 
					confirmButtonText: 'Volver a intentar.',
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.href = 'Modificar_Usuario.php'
						}
					});
				</script>"; 	
		}
	} else if ($accion === "agregar") {
		// Obtiene los datos del formulario
		$strID_Usuario = trim($_POST['strID_Usuario_Modificar']);
		$nroEmpleado = trim($_POST['nroEmpleado']);
		$strNombre = trim($_POST['strNombre']);
		$strApellidos = trim($_POST['strApellidos']);
		$strEmail = trim($_POST['strEmail']);
		$strRol = trim($_POST['strRol']);
		$dtFecha = trim($_POST['dtFecha']);

		// Prepara la consulta SQL para insertar un nuevo usuario
		$sql = "UPDATE usuarios SET `nroEmpleado`=$nroEmpleado, `strNombre`='$strNombre', `strApellidos`='$strApellidos', `strEmail`='$strEmail', `strRol`='$strRol', `dtFecha`='$dtFecha' WHERE `strID_Usuario`='$strID_Usuario'";
		
		// Ejecuta la consulta
		if ($conn->query($sql) === TRUE) {	
			echo "<script>
						Swal.fire({
						icon: 'success',
						title: 'Registro...!',
						text: 'Usuario Modificado exitosamente.', 
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
					text: 'El Usuario No Se Modificó correctamente.', 
					confirmButtonText: 'Volver a intentar.',
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.href = 'Modificar_Usuario.php'
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
					<h5 id="Registrarse_Label">Modificar Usuario</h5>
				</div>
				<div class="modal-body">
					<form id="Buscar" method="post" action="Modificar_Usuario.php">
						<input type="hidden" id="ACCION" name="ACCION" value="buscar" />					
						<div id="strID_UsuarioField" class="mb-3">
							<label class="form-label">ID Usuario</label>
							<input type="text" name="strID_Usuario" id="strID_Usuario" class="form-control" value="<? echo $strID_Usuario; ?>" required>
						</div>
						<button type="submit" class="btn btn-primary w-100">Buscar</button>
					</form>
				</div>
			</div>
		</div>
		
		<!--  -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-body">
					<form id="Agregar" method="post" action="Modificar_Usuario.php">
						<input type="hidden" id="ACCION" name="ACCION" value="agregar" />
						<input type="hidden" id="strID_Usuario_Modificar" name="strID_Usuario_Modificar" value="<? echo $strID_Usuario; ?>" required/>
						<div id="nroEmpleadoField" class="mb-3">
							<label class="form-label">Número de Empleado</label>
							<input type="text" name="nroEmpleado" id="nroEmpleado" class="form-control" value="<? echo $nroEmpleado; ?>" required>
						</div>
						<div id="strNombreField" class="mb-3">
							<label class="form-label">Nombre</label>
							<input type="text" name="strNombre" id="strNombre" class="form-control" value="<? echo $strNombre; ?>" required>
						</div>
						<div id="strApellidosField" class="mb-3">
							<label class="form-label">Apellidos</label>
							<input type="text" name="strApellidos" id="strApellidos" class="form-control" value="<? echo $strApellidos; ?>" required>
						</div>
						<div id="strEmailField" class="mb-3">
							<label class="form-label">Email</label>
							<input type="email" name="strEmail" id="strEmail" class="form-control" value="<? echo $strEmail; ?>" required>
						</div>		
						<div id="strRolField" class="mb-3">
							<label class="form-label">Rol</label>
							<select name="strRol" id="strRol" required>
								<option value="">-- Seleccione el Rol --</option>
								<option value="Tecnico">Técnico</option>
								<option value="Empleado">Empleado</option>
								<option value="Administrador">Administrador</option>
							</select>
						</div>
						<div id="dtFechaField" class="mb-3">
							<label class="form-label">Fecha</label>
							<input type="date" name="dtFecha" id="dtFecha" class="form-control" value="<? echo $dtFecha; ?>" required>	
						</div>	
						<button type="submit" class="btn btn-primary w-100">Modificar</button>
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