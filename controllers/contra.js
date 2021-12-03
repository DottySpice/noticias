function contras(cual) {
    switch (cual) {
        case 'formContra':
            $.dialog({
                title: 'Ingresa Email Asociado',
                content: "url:class/classContra.php?accion="+cual,
                type: "red",
                columnClass: "large"
            });
            break;

        case 'valiContra':
            $.ajax(
                { type: "POST",
                  url: "class/classContra.php",
                  data:$("#formContra").serialize()+"&accion="+cual,
                  beforeSend: function(){ mensaje.innerHTML="Enviando Correo..."},
                  success: function(textoResultante){ eval(textoResultante)}     
                });
            break;
            
        default:
            break;
    }
}