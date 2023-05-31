<?php
require_once '../datos.php';

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";


$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
$idDest = $_POST['id'];
$correo = $_POST['correo'];

$sql1 = "SELECT id FROM usuarios WHERE email = '$correo'";
$resul1 = mysqli_query($conn, $sql1);
$usuario = $resul1->fetch_assoc();

$sql2 = "INSERT INTO chats (id_remitente, id_destinatario, msg) VALUES ('" . $usuario['id'] . "', '$idDest', '¿Contactamos?')";
$resul2 = mysqli_query($conn, $sql2);

echo json_encode($resul2);
