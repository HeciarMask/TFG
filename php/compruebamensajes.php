<?php
$servername = "localhost";
$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";

session_start();
$correo = $_SESSION['correo'];

$conn = mysqli_connect("localhost", "root", "aFlopez.728", "barrionuevo");

$sql1 = "SELECT id FROM usuarios WHERE email='$correo'";

$result1 = $conn -> query($sql1);
$fila = $result1 -> fetch_assoc();
echo json_encode($fila['id']);
/*

$sql2 = mysqli_query($conn, "SELECT * FROM chats WHERE id_remitente=$id OR id_destinatario=$id");
$result = mysqli_fetch_all($sql2, MYSQLI_ASSOC);

echo json_encode($result); */