<?php
require_once 'datos.php';

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";

$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");

function comprobar_profesor($email, $clave)
{
	global $servername;
	$bd = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
	$sql = "SELECT nombre, email FROM usuarios WHERE tipo='profe' AND email = '$email' 
			AND passwd = '$clave'";
	$resul = mysqli_query($bd, $sql);
	if ($fila = mysqli_fetch_assoc($resul)) {
		return $fila;
	} else {
		return FALSE;
	}
}

function crear_profesor($email, $clave, $nombre, $nivel)
{
	global $servername;
	$bd = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
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
}

function comprobar_alumno($email, $clave)
{
	global $servername;
	$bd = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
	$sql = "SELECT nombre, email FROM usuarios WHERE tipo='alumno' AND email = '$email' 
			AND passwd = '$clave'";
	$resul = mysqli_query($bd, $sql);
	if ($fila = mysqli_fetch_assoc($resul)) {
		return $fila;
	} else {
		return FALSE;
	}
}

function crear_alumno($email, $clave, $nombre, $nivel)
{
	global $servername;
	$bd = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
	$sql1 = "SELECT * FROM usuarios WHERE email = '$email'";
	$resul1 = mysqli_query($bd, $sql1);
	if ($fila = mysqli_fetch_assoc($resul1)) {
		return FALSE;
	} else {
		$sql2 = "INSERT INTO usuarios (email, passwd, nombre, nivel, tipo) VALUES ('$email','$clave','$nombre','$nivel','alumno')";
		$result2 = mysqli_query($bd, $sql2);
		if (!$result2) {
			return FALSE;
		}
	}
}

function comprobar_admin($email, $clave)
{
	global $servername;
	$bd = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
	$sql = "SELECT nombre, email FROM usuarios WHERE tipo='admin' AND email = '$email' 
			AND passwd = '$clave'";
	$resul = mysqli_query($bd, $sql);
	if ($fila = mysqli_fetch_assoc($resul)) {
		return $fila;
	} else {
		return FALSE;
	}
}

function obtener_usuarios()
{
	global $servername;
	$lista = array();
	$bd = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
	$sql = "SELECT * FROM usuarios WHERE NOT tipo='admin' ORDER BY email";
	$resul = mysqli_query($bd, $sql);
	while ($fila = $resul->fetch_assoc()) {
		$lista[] = $fila;
	}

	return $lista;
}

function obtener_contactos($email)
{
	global $servername;
	$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
	extract($_POST);

	$sql1 = "SELECT id FROM usuarios WHERE email = '$email'";
	$resul1 = mysqli_query($conn, $sql1);
	$usuario = $resul1->fetch_assoc();
	$userId = $usuario['id'];

	$sql2 = "SELECT * FROM chats WHERE id_remitente='$userId' OR id_destinatario='$userId'";
	$resul2 = mysqli_query($conn, $sql2);
	$contactos = array();

	while ($fila = $resul2->fetch_assoc()) {
		if ($fila['id_remitente'] == $userId && !in_array($fila['id_destinatario'], $contactos)) {
			$sql3 = "SELECT id, nombre, email FROM usuarios WHERE id = '" . $fila['id_destinatario'] . "'";
			$resul3 = mysqli_query($conn, $sql3);
			$contactos[] = $resul3->fetch_assoc();
		} else if ($fila['id_destinatario'] == $userId && !in_array($fila['id_remitente'], $contactos)) {
			$sql3 = "SELECT id, nombre, email FROM usuarios WHERE id = '" . $fila['id_remitente'] . "'";
			$resul3 = mysqli_query($conn, $sql3);
			$contactos[] = $resul3->fetch_assoc();
		}
	}

	return $contactos;
}


function comprobar_usuario($email) {
	global $servername;
	$bd = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$resul = mysqli_query($bd, $sql);
	if ($fila = mysqli_fetch_assoc($resul)) {
		return TRUE;
	} else {
		return FALSE;
	}
}