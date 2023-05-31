<?php
require_once '../datos.php';

$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
extract($_POST);

$sql1 = "SELECT id FROM usuarios WHERE email = '$email'";
$resul1 = mysqli_query($conn, $sql1);
$usuario = $resul1->fetch_assoc();
$userId = $usuario['id'];

$sql2 = "INSERT INTO chats (id_remitente, id_destinatario, msg) VALUES ('$userId', '$id', '$msg')";
$resul2 = mysqli_query($conn, $sql2);

echo json_encode($resul2);