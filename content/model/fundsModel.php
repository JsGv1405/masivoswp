<?php

function consultarFlujo()
{
    include "../../../models/conection.php";
    $sqlBuscar = "SELECT * FROM flujochile";
    $result = mysqli_query($conection, $sqlBuscar);
    return $result;
}

function saveFlujo($dia,$mes,$year,$cartola,$cuenta,$sucursal,$alias,$concepto,$detalle,$descripcion,$total,$operacion,$cargo,
    $abono,$saldo,$language,$hey,$upper,$letsTalk,$general,$otros,$totalPercent,$languageVal,$heyVal,$upperVal,$letsTalkVal,
    $generalVal,$otrosVal) {

    include "../../../models/conection.php";

    $sqlIdSearch = "SELECT * FROM `flujo` ORDER BY `id` DESC LIMIT 1";
    $query_rol = mysqli_query($conection, $sqlIdSearch);
    $result_rol = mysqli_num_rows($query_rol);
    if ($result_rol > 0) {
        $rol = mysqli_fetch_array($query_rol);
        $id = $rol['id'];
    }

    $idAct = $id + 1;
    $idOperacion = $dia . $mes . $year . "-" . $idAct;

    $sqlInsert = "INSERT INTO `flujochile`(`idoperacion`, `dia`, `mes`, `year`, `sucursal`, `cuenta`, `alias`, `cartola`, `operacion`, 
    `concepto`, `detalle`, `descripcion`, `total`, `cheque`, `deposito`, `saldo`, `languages`, `percent_lang`,
    `hey`, `percent_hey`, `upper`, `percent_upper`, `letstalk`, `percent_letstalk`, `general`, `percent_general`, `otros`, `percent_otros`) 
    VALUES ('$idOperacion','$dia','$mes','$year','$sucursal','$cuenta','$alias','$cartola','$operacion','$concepto','$detalle',
    '$descripcion','$total','$cargo','$abono','$saldo','$languageVal','$language','$heyVal','$hey','$upperVal','$upper',
    '$letsTalkVal','$letsTalk','$generalVal','$general','$otrosVal','$otros')";

    $result = mysqli_query($conection, $sqlInsert);

    return $result;
}

function editFlujo($id,$concepto,$detalle,$language,$hey,$upper,$letsTalk,$general,$otros,$languageVal,$heyVal,$upperVal,$letsTalkVal,$generalVal,$otrosVal,$totalPorcentaje) {

    include "../../../models/conection.php";

    $sqlUpdate = "UPDATE `flujochile` SET `concepto`='$concepto', `detalle`='$detalle',`languages`='$languageVal',`percent_lang`='$language',`hey`='$heyVal',`percent_hey`='$hey',`upper`='$upperVal',`percent_upper`='$upper',`letstalk`='$letsTalkVal',
    `percent_letstalk`='$letsTalk',`general`='$generalVal',`percent_general`='$general',`otros`='$otrosVal',`percent_otros`='$otros',`totalporcentaje`='$totalPorcentaje',`statusver`='0' WHERE `id`='$id'";

    $result = mysqli_query($conection, $sqlUpdate);

    return $result;
}

