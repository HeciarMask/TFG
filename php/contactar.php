<?php
$servername = "localhost";
$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";

$conn = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");

$sql1 = "INSERT INTO chats WHERE email = '$email'";
$resul1 = mysqli_query($bd, $sql1);

echo json_encode($result);

$bd = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");
	$sql1 = "SELECT * FROM usuarios WHERE email = '$email'";
	$resul1 = mysqli_query($bd, $sql1);
	if ($fila = mysqli_fetch_assoc($resul1)) {
		return FALSE;
	} else {
		$sql2 = "INSERT INTO usuarios (email, passwd, nombre, nivel, tipo) VALUES ('$email','$clave','$nombre','$nivel','profe')";
		$result2 = mysqli_query($bd, $sql2);
		if (!$result2) {
			return FALSE;
		}
	}