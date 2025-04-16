<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body style="background-color: green;">
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: principal.php");
    exit();
}

echo "Bienvenido, " . $_SESSION['usuario'] . "!<br>";


?>





<h2 align="center"><a href='index.php'>***Regresar a Login***</a></h2>


</body>
</html>