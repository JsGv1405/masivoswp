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
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <title>Flujo Fondos</title>

    <?php require_once "scripts.php"; ?>

    

    <script src="js/flow.js" type="text/javascript"></script>

</head>

<body>
    <div id='ajaxBusy'></div>
    <div class="wrapper">
        <div class="viewlead">
            <main class="page-content">
                <?php require_once $path_so; ?>
                <br>
                <br>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom viewdiv">
                    <h2 class="h4">Flujo Fondos Chile</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a class="btn btn btn-sm btn-outline-primary" role="button" href="/gledchile/content/funds/uploadflow.php">
                        <span><i class="bi bi-upload"></i></i></span>
                            Subir Archivo 
                        </a>
                    </div>
                  
                </div>

                <div class="container-fluid" style="margin-top: 30px;">
                    <div class="row">
                        <div class="table-responsive">
                            <div id="divTableFlujo" class="col-center">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container text-center pt-4">
                    <div><span data-feather="eye-off"></span></div>
                    <p></p>
                </div>


            </main>
        </div>
    </div>


    <div id="eliminateLead" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <i class="bi bi-plus-lg"> </i>Eliminar Lead</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-center">
                                <img src="../../img/danger2.png" alt="">
                            </div>
                            <h4 class="col-center">Esta seguro que desea eliminar este Lead?</h4>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="eliminate();" style="width: 100px;">Eliminar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
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
    <!--end wrapper-->




</body>

</html>