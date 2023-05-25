const correoUser = document.getElementById("corre-user");

const compruebaMensajes = () => {
    fetch("php/compruebamensajes.php")
        .then((res) => res.json())
        .then((res) => {
            console.log(res);
        })
        .catch((error) => console.log(error));
};

const intervaloMensajes = () => {
    setInterval(compruebaMensajes(), 5000);
};

intervaloMensajes();
