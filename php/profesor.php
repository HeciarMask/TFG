<?php
require_once 'datos.php';

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";


$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
extract($_POST);

$sql1 = "SELECT * FROM usuarios WHERE email = '$correo'";
$resul1 = mysqli_query($conn, $sql1);
$usuario = $resul1->fetch_assoc();

echo json_encode($usuario);