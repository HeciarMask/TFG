<?php
require 'php/sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="estilo.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand navbar-titulo" href="#">Enseñanzas Barrionuevo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="catalogo.php">Encontrar profesor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cuenta_alumno.php">Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <div id="correo-user"><?php echo $_SESSION['correo'] ?></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="contenido">
                <div class="row filtros">
                    <div class="filtro">
                        <div class="filtro-tittle">
                            Nivel:
                        </div>
                        <div class="filtro-value">
                            <select name="nivel" id="id_nivel">
                                <option value="todo">Cualquiera</option>
                                <option value="uni">Universidad</option>
                                <option value="grad">Grados</option>
                                <option value="bach">Bachillerato</option>
                                <option value="eso">ESO</option>
                                <option value="prim">Primaria</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="catalogo">
                    <div class="row tarjetas">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/clases.js"></script>
    <script src="js/index.js"></script>
</body>

</html>