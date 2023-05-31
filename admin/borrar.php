<?php
require_once 'datos.php';

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

echo json_encode($result);