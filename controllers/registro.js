function registros(cual) {
    switch (cual) {
        case 'formRegistro':
            $.dialog({
                title: 'Registro',
                content: "url:class/classRegistro.php?accion="+cual,
                type: "blue",
                columnClass: "large"
            });
            break;

        case 'valiRegistro':
            $.ajax(
                { type: "POST",
                  url: "class/classRegistro.php",
                  data:$("#formRegistro").serialize()+"&accion="+cual,
                  beforeSend: function(){ mensaje.innerHTML="Registrando..."},
                  success: function(textoResultante){ eval(textoResultante)}     
                });
            break;
            
        default:
            break;
    }
}