<?php
$servername = "http://35.170.24.161";

$conn = mysqli_connect($servername, "root", "aFlopez.728", "barrionuevo");
extract($_POST);

$sql1 = "SELECT id FROM usuarios WHERE email = '$email'";
$resul1 = mysqli_query($conn, $sql1);
$usuario = $resul1->fetch_assoc();
$userId = $usuario['id'];

$sql2 = "SELECT * FROM chats WHERE id_remitente='$userId' OR id_destinatario='$userId'";
$resul2 = mysqli_query($conn, $sql2);
$mensajes = array(array(array()));

while ($fila = $resul2->fetch_assoc()) {
    if ($fila['id_remitente'] == $userId) {
        $mensajes[$fila['id_destinatario']][$fila['id']]["saliente"] = $fila["msg"];
    } else if ($fila['id_destinatario'] == $userId) {
        $mensajes[$fila['id_remitente']][$fila['id']]["entrante"] = $fila["msg"];
    }
}

echo json_encode($mensajes);
