function categorias(cual,capa) {

    switch (cual) {

        case 'list':
            $.ajax(
                { type: "POST",
                    url: "../class/classCategoria1.php",
                    data:{'accion' : 'list'},
                    beforeSend: function(){},
                    success: function(textoResultante){ $("#"+capa).html(textoResultante); }     
                });
        break;


        case 'filtro':
            $.ajax(
                { type: "POST",
                    url: "../class/classNoticias1.php",
                    data:{'accion' : cual, 'IdCategoria' : capa},
                    beforeSend: function(){ $("#Noticias").html("eSTAMOS FILTANDRO"); },
                    success: function(textoResultante){ $("#Noticias").html(textoResultante); }     
                });
        break;

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
                {
                    type: "POST",
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