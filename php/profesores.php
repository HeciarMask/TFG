<?php
require_once 'datos.php';

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";

$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");

$sql = "SELECT * FROM usuarios WHERE tipo='profe'";
$resul = mysqli_query($conn, $sql);

echo json_encode($resul);