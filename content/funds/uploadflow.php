<?php
session_start();
$so = php_uname();
$windows = stripos($so, "Windows");
$path_so = "../../header1.php";
#if ($windows !== false) {
#  $path_so = "C:/xampp/htdocs/gled/cabecera.php";
#} else {
#   $path_so = "/var/www/html/gled/cabecera.php";
#}
?>
<!doctype html>
<html lang="es">

<html>

<head>
    <meta charset="UTF-8">
    <title>Importar Documentos</title>
    <?php require_once "scripts.php"; ?>

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="/static/stylesheets/Chart.min.css" rel="stylesheet">
    <link href="/static/stylesheets/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

    <script src="js/uploadflow.js" type="text/javascript"></script>

</head>

<body>
    <div id='ajaxBusy'></div>
    <div class="wrapper">
        
            <main class="page-content">
                <?php require_once $path_so; ?>
                <br>
                <br>
                <div class="form-new-lead">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2 class="h4">Actualizar Datos de Consolidado</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button class="btn btn-md btn-outline-info mr-2" onclick="save()"><i class="bi bi-arrow-clockwise"></i> Guardar Cambios</button>
                            <a href="flow.php" class="btn btn-md btn-outline-secondary" role="button">
                                <span data-feather="arrow-left"></span>
                                Salir
                            </a>
                        </div>
                    </div>
                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex form-row">
                                <label for="" class="form-control-label">Fecha</label>
                            </div>

                            <div class="d-flex form-row justify-content-start">
                                <div class="col-3">
                                    <label for="" class="form-control-label">Desde:</label>
                                    <input type="date" id="dateStart" class="form-control from-control-lg">
                                </div>
                                <div class="col-2">

                                </div>

                                <div class="col-3">
                                    <label for="" class="form-control-label">Hasta:</label>
                                    <input type="date" id="dateEnd" class="form-control from-control-lg">
                                </div>
                            </div>
                            <hr>
                            <div class="file-input text center pl-5">
                                <input type="file" name="file" id="uploadFile" class="form-control" />

                            </div>
                            <br>
                            
                            <div>
                                <button type="button" class="btn btn-primary" onclick="upload();"> <i class="bi bi-arrow-bar-up"></i> Cargar</button>
                                <label for="" id="labelUpload"class="form-control-label" ></label>
                            </div>
                        </div>
                    </div>

                    <!--end page main-->
                    <!--start overlay-->
                    <div class="overlay nav-toggle-icon"></div>
                    <!--end overlay-->
                    <!--Start Back To Top Button-->
                    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
                    <!--End Back To Top Button-->
                    <!--start switcher-->
                </div>
            </main>

        </div>
        <!--end wrapper-->
</body>
</html>