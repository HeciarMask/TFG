<?php
require_once 'datos.php';

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";

$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");

$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE tipo='profe'");
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

echo json_encode($result);