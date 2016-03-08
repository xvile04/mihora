var url = '/basic/web/';

var loading;

var tipo;
var id;

$(document).ready(function () {
    tipo = $('input[name="tipo"').val();
    id = $('input[name="id"').val();
    
    loading = document.getElementById("loading");
    
    console.log(tipo + "--" + id);
    getDatosCalendario();

}); 


function getDatosCalendario(){
   
    $.ajax({
        method: "POST",
        url: url + 'main/getdatoscalendario', 
        data: {tipo:tipo,id:id},
        dataType: "json",
        beforeSend: function(){        
            loading.style.visibility= "visible" ;
        },
        success: function(json){  
            loading.style.display = "none" ;
            console.log(json);
            
            initCalendar(json);
        }
    });

}