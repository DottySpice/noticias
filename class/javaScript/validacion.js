

function enviarPais() {
    var nombrePais =  document.getElementById("pais");
    var form = document.getElementById('formPais');
    form.addEventListener('submit', function name(evt) {
        var respuesta = confirm("¿Agregar el pais "+nombrePais.value+"?");

        if(respuesta){
            //alert("Enviando el formulario");
            form.submit();
            return true;
        }
        else{
            //alert("No se envía el formulario");
            evt.preventDefault();
            return false;
        }  
    })
}

function enviarCategoria() {
    var nombreCategoria =  document.getElementById("categoria");
    var form = document.getElementById('formCategoria');
    form.addEventListener('submit', function name(evt) {
        var respuesta = confirm("¿Agregar la categoria "+nombreCategoria.value+"?");

        if(respuesta){
            form.submit();
            return true;
        }
        else{
            evt.preventDefault();
            return false;
        }  
    })
}

function editarCategoria() {
    var categoriaAntes =  document.getElementById("categoriaAntes");
    var form = document.getElementById('formCategoria');
    form.addEventListener('submit', function name(evt) {
        var categoriaDespues =  document.getElementById("categoriaDespues");
        var respuesta = confirm("¿Cambiar el nombre de la categoria "+categoriaAntes.value+" a "+categoriaDespues.value+"?");

        if(respuesta){
            form.submit();
            return true;
        }
        else{
            evt.preventDefault();
            return false;
        }  
    })
}

function editarPais() {
    var nombrePaisAntes =  document.getElementById("paisAntes");
    var form = document.getElementById('formPais');
    form.addEventListener('submit', function name(evt) {
        var nombrePaisDespues =  document.getElementById("paisDespues");
        var respuesta = confirm("Cambiar el nombre del pais "+nombrePaisAntes.value+" a "+nombrePaisDespues.value);

        if(respuesta){
            form.submit();
            return true;
        }
        else{
            evt.preventDefault();
            return false;
        }  
    })
}

