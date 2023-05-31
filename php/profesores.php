<?php
require_once '../datos.php';

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";

$conn = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");
$profesores = array();

$sql = "SELECT * FROM usuarios WHERE tipo='profe'";
$resul = mysqli_query($conn, $sql);
while($fila = $resul->fetch_assoc()){
    $profesores[] = $fila;
}

echo json_encode($profesores);