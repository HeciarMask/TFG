<?php
require_once 'bd.php';
if (isset($_POST["correo"])) {
    $tipo = $_POST['tipo'];
    if ($tipo === "alumno") {
        $usu = crear_alumno($_POST['correo'], $_POST['clave'], $_POST['nombre'], $_POST['nivel']);
    } elseif ($tipo === "profe") {
        $usu = crear_profesor($_POST['correo'], $_POST['clave'], $_POST['nombre'], $_POST['nivel']);
    } else {
        $usu = FALSE;
        $err = TRUE;
        $correo = $_POST['correo'];
    }
    session_start();
    if ($usu == TRUE) {
        $_SESSION['correo'] = $usu['email'];
        $_SESSION['tipo'] = $tipo;
        header("Location: index.php");
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
            echo "<p> Ese correo esta registrado o ha ocurrido un problema</p>";
        } ?>
        <form name="regForm" id="regForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
                <select name="nivel" id="nivel">
                    <option selected value="todo">Cualquiera</option>
                    <option value="uni">Universidad</option>
                    <option value="gsup">Grado Superior</option>
                    <option value="gmed">Grado Medio</option>
                    <option value="bach">Bachillerato</option>
                    <option value="eso">ESO</option>
                    <option value="prim">Primaria</option>
                </select>
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
            <input type="button" id="submitReg" value="Registrarse">
        </form>
        <a href="index.php">Iniciar Sesión</a>
    </div>
    <script src="js/registro.js"></script>
</body>

</html>