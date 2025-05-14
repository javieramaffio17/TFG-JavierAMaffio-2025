<?php			
	include 'conexion.php';
	include 'sweetAlert.php';
	
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {			
		$accion = $_POST['ACCION'];
		
		if ($accion === "buscar") {		
			// Obtiene los datos del formulario
			$strID_Equipo = trim($_POST['strID_Equipo']);

			$sql = "SELECT * FROM equipos WHERE strID_Equipo='$strID_Equipo'";
			$result = $conn->query($sql);
			
			echo "<script>console.log('Debug Objects: " . $sql . "' );</script>";

			if ($result->num_rows > 0) {
				echo "<script>console.log('Debug Objects: entra if' );</script>";
				$row = $result->fetch_assoc();	

				echo "<script>
						Swal.fire({
						icon: 'success',
						title: 'Busqueda...',
						text: 'El Equipo Se Encontró.', 
						confirmButtonText: 'Aceptar.',
						}).then((result) => {						 
						  });
					</script>"; 	
	
				// Obtiene los datos del formulario
				$strID_Equipo = trim($row['strID_Equipo']);
				$strSerie = trim($row['strSerie']);
				$strModelo = trim($row['strModelo']);
				$strDescripcion = trim($row['strDescripcion']);
				$strCondicion = trim($row['strCondicion']);
			} else {
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'ERROR',
						text: 'El Equipo No Se Encontró.', 
						confirmButtonText: 'Volver a intentar.',
						}).then((result) => {
							  if (result.isConfirmed) {
								  window.location.href = 'Asignar_Equipo_Usuario.php'
							  }
						  });
					</script>"; 	
			}
		} else if ($accion === "asignar") {
			// Obtiene los datos del formulario
			$strID_Equipo = $_POST['strID_Equipo_Asignar'];
			$strID_Usuario = $_POST['strID_Usuario'];
			$dtFechaAsignacion = $_POST['dtFechaAsignacion'];			
			
			// Prepara la consulta SQL para insertar un nuevo usuario
			$sql = "UPDATE equipos SET `strID_Usuario`='$strID_Usuario', `dtFechaAsignacion`='$dtFechaAsignacion' WHERE strID_Equipo='$strID_Equipo'";

			// Ejecuta la consulta
			if ($conn->query($sql) === TRUE) {	
				echo "<script>
						Swal.fire({
						icon: 'success',
						title: 'Registro...!',
						text: 'Equipo Asignado Exitosamente.', 
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
						text: 'El Equipo No Se Asignó correctamente.', 
						confirmButtonText: 'Volver a intentar.',
						}).then((result) => {
							  if (result.isConfirmed) {
								  window.location.href = 'Asignar_Equipo_Usuario.php'
							  }
						  });
					</script>"; 	
			}
			
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
						<li class="nav-item"><a class="nav-link" id="logInBtnNavbar" href="Principal.php">Volver al Principal</a></li>
					</ul>
				</div>				
			</div>
		</nav>
		
		<!--  -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="Buscar_Label">Busqueda de Equipos</h5>
				</div>
				<div class="modal-body">
					<form id="Busqueda" method="post" action="Asignar_Equipo_Usuario.php">
						<input type="hidden" id="ACCION" name="ACCION" value="buscar" />
						<div id="strID_EquipoField" class="mb-3">
							<label class="form-label">ID Equipo</label>
							<input type="text" name="strID_Equipo" id="strID_Equipo" class="form-control" value="<? echo $strID_Equipo; ?>">
						</div>
						<div id="strSerieField" class="mb-3">
							<label class="form-label">Serie</label>
							<input type="text" name="strSerie" id="strSerie" class="form-control" value="<? echo $strSerie; ?>" style="background-color: lightgray;" readonly>
						</div>						
						<div id="strModeloField" class="mb-3">
							<label class="form-label">Modelo</label>
							<input type="text" name="strModelo" id="strModelo" class="form-control" value="<? echo $strModelo; ?>" style="background-color: lightgray;" readonly>
						</div>
						<div id="strDescripcionField" class="mb-3">
							<label class="form-label">Descripcion</label>
							<input type="text" name="strDescripcion" id="strDescripcion" class="form-control" value="<? echo $strDescripcion; ?>" style="background-color: lightgray;" readonly>
						</div>	
						<div id="strCondicionField" class="mb-3">
							<label class="form-label">Condicion</label>
							<input type="text" name="strCondicion" id="strCondicion" class="form-control" value="<? echo $strCondicion; ?>" style="background-color: lightgray;" readonly>
						</div>	
						<button type="submit" class="btn btn-primary w-100">Buscar Equipo</button>
					</form>
				</div>
			</div>
		</div>
		
		<!--  -->
		<div class="container">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="Buscar_Label">Asignar Equipo a Usuario</h5>
				</div>
				<div class="modal-body">
					<form id="Busqueda" method="post" action="Asignar_Equipo_Usuario.php">
						<input type="hidden" id="ACCION" name="ACCION" value="asignar" />
						<input type="hidden" id="strID_Equipo_Asignar" name="strID_Equipo_Asignar" value="<? echo $strID_Equipo; ?>" required/>
						<div id="strID_UsuarioField" class="mb-3">
							<label class="form-label">ID_Usuario</label>
							<select class="form-select" name="strID_Usuario" id="strID_Usuario" required>
								<option value="" disabled selected>Elige un usuario</option>
								<?php   
									require 'conexion.php';

									$sql2 = "select * from usuarios order by strID_Usuario asc";
									$result = $conn->query($sql2);	

									while($row = $result->fetch_assoc())
									{   
										$strID_Usuario = $row['strID_Usuario'];
										$strNombre = $row['strNombre'];
										$strApellidos = $row['strApellidos'];								
										echo "<option value='$strID_Usuario'>$strNombre  $strApellidos</option>";
									}
								?>
							</select>
						</div>
						<div id="dtFechaAsignacionField" class="mb-3">
							<label class="form-label">Fecha Asignacion</label>
							<input type="date" name="dtFechaAsignacion" id="dtFechaAsignacion" class="form-control" required>	
						</div>										
						<button type="submit" class="btn btn-primary w-100">Asignar Equipo a Usuario</button>
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