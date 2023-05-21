const catalogo = construyeCatalogo();
const contenedorTarjetas = document.getElementsByClassName("tarjetas")[0];

function construyeCatalogo() {
    const cat = new Catalogo();
    fetch("php/profesores.php")
        .then((res) => res.json())
        .then((res) => {
            for (const profe of res) {
                const profesor = new Profesor(
                    profe.id,
                    profe.email,
                    profe.nombre,
                    profe.nivel,
                    profe.descripcion
                );
                cat.addProfe(profesor);
            }
        })
        .catch((error) => console.log(error));

    return cat;
}

const crearTarjetas = () => {
    let lista = catalogo.listaProfesores;

    for (let i = 0; i < lista.length; i++) {
        console.log(lista[i]);
        const tarjeta = document.createElement("div");
        tarjeta.classList.add("card", "tarjeta");
        const listaTexto = document.createElement("ul");
        listaTexto.classList.add("list-group", "list-group-flush");
        const nombre = document.createElement("li");
        nombre.classList.add("list-group-item", "nombre-tarjeta");
        nombre.textContent = lista[i].nombreProf;
        const nivel = document.createElement("li");
        nivel.classList.add("list-group-item", "nivel-tarjeta");
        nivel.textContent = lista[i].nivelProf;
        const desc = document.createElement("li");
        desc.classList.add("list-group-item", "desc-tarjeta");
        desc.textContent = lista[i].descProf;

        listaTexto.append(nombre);
        listaTexto.append(nivel);
        listaTexto.append(desc);
        tarjeta.append(listaTexto);
        contenedorTarjetas.append(tarjeta);
    }
};

setTimeout(crearTarjetas, 100);
{
    /* <div class="card tarjeta">
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
</div>; */
}
