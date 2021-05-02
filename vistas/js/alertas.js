//Todos los formularios que se ingresen con peticion Ajax tendran el ID FormularioAjax
const formularios_ajax = document.querySelectorAll(".FormularioAjax");

//Envia la peticion al back, sin redireccionar
function enviar_formulario_ajax(e) {
    e.preventDefault();
}

formularios_ajax.forEach(formularios =>{
    //Escucha del formulario
    formularios.addEventListener("submit",enviar_formulario_ajax);
});

//recibir JSON o arreglo de datos
function alertas_akax(alerta) {
    //Accedemos al indicellamado Alterta que trae el tipo de alerta que vamos a procesar
    if (alerta.Alerta==="simple") {
        //plugin de sweetalert
        Swal.fire({
            type: alerta.Tipo,
            title: alerta.Titulo,
            text: alerta.Texto,
            confirmButtonText: 'Aceptar'
        });
    }
    else if (alerta.Alerta==="recargar") 
    {
        //Vamos a preguntar y si si, se refrescara la pagina
        Swal.fire({
            type: alerta.Tipo,
            title: alerta.Titulo,
            text: alerta.Texto,
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.value) {
                //Se ha precionado y confirmado desde el boton
              location.reload();
            }
          });    
    } 
    else if (alerta.Alerta==="limpiar") 
    {
        //Cando se registra algun valor, se va a limpiar el formulario
        Swal.fire({
            type: alerta.Tipo,
            title: alerta.Titulo,
            text: alerta.Texto,
            confirmButtonText: 'Aceptar'
            }).then((result) => {
            if (result.value) {
                //Se ha precionado y confirmado desde el boton
                document.querySelector(".FormularioAjax").reset();
            }
            });  
    } else if (alerta.Alerta==="redireccionar") {
        window.location.href=alerta.URL;
    } 
}