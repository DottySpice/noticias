function accesos(cual) {
    switch (cual) {
        case 'formLogin':
            $.dialog({
                title: 'Ingresa Tus Datos',
                content: "url:class/classAcceso.php?accion="+cual,
                type: "green",
                columnClass: "large"
            });
            break;

        case 'valiAcceso':
            $.ajax(
                { type: "POST",
                  url: "class/classAcceso.php",
                  data:$("#formLogin").serialize()+"&accion="+cual,
                  beforeSend: function(){ mensaje.innerHTML="Espere Un Poco..."},
                  success: function(textoResultante){ eval(textoResultante)}     
                });
            break;
            
        default:
            break;
    }
}