function saveConsolidado($diaStart,$mesStart,$yearStart,$diaEnd,$mesEnd,$yearEnd)
{

    include "../../../models/conection.php";
    
    $dateStart = $yearStart . "-" . $mesStart . "-" . $diaStart;
    $dateEnd = $yearEnd . "-" . $mesEnd . "-" . $diaEnd;

    /*
    $sqlIdSearch = "SELECT * FROM `flujochile` ORDER BY `id` DESC LIMIT 1";
    $query_rol1 = mysqli_query($conection, $sqlIdSearch);
    $result_rol1 = mysqli_num_rows($query_rol1);
    if ($result_rol1 > 0) {
        $rol1 = mysqli_fetch_array($query_rol1);
        $id = $rol1['id'];
    }else{
        $id=0;
    }
    $idAct = $id + 1;
    $sqlConsulta = "SELECT * FROM `flujochileaux` WHERE `date` BETWEEN '$dateStart' AND '$dateEnd'";
    
    */
    

    $sqlInsertInto="INSERT INTO `flujochile`SELECT * FROM `flujochileaux` WHERE `date` BETWEEN '$dateStart' AND '$dateEnd'";
    $result = mysqli_query($conection, $sqlInsertInto);
    
    

    /*
    $query_rol = mysqli_query($conection, $sqlConsulta);
    $result_rol = mysqli_num_rows($query_rol);
    if ($result_rol > 0) {
        while ($rol = mysqli_fetch_array($query_rol)) {
            $dia = $rol['dia'];
            $mes = $rol['mes'];
            $year = $rol['year'];
            $sucursal = $rol['sucursal'];
            $cuenta = $rol['cuenta'];
            $alias = $rol['alias'];
            $cartola = $rol['cartola'];
            $operacion = $rol['operacion'];
            $descripcion = $rol['descripcion'];
            $cargos = $rol['cargos'];
            $depositos = $rol['depositos'];
            $saldo = $rol['saldo'];

            $idOperacion = $dia . $mes . $year . "-" . $idAct;

            $sqlInsert = "INSERT INTO `flujochile`(`idoperacion`, `dia`, `mes`, `year`, `sucursal`, `cuenta`, `alias`, `cartola`, `operacion`, `descripcion`,  `cheque`, `deposito`, `saldo`,`statusver`,`languages`, `percent_lang`, `hey`, `percent_hey`, `upper`, `percent_upper`, `letstalk`, `percent_letstalk`, `general`, `percent_general`, `otros`, `percent_otros`) 
            VALUES ('$idOperacion','$dia','$mes','$year','$sucursal','$cuenta','$alias','$cartola','$operacion','$descripcion','$cargos','$depositos','$saldo','0' ,'0' ,'0' ,'0' ,'0' ,'0' ,'0' ,'0' ,'0' ,'0' ,'0' ,'0' ,'0')";
            $result = mysqli_query($conection, $sqlInsert);
            if (!$result) {
                return false;
            }
            $idAct++;
        }
    }
    */

    $sqlTruncate = "TRUNCATE TABLE `flujochileaux`";
    $result2 = mysqli_query($conection, $sqlTruncate);

    if($result&&$result2){
        return true;
    }else{
        return false;
    }
}

function uploadFileTemp($valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$valor10,$valor11,$valor12,$valor13,$numeroFilas){

    include "../../../models/conection.php";

    $string="('$valor13[0]','$valor1[0]','$valor2[0]','$valor3[0]','$valor4[0]','$valor5[0]','$valor6[0]','$valor7[0]','$valor8[0]','$valor9[0]','$valor10[0]','$valor11[0]','$valor12[0]','0','0','0','0','0','0','0','0','0','0','0','0','0')";

    for($i = 1; $i<=$numeroFilas; $i++){
        if($valor1[$i]!=''&&$valor2[$i]!=''&&$valor3[$i]!=''){
            $string=$string.",('$valor13[$i]','$valor1[$i]','$valor2[$i]','$valor3[$i]','$valor4[$i]','$valor5[$i]','$valor6[$i]','$valor7[$i]','$valor8[$i]','$valor9[$i]','$valor10[$i]','$valor11[$i]','$valor12[$i]','0','0','0','0','0','0','0','0','0','0','0','0','0')";
        }  
    }
    $sqlUpload = "INSERT INTO `flujochileaux`(`date`,`dia`, `mes`, `year`, `sucursal`, `cuenta`, `alias`, `cartola`, `operacion`, `descripcion`, `cargos`, `depositos`, `saldo`,`statusver`, `languages`, `percent_lang`, `hey`, `percent_hey`, `upper`, `percent_upper`, `letstalk`, `percent_letstalk`, `general`, `percent_general`, `otros`, `percent_otros`) 
            VALUES $string";
    $result = mysqli_query($conection, $sqlUpload);

    return $result; 
}

function saveNameFile($nameFile,$id){

    include "../../../models/conection.php";

    $pos = strpos($id, "-");
    $idPos=substr($id,$pos+1);

    $sqlUpdate = "UPDATE `flujochile` SET `comprobante`='$nameFile' WHERE `id`= '$idPos'";
    $result = mysqli_query($conection, $sqlUpdate);

    return $result;
}

function eliminateRow($id){

    include "../../../models/conection.php";

    $sqlDelete = "DELETE FROM `flujochile` WHERE `id`='$id'";
    $result = mysqli_query($conection, $sqlDelete);

    return $result;
}
