<?php
require_once '../bd.php';
session_start();
if (isset($_POST["correo"])) {
    $usu = comprobar_admin($_POST['correo'], $_POST['clave']);

    if ($usu === false) {
        $err = true;
        $correo = $_POST['correo'];
    } else {
        $_SESSION['correo'] = $usu['email'];
        $_SESSION['tipo'] = $usu['tipo'];
        header("Location: admin.php");
        return;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../login.css" />
</head>

<body>
    <div class="login">
        <h1>Admin</h1>
        <?php if (isset($_GET["redirigido"])) {
            echo "<p>Haga login para continuar," . $_SESSION['tipo'] . "</p>";
        } ?>
        <?php if (isset($err) and $err == true) {
            echo "<p> Revise correo y contraseña," . $_SESSION['tipo'] . "</p>";
        } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="campo">
                <label for="correo">Correo</label>
                <input value="<?php if (isset($correo)) echo $correo; ?>" id="correo" name="correo" type="text">
            </div>
            <div class="campo">
                <label for="clave">Clave</label>
                <input id="clave" name="clave" type="password">
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>