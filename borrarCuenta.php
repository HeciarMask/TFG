<?php
require_once 'datos.php';

if (!isset($_POST)) {
    return False;
}

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";
$email = $_POST['correo'];

$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");

$sql1 = "SELECT id FROM usuarios WHERE email = '$email'";
$resul1 = $conn->query($sql1);
$usuario = $resul1->fetch_assoc();
$userId = $usuario['id'];

$sql = "DELETE FROM usuarios WHERE id='$userId'";
$result = $conn->query($sql);

$sql2 = "DELETE FROM chats WHERE id_remitente='$userId' OR id_destinatario='$userId'";
$result2 = $conn->query($sql2);

echo json_encode($result);
