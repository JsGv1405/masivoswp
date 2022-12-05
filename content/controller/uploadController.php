<?php
include "../model/fundsModel.php";
    if(isset($_FILES["file"])){
        $directorio="../../documents/"; 
        $tempName=  $_POST["fileName"];
        $archivo=$tempName."_".$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],$directorio.$archivo);
        $result = saveNameFile($directorio.$archivo,$tempName);
        echo $result;
    }