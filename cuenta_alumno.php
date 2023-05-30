<?php
require 'php/sesiones.php';
require_once 'bd.php';
comprobar_sesion();
$contactos = obtener_contactos($_SESSION['correo']);
$mensajes = obtener_mensajes($_SESSION['correo']);
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
                <a class="navbar-brand" href="#">Enseñanzas Barrionuevo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="catalogo.php">Encontrar profesor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cuenta_profesor.php">Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' id="correo-user" disabled><?php echo $_SESSION['correo'] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                            Perfil
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                            Contactos
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <h2>Perfil</h2>
                        <div class="contacto-form">
                            <form action="" name="perfilForm">
                                <ul>
                                    <li>
                                        <label for="id-nombre">Nombre:</label>
                                        <input type="text" name="nombre" id="id-nombre" />
                                    </li>
                                    <li>
                                        <label for="id-desc">Descripción:</label>
                                        <textarea name="desc" id="id-desc" cols="30" rows="10"></textarea>
                                    </li>
                                    <li>
                                        <label for="id-nivel">Nivel educativo:</label>
                                        <select name="nivel" id="id-nivel">
                                            <option value="uni">Universidad</option>
                                            <option value="grad">Grados</option>
                                            <option value="bach">Bachillerato</option>
                                            <option value="eso">ESO</option>
                                            <option value="prim">Primaria</option>
                                        </select>
                                    </li>
                                    <li>
                                        <label for="id-passwd">Cambiar contraseña:</label>
                                        <input type="password" name="passwd" id="id-passwd" />
                                    </li>
                                </ul>
                                <input type="submit" value="Modificar">
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade show active contactos-tab" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <div class="contactos">
                            <div class="row lista-contactos">
                                <div class="row lista-header">Lista</div>
                                <div class="row lista-body">
                                    <?php
                                    foreach ($contactos as $contacto) {
                                        echo "<div id='" . $contacto['id'] . "' class='col-12 contacto'>" . $contacto['nombre'] . "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row chat-box">
                                <div class="row chat-header">Contacto</div>
                                <div class="row chat-body">
                                    <div class="col-12 row chat-mensajes">
                                        <div class="row mensaje">
                                            <div class="mensaje-entrante">
                                                Claro puedo a partir de las 6
                                            </div>
                                        </div>
                                        <div class="row mensaje">
                                            <div class="mensaje-saliente">
                                                Te importa si tenemos clase esta tarde?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 chat-input row">
                                        <input type="text" name="texto" id="input-texto" placeholder="Escribe aqui ..." />
                                        <input type="button" value=">" id="input-button" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/clases.js"></script>
    <script src="js/cuenta.js"></script>
</body>

</html>