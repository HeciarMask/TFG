const correoUser = document.getElementById("correo-user").textContent;
let seleccionado = null;
let idSel = null;
const chat = document.getElementsByClassName("chat-mensajes")[0];
const inputText = document.getElementById("input-texto");
const inputBtn = document.getElementById("input-button");

const modificarCuenta = (event) => {
    event.preventDefault();
    const nombre = perfilForm.nombre.value;
    const desc = perfilForm.desc.value;
    const nivel = perfilForm.nivel.value;
    const clave = perfilForm.passwd.value;
    const formData = new FormData();
    formData.append("correo", correoUser);
    formData.append("nombre", nombre);
    formData.append("desc", desc);
    formData.append("nivel", nivel);
    formData.append("clave", clave);
    fetch("modificar.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((res) => {
            console.log(res);
        })
        .catch((error) => console.log(error));
};

const montarMensajes = (contacts) => {
    console.log(idSel);
    for (const key of Object.keys(contacts)) {
        if (key == idSel) {
            for (const msg of Object.values(contacts[key])) {
                if (msg.saliente !== undefined) {
                    const rowMsg = document.createElement("div");
                    const salMsg = document.createElement("div");
                    rowMsg.classList.add("row", "mensaje");
                    salMsg.classList.add("mensaje-saliente");
                    console.log(msg.saliente);
                    salMsg.textContent = msg.saliente;
                    rowMsg.append(salMsg);
                    chat.prepend(rowMsg);
                } else {
                    const rowMsg = document.createElement("div");
                    const entMsg = document.createElement("div");
                    rowMsg.classList.add("row", "mensaje");
                    entMsg.classList.add("mensaje-entrante");
                    entMsg.textContent = msg.entrante;
                    rowMsg.append(entMsg);
                    chat.prepend(rowMsg);
                }
            }
        }
    }
};

const abrirChat = (event) => {
    chat.innerHTML = "";
    seleccionado.classList.remove("selected");
    seleccionado = event.currentTarget;
    seleccionado.classList.add("selected");
    idSel = seleccionado.id;
    const formData = new FormData();
    formData.append("email", correoUser);
    fetch("mensajes.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((res) => {
            console.log(res);
            montarMensajes(res);
        })
        .catch((error) => console.log(error));
};

const enviarMsg = () => {
    if (inputText.value !== "") {
        const rowMsg = document.createElement("div");
        const salMsg = document.createElement("div");
        rowMsg.classList.add("row", "mensaje");
        salMsg.classList.add("mensaje-saliente");
        console.log(inputText.value);
        salMsg.textContent = inputText.value;
        rowMsg.append(salMsg);
        chat.prepend(rowMsg);
        const formData = new FormData();
        formData.append("email", correoUser);
        formData.append("id", idSel);
        formData.append("msg", inputText.value);
        fetch("enviarMensaje.php", {
            method: "POST",
            body: formData,
        })
            .then((res) => res.json())
            .then((res) => {
                console.log(res);
            })
            .catch((error) => console.log(error));
    }
};

const agregaInfo = (profesor) => {
    perfilForm.nombre.value = profesor.nombreProf;
    perfilForm.desc.value = profesor.descProf;
    perfilForm.nivel.value = profesor.nivelProf;
    perfilForm.passwd.value = profesor.claveProf;
};

const pideInfo = () => {
    var formData = new FormData();
    formData.append("correo", correoUser);
    fetch("profesor.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((res) => {
            const profesor = new Profesor(
                res.id,
                res.email,
                res.nombre,
                res.nivel,
                res.descripcion,
                res.passwd
            );
            setInterval(agregaInfo(profesor), 500);
        })
        .catch((error) => console.log(error));
};

const contactos = document.getElementsByClassName("contacto");

for (const contacto of contactos) {
    contacto.addEventListener("click", abrirChat);
}

if (contactos !== null) {
    seleccionado = contactos[0];
    seleccionado.classList.add("selected");
    idSel = seleccionado.id;
    seleccionado.click();
}

document.addEventListener("submit", modificarCuenta);
inputBtn.addEventListener("click", enviarMsg);

pideInfo();
