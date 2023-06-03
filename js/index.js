const catalogo = construyeCatalogo();
const contenedorTarjetas = document.getElementsByClassName("tarjetas")[0];
const correoAlumno = document.getElementById('correo-user').textContent;

function construyeCatalogo() {
    const cat = new Catalogo();
    fetch("profesores.php")
        .then((res) => res.json())
        .then((res) => {
            console.log(res);
            for (const profe of res) {
                const profesor = new Profesor(
                    profe.id,
                    profe.email,
                    profe.nombre,
                    profe.nivel,
                    profe.descripcion,
                    profe.passwd
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
        const id = lista[i].idProf;
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
        const cardBody = document.createElement("div");
        cardBody.classList.add("card-body");
        const link = document.createElement("a");
        link.classList.add("card-link");
        link.setAttribute("onclick", `contactar(${id})`);
        link.textContent = "Contactar";

        cardBody.append(link);
        listaTexto.append(nombre);
        listaTexto.append(nivel);
        listaTexto.append(desc);
        tarjeta.append(listaTexto);
        tarjeta.append(cardBody);
        contenedorTarjetas.append(tarjeta);
    }
};

const contactar = (id) => {
    var formData = new FormData();
    formData.append("id", id);
    formData.append("correo", correoAlumno);
    fetch("contactar.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((res) => {
            console.log(res);
            /* if(res === true){
                window.location.href = "cuenta_alumno.php";
            } */
        })
        .catch((error) => console.log(error));
};

setTimeout(crearTarjetas, 300);
