//Todos los formularios que se ingresen con peticion Ajax tendran el ID FormularioAjax
const formularios_ajax = document.querySelectorAll(".FormularioAjax");

//Envia la peticion al back, sin redireccionar
function enviar_formulario_ajax(e) {
    e.preventDefault();
    //Contiene los datos del formulario
    let data = new FormData(this);
    //formulkaruio enviando metodo por POST
    let method = this.getAttribute("method");
    let action = this.getAttribute("action");
    let tipo = this.getAttribute("data-form");

    let encabezados = new Headers();
    //array de datos jsno tiene la conf que se enviara por fetch
    let config = {
        method: method,
        headers:encabezados,
        mode: 'cors',
        cache: 'no-cache',
        body: data
    }

    //definir el tipo de mje que se enviara
    let texto_alerta;
    if (tipo==="save"){
        texto_alerta = "Los datos quedaran guardados en el sistema";
    } else if (tipo==="delete"){
        texto_alerta = "Los datos seran eliminados completamente del sistema";
    } else if (tipo === "update"){
        texto_alerta = "Los datos del sistema serán actualizados";
    } else if (tipo === "search"){
        texto_alerta = "Se eliminará el termino de busqueda y tendras que escribir uno nuevo";
    } else if (tipo === "loans"){
        texto_alerta = "¿Desea remover los datos seleccionados para prestamos o reservaciones?";
    } else {
        texto_alerta = "¿Quieres realizar la operación solicitada?";
    }

    //Vamos a preguntar y si si, se refrescara la pagina
    Swal.fire({
        type: 'question',
        title: 'Estas seguro',
        text: texto_alerta,
        showCancelButton: true,
        confirmButtonColor:'#3085D6',
        cancelButtonColor:'D33',
        confirmButtonText: 'Aceptar',
        cancelButtonText:'Cancelar'
    }).then((result) => {
        if (result.value) {
            //se enviara el formulario
            fetch(action,config)
                .then(respuesta => respuesta.json())
                .then(respuesta => {
                   //se ha resi respuesta
                   return alertas_akax(respuesta);
                });
        }
    });

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