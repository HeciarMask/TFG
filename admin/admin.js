const borrarUsuario = (id) => {
    var formData = new FormData();
    formData.append("id", id);
    fetch("borrar.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((res) => {
            if(res === true){
                location.reload();
            }
        })
        .catch((error) => console.log(error));
};
