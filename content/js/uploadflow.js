$(document).ready(function(){
    
});

function save(){

    
    const aux1 = new Date(document.getElementById("dateStart").value);
    const dateStart = new Date(aux1.toGMTString());
    let diaStart = dateStart.getUTCDate();
    let mesStart = dateStart.getUTCMonth()+1 ;
    let yearStart = dateStart.getFullYear();

    const aux2 = new Date(document.getElementById("dateEnd").value);
    const dateEnd = new Date(aux2.toGMTString());
    let diaEnd = dateEnd.getUTCDate();
    let mesEnd = dateEnd.getUTCMonth()+1;
    let yearEnd = dateEnd.getFullYear();

    var cadena = "aux=saveConsolidado&diaStart="+diaStart+"&mesStart="+mesStart+"&yearStart="+yearStart+"&diaEnd="+diaEnd+"&mesEnd="+mesEnd+"&yearEnd="+yearEnd;
    
    $.ajax({
        type: "POST",
        url: "controller/fundsController.php",
        data: cadena,
        beforeSend: function (xhr) {
            $("#ajaxBusy").show();
        },
        success: function (result) {
            if (result == true) {


                success_noti("Datos actualizados con éxito") 
                console.log(result);
                window.location.href="flow.php";

            } else if (result == false) {
                error_noti("Error al actualizar datos");
                console.log(result);
            } else {
                error_noti("Error");
                console.log(result);
            }



        },
        error: function (e) {
            $("ajaxBusy").hide();
            error_noti("Sistema No Disponible");
        }
    });

    

    

}

function upload(){
    let file=$("#uploadFile").prop('files')[0];
    console.log(file)
    var datosForm=new FormData;
    datosForm.append("file",file);

    $.ajax({
        type: "POST",
        contentType:false,
        processData:false,
        data:datosForm,
        url:"controller/uploadFileController.php",
        beforeSend:function(xhr){
            $("#ajaxBusy").show();
        },
        success:function(data){
            document.getElementById("labelUpload").innerText="Archivo Cargado..."
            console.log(data)
        },
        error: function(e){
            $("ajaxBusy").hide();
            error_noti("Sistema No Disponible");
            console.log(e);
        }
    });
}