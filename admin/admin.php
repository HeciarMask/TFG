<?php
require_once '../bd.php';
session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: index.php?redirigido=true");
}

$usuarios = obtener_usuarios();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <a href="../index.php" id="cerrar">Cerrar Sesión</a>
    <div class="lista">
        <table>
            <tr>
                <td>Correo</td>
                <td>Nombre</td>
                <td>Tipo</td>
                <td>Borrar</td>
            </tr>
            <?php
            foreach ($usuarios as $usuario) {
                $id = $usuario['id'];
                echo "
                <tr>
                    <td>" . $usuario['email'] . "</td>
                    <td>" . $usuario['nombre'] . "</td>
                    <td>" . $usuario['tipo'] . "</td>
                    <td><input type='button' value='Borrar' onclick='borrarUsuario($id)'></td>
                </tr>";
            }
            ?>
        </table>
    </div>
    <script src="admin.js"></script>
</body>

</html>