const validar = (event) => {
    const correo = regForm.correo.value;
    const clave = regForm.clave.value;
    const nombre = regForm.nombre.value;
    const nivel = regForm.nivel.value;
    const tipo = regForm.tipo.value;

    const testCorreo = /^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/;
    const testClave = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=*?[#?!@$ %^&*-]).{6,}$/;
    const testNombre =
        /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;

    if (correo === "" || clave === "" || nombre === "" || nivel === "" || tipo === "") {
        event.preventDefault();
        alert("Complete todos los campos");
    } else if(!testCorreo.test(correo) || !testClave.test(clave) || !testNombre.test(nombre)){
        event.preventDefault();
        let error = "Error de validación:\n";
        error += `Correo: ${testCorreo.test(correo)}\n`;
        error += `Clave: ${testClave.test(clave)}\n`;
        error += `Nombre: ${testNombre.test(nombre)}\n`;
        alert(error);
    }
};

document.addEventListener("submit", validar);
