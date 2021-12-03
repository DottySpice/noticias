function usuarios(cual) {
    switch (cual) {
        case 'formActualizar':
            $.dialog({
                title: 'Actualiza Tus Datos',
                content: "url:../class/classUsuario.php?accion="+cual,
                type: "green",
                columnClass: "large"
            });
            break;

        case 'valiActualizar':
            $.ajax(
                { type: "POST",
                  url: "../class/classUsuario.php",
                  data:$("#formActualizar").serialize()+"&accion="+cual,
                  beforeSend: function(){ mensaje.innerHTML="Actualizando..."},
                  success: function(textoResultante){ eval(textoResultante)}     
                });
            break;
            
        default:
            break;
    }
}