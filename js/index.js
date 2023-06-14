const catalogo = construyeCatalogo();
const contenedorTarjetas = document.getElementsByClassName("tarjetas")[0];
const correoAlumno = document.getElementById("correo-user").textContent;
const nivelSel = document.getElementById('id_nivel');

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
    contenedorTarjetas.innerHTML = '';
    let lista = catalogo.listaProfesores;

    for (let i = 0; i < lista.length; i++) {
        if (nivelSel.value !== lista[i].nivelProf && nivelSel.value !== 'todo') {
            console.log(nivelSel.value);
            continue;
        }
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
        const nivelValue = lista[i].nivelProf;
        switch (nivelValue) {
            case "uni":
                nivel.textContent = "Universidad";
                break;
            case "gsup":
                nivel.textContent = "Grado Superior";
                break;
            case "gmed":
                nivel.textContent = "Grado Medio";
                break;
            case "bach":
                nivel.textContent = "Bachillerato";
                break;
            case "eso":
                nivel.textContent = "ESO";
                break;
            case "prim":
                nivel.textContent = "Primaria";
                break;
            default:
                nivel.textContent = "Cualquiera";
                break;
        }

        const desc = document.createElement("li");
        desc.classList.add("list-group-item", "desc-tarjeta");
        desc.textContent = lista[i].descProf;
        const cardBody = document.createElement("div");
        cardBody.classList.add("card-body");
        cardBody.setAttribute("onclick", `contactar(${id})`);
        const link = document.createElement("a");
        link.classList.add("card-link");
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
            alert('Profesor contactado, la conversación a comenzado.');
        })
        .catch((error) => console.log(error));
};

setTimeout(crearTarjetas, 500);
nivelSel.addEventListener('change', crearTarjetas);
