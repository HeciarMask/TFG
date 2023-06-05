<?php
require_once '../datos.php';

if (!isset($_POST)) {
    return False;
}

$username = "root";
$password = "aFlopez.728"; // Contraseña: aFlopez.728
$basedatos = "barrionuevo";
$id = $_POST['id'];

$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");

$sql = "DELETE FROM usuarios WHERE id='$id'";
$result=$conn->query($sql);

$sql2 = "DELETE FROM chats WHERE id_remitente='$id' OR id_destinatario='$id'";
$result2=$conn->query($sql2);

echo json_encode($result);