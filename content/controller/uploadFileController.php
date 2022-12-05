<?php
session_start();

include "../model/fundsModel.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if(isset($_FILES["file"]))
{
    $fileName = $_FILES['file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {

        $nombreArchivo = $_FILES['file']['tmp_name'];
        $documento = IOFactory::load($nombreArchivo);
        $totalHojas = $documento->getSheetCount();
        $hojaActual = $documento->getSheet(11);
        $numeroFilas = $hojaActual->getHighestDataRow();
        $letra = $hojaActual->getHighestColumn();
    
        $numeroLetra = Coordinate::columnIndexFromString($letra);
    
        for($indiceFila = 2; $indiceFila<=$numeroFilas; $indiceFila++){
            
            $valor1[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(2,$indiceFila);
            $valor2[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(3,$indiceFila);
            $valor3[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(4,$indiceFila);
            $valor4[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(5,$indiceFila); 
            $valor5[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(6,$indiceFila);
            $valor6[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(7,$indiceFila); 
            $valor7[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(8,$indiceFila);
            $valor8[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(9,$indiceFila); 
            $valor9[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(10,$indiceFila);
            $valor10[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(11,$indiceFila); 
            $valor11[$indiceFila-2] = $hojaActual->getCellByColumnAndRow(12,$indiceFila);
            $valor12[$indiceFila-2]= $hojaActual->getCellByColumnAndRow(13,$indiceFila);
            $valor13[$indiceFila-2]=$valor3[$indiceFila-2]."-".$valor2[$indiceFila-2]."-".$valor1[$indiceFila-2];         
        }
        $uploadFile = uploadFileTemp($valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$valor10,$valor11,$valor12,$valor13,$numeroFilas);
        echo $uploadFile;

    }
}

?>
