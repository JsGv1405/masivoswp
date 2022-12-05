$(document).ready(function () {
    localStorage.clear();
});

function datos() {

    let totalPorcentaje = document.getElementById('totalPorcentaje').value;

    if (parseFloat(totalPorcentaje) == 100) {
        let idOperacion = document.getElementById('idOperacion').value;
        let id = document.getElementById('id1').value;
        let concepto = document.getElementById('concepto').value;
        let detalle = document.getElementById('detalle').value;

        let language = document.getElementById('language').value;
        let hey = document.getElementById('hey').value;
        let upper = document.getElementById('upper').value;
        let letsTalk = document.getElementById('letsTalk').value;
        let general = document.getElementById('general').value;
        let otros = document.getElementById('otros').value;

        let languageVal = document.getElementById('languageVal').value;
        let heyVal = document.getElementById('heyVal').value;
        let upperVal = document.getElementById('upperVal').value;
        let letsTalkVal = document.getElementById('letsTalkVal').value;
        let generalVal = document.getElementById('generalVal').value;
        let otrosVal = document.getElementById('otrosVal').value;
        let comprobante = $("#comprobante").prop('files')[0];
        

        var cadena = "aux=editFlujo&id=" + id + "&concepto=" + concepto + "&detalle=" + detalle + "&language=" + language + "&hey=" + hey + "&upper=" + upper + "&letsTalk=" + letsTalk + "&general=" + general + "&otros=" + otros
            + "&languageVal=" + languageVal + "&heyVal=" + heyVal + "&upperVal=" + upperVal + "&letsTalkVal=" + letsTalkVal + "&generalVal=" + generalVal + "&otrosVal=" + otrosVal+"&totalPorcentaje="+totalPorcentaje;
        $.ajax({
            type: "POST",
            url: "controller/fundsController.php",
            data: cadena,
            beforeSend: function (xhr) {
                $("#ajaxBusy").show();
            },
            success: function (result) {
                if (result == true) {
                    document.getElementById('idOperacion').value = '';
                    document.getElementById('cartola').value = '';
                    document.getElementById('cuenta').value = '';
                    document.getElementById('sucursal').value = '';
                    document.getElementById('alias').value = '';
                    document.getElementById('concepto').value = '';
                    document.getElementById('detalle').value = '';
                    document.getElementById('descripcion').value = '';

                    

                    success_noti("Registro actualizado con éxito");
                    console.log(result);
                    if(comprobante != null){
                        sendFile(comprobante,idOperacion+"-"+id);
                    }else{
                        window.location.href="flow.php";
                    }
                    

                } else if (result == false) {
                    error_noti("Error al crear el registro");
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
    }else{
        $("#totalPorcentaje").focus();
        error_noti("El porcentaje debe ser igual a 100%");
        return false;
    }
}


const sumarPorcentaje = () => {
    let language = document.getElementById('language').value;
    let hey = document.getElementById('hey').value;
    let upper = document.getElementById('upper').value;
    let letsTalk = document.getElementById('letsTalk').value;
    let general = document.getElementById('general').value;
    let otros = document.getElementById('otros').value;
    let cargo = document.getElementById('cargo').value;
    let abono = document.getElementById('abono').value;
    let total = parseFloat(cargo) + parseFloat(abono);

    if ((language) == '' || parseFloat(language) > 100) {
        language = 0;
        document.getElementById('language').value = '';
    }
    if ((hey) == '' || parseFloat(hey) > 100) {
        hey = 0;
        document.getElementById('hey').value = '';
    }
    if ((upper) == '' || parseFloat(upper) > 100) {
        upper = 0;
        document.getElementById('upper').value = '';
    }
    if ((letsTalk) == '' || parseFloat(letsTalk) > 100) {
        letsTalk = 0;
        document.getElementById('letsTalk').value = '';
    }
    if ((general) == '' || parseFloat(general) > 100) {
        general = 0;
        document.getElementById('general').value = '';
    }
    if ((otros) == '' || parseFloat(otros) > 100) {
        otros = 0;
        document.getElementById('otros').value = '';
    }
    if ((total) == '') {
        total = 0;
    }

    let totalPercent = parseInt(language) + parseInt(hey) + parseInt(upper) + parseInt(letsTalk) + parseInt(general) + parseInt(otros);
    document.getElementById('totalPorcentaje').value = totalPercent;

    let languageVal = total * (parseInt(language) / 100);
    let heyVal = total * (parseInt(hey) / 100);
    let upperVal = total * (parseInt(upper) / 100);
    let letsTalkVal = total * (parseInt(letsTalk) / 100);
    let generalVal = total * (parseInt(general) / 100);
    let otrosVal = total * (parseInt(otros) / 100);

    document.getElementById('languageVal').value = languageVal;
    document.getElementById('heyVal').value = heyVal;
    document.getElementById('upperVal').value = upperVal;
    document.getElementById('letsTalkVal').value = letsTalkVal;
    document.getElementById('generalVal').value = generalVal;
    document.getElementById('otrosVal').value = otrosVal;
    document.getElementById('totalVal').value = parseInt(languageVal) + parseInt(heyVal) + parseInt(upperVal) + parseInt(letsTalkVal) + parseInt(generalVal) + parseInt(otrosVal);
}


const sendFile = (file,fileName) => {
    console.log(file)
    var datosForm = new FormData;
    datosForm.append("file", file);
    datosForm.append('fileName', fileName);

    $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        data: datosForm,
        url: "controller/uploadController.php",
        beforeSend: function (xhr) {
            $("#ajaxBusy").show();
        },
        success: function (data) {
            if (data) {
                success_noti("Documento Guardado con Éxito");
                window.location.href="flow.php";
            }
        },
        error: function (e) {
            $("ajaxBusy").hide();
            error_noti("Sistema No Disponible");
        }

    });


}




