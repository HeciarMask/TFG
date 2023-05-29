<?php
$servername = "localhost";
$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";


$conn = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");
extract($_POST);

$sql1 = "SELECT id FROM usuarios WHERE email = '$correo'";
$resul1 = mysqli_query($conn, $sql1);
$usuario = $resul1->fetch_assoc();
$id = $usuario['id'];

$sql2 = "UPDATE usuarios SET nombre='$nombre', descripcion='$desc', nivel='$nivel', passwd='$clave' WHERE id='$id'";
$resul2 = mysqli_query($conn, $sql2);

echo json_encode($resul2);
