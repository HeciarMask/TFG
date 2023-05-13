cargarProfesores();

function cargarProfesores() {
    fetch("php/profesores.php")
        .then((res) => res.json())
        .then(construyeCatalogo)
        .catch((error) => console.log(error));
}

function construyeCatalogo(profesores) {
    const tarjeta = document.createElement("div");
    tarjeta.classList.add("card", "tarjeta");
}

<div class="card tarjeta">
    <div class="img-tarjeta">
        <img
            src="https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg"
            class="card-img-top"
            alt="..."
        />
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item nombre-trajeta">Raúl Rodriguez</li>
        <li class="list-group-item nivel-tarjeta">Bachillerato</li>
        <li class="list-group-item desc-tarjeta">
            Estoy preparado para dar clases tanto en Bachillerato como en grado medio.
        </li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">
            Card link
        </a>
    </div>
</div>;
