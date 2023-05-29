const correoUser = document.getElementById("correo-user").textContent;

const modificarCuenta = (event) => {
    event.preventDefault();
    const nombre = perfilForm.nombre.value;
    const desc = perfilForm.desc.value;
    const nivel = perfilForm.nivel.value;
    const clave = perfilForm.passwd.value;
    var formData = new FormData();
    formData.append("correo", correoUser);
    formData.append("nombre", nombre);
    formData.append("desc", desc);
    formData.append("nivel", nivel);
    formData.append("clave", clave);
    fetch("php/modificar.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((res) => {
            console.log(res);
        })
        .catch((error) => console.log(error));
};

const abrirChat = (event) => {};

const agregaInfo = (profesor) => {
    perfilForm.nombre.value = profesor.nombreProf;
    perfilForm.desc.value = profesor.descProf;
    perfilForm.nivel.value = profesor.nivelProf;
    perfilForm.passwd.value = profesor.claveProf;
};

const pideInfo = () => {
    var formData = new FormData();
    formData.append("correo", correoUser);
    +fetch("php/profesor.php", {
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
            console.log(profesor);
            setInterval(agregaInfo(profesor), 300);
        })
        .catch((error) => console.log(error));
};

const contactos = document.getElementsByClassName("contacto");
for (const contacto of contactos) {
    contacto.addEventListener("click", abrirChat);
}
document.addEventListener("submit", modificarCuenta);

pideInfo();
