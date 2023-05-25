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

const contactar = () => {}


setTimeout(crearTarjetas, 100);
