<?php
require_once 'bd.php';
if (isset($_POST["correo"])) {
    $tipo = $_POST['tipo'];
    if ($tipo === "alumno") {
        $usu = comprobar_alumno($_POST['correo'], $_POST['clave']);
    } elseif ($tipo === "profe") {
        $usu = comprobar_profesor($_POST['correo'], $_POST['clave']);
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
            header("Location: cuenta_profesor.html");
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
</head>

<body>
    <?php if (isset($_GET["redirigido"])) {
        echo "<p>Haga login para continuar</p>";
    } ?>
    <?php if (isset($err) and $err == true) {
        echo "<p> Revise correo y contraseña</p>";
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="correo">Correo</label>
        <input value="<?php if (isset($correo)) echo $correo; ?>" id="correo" name="correo" type="text">
        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">
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
        <input type="submit">
    </form>
</body>

</html>