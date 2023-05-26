<?php
require_once 'bd.php';
if (isset($_POST["correo"])) {
    $tipo = $_POST['tipo'];
    if ($tipo === "alumno") {
        $usu = crear_alumno($_POST['correo'], $_POST['clave'], $_POST['nombre'], $_POST['nivel']);
    } elseif ($tipo === "profe") {
        $usu = crear_profesor($_POST['correo'], $_POST['clave'], $_POST['nombre'], $_POST['nivel']);
    } {
    }
    if ($usu === false) {
        $err = true;
        $correo = $_POST['correo'];
    } else {
        session_start();
        $_SESSION['correo'] = $usu['email'];
        $_SESSION['tipo'] = $tipo;
        if ($tipo === "alumno") {
            header("Location: catalogo.html");
        } elseif ($tipo === "profe") {
            header("Location: cuenta_profesor.php");
        }
        return;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <div class="login">
        <h1>Enseñanzas Barrionuevo</h1>
        <?php if (isset($_GET["redirigido"])) {
            echo "<p>Haga login para continuar</p>";
        } ?>
        <?php if (isset($err) and $err == true) {
            echo "<p> Revise correo y contraseña</p>";
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
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" type="text">
            </div>
            <div class="campo">
                <label for="nivel">Nivel</label>
                <input id="nivel" name="nivel" type="text">
            </div>
            <fieldset class="elige-tipo">
                <legend>Selecciona tu tipo de usuario:</legend>
                <div class="tipo">
                    <label for="alumno">Alumno</label>
                    <input type="radio" name="tipo" id="alumno" value="alumno" checked>
                </div>
                <div class="tipo">
                    <label for="profe">Profesor</label>
                    <input type="radio" name="tipo" id="profe" value="profe">
                </div>
            </fieldset>
            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>

</html>