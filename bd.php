<?php

$servername = "localhost";
$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";

$conn = mysqli_connect("localhost", "root", $password, "barrionuevo");

function comprobar_profesor($email, $clave)
{
	$bd = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");
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
}

function comprobar_alumno($email, $clave)
{
	$bd = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");
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
	$bd = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");
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

