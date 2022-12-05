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
$id = $_POST["id"];
?>
<!doctype html>
<html lang="es">

<html>

<head>
    <meta charset="UTF-8">
    <title>Ver Flujo</title>

    <?php require_once "scripts.php"; ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome -->
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
    <script src="js/editflow.js" type="text/javascript"></script>
</head>

<body>
    <div id='ajaxBusy'></div>
    <div class="wrapper">
        <main class="page-content">
            <?php require_once $path_so; ?>
            <br>
            <br>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="form-new-lead">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2 class="h4">Ver Flujo</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <!-- <button class="btn btn-md btn-outline-info mr-2"  onclick="mensaje()">Enviar <span><i class="bi bi-whatsapp"></i></span></button> onclick="datos()"-->

                            <a href="flujo.php" class="btn btn-md btn-outline-secondary" role="button">
                                <span data-feather="arrow-left"></span>
                                Regresar
                            </a>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    Detalle
                                </div>
                                <div class="card-body">

                                    <?php
                                    include "../../models/conection.php";

                                    $sqlBuscar = "SELECT * FROM flujochile WHERE id=$id";
                                    $query_rol = mysqli_query($conection, $sqlBuscar);
                                    $result_rol = mysqli_num_rows($query_rol);
                                    if ($result_rol > 0) {
                                        while ($rol = mysqli_fetch_array($query_rol)) {
                                    ?>

                                            <div class="d-flex form-row justify-content-between">
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">ID:</label>
                                                    <input type="text" id="idOperacion" class="form-control from-control-lg input-number" value="<?php echo $rol["dia"] . $rol["mes"] . $rol["year"] . "-" . $rol["id"]; ?>" readonly>
                                                </div>
                                                <div class="col-2">

                                                </div>
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">N° Cartola:</label>
                                                    <input type="text" id="cartola" class="form-control from-control-lg input-number" value="<?php echo $rol["cartola"]; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">N° Operación:</label>
                                                    <input type="text" id="operacion" class="form-control from-control-lg " value="<?php echo $rol["operacion"]; ?>" readonly>
                                                </div>
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">N° Cuenta:</label>
                                                    <input type="text" id="operacion" class="form-control from-control-lg " value="<?php echo $rol["cuenta"]; ?>" readonly>

                                                </div>

                                                <div class="col-4">
                                                    <label for="" class="form-control-label">Sucursal:</label>
                                                    <input type="text" id="operacion" class="form-control from-control-lg " value="<?php echo $rol["sucursal"]; ?>" readonly>

                                                </div>
                                                <div class="col-4">
                                                    <label for="" class="form-control-label">Alias:</label>
                                                    <input type="text" id="operacion" class="form-control from-control-lg " value="<?php echo $rol["alias"]; ?>" readonly>

                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Concepto</label>
                                                    <input type="text" id="operacion" class="form-control from-control-lg " value="<?php echo $rol["concepto"]; ?>" readonly>

                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Detalle</label>
                                                    <input type="text" id="operacion" class="form-control from-control-lg " value="<?php echo $rol['detalle'] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Descripción</label>
                                                    <input type="text" id="descripcion" class="form-control from-control-lg " value="<?php echo $rol["descripcion"]; ?>" readonly>
                                                </div>

                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Cheques / Cargos ($):</label>
                                                    <input type="text" id="cargo" class="form-control from-control-lg" value="<?php echo $rol["cheque"]; ?>" readonly>
                                                </div>

                                                <div class="col">
                                                    <label for="" class="form-control-label">Abono / Depósito ($):</label>
                                                    <input type="text" id="abono" class="form-control from-control-lg" value="<?php echo $rol["deposito"]; ?>" readonly>
                                                </div>

                                                <div class="col-2">
                                                    <label for="" class="form-control-label">Saldo ($):</label>
                                                    <input type="text" id="saldo" class="form-control from-control-lg input-number" readonly value="<?php echo $rol["saldo"]; ?>" readonly>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="d-flex">
                                                <hr class="my-auto flex-grow-1">
                                                <h4 class="card-subtitle mb-2 text-muted font-weight-bold">SPLIT</h4>
                                                <hr class="my-auto flex-grow-1">
                                            </div>


                                            <div class="form-row mb-3">
                                                <div class="col-6">
                                                    <div class="form-row mb-6">
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Languages(%)</label>
                                                            <input type="text" id="language" class="form-control from-control-lg input-number" value="<?php echo $rol["percent_lang"]; ?>" readonly>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Hey(%)</label>
                                                            <input type="text" id="hey" class="form-control from-control-lg" value="<?php echo $rol["percent_hey"]; ?>" readonly>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Upper(%)</label>
                                                            <input type="text" id="upper" class="form-control from-control-lg" value="<?php echo $rol["percent_upper"]; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-row mb-3">
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Let's Talk(%)</label>
                                                            <input type="text" id="letsTalk" class="form-control from-control-lg" value="<?php echo $rol["percent_letstalk"]; ?>" readonly>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">General(%)</label>
                                                            <input type="text" id="general" class="form-control from-control-lg" value="<?php echo $rol["percent_general"]; ?>" readonly>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Otros(%)</label>
                                                            <input type="text" id="otros" class="form-control from-control-lg" value="<?php echo $rol["percent_otros"]; ?>" readonly>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col-6">
                                                    <div class="form-row mb-6">
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">($)</label>
                                                            <input type="text" id="languageVal" class="form-control from-control-lg " readonly value="<?php echo $rol["languages"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">($)</label>
                                                            <input type="text" id="heyVal" class="form-control from-control-lg" readonly value="<?php echo $rol["hey"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">($)</label>
                                                            <input type="text" id="upperVal" class="form-control from-control-lg" readonly value="<?php echo $rol["upper"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-row mb-3">
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">($)</label>
                                                            <input type="text" id="letsTalkVal" class="form-control from-control-sm" readonly value="<?php echo $rol["letstalk"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">($)</label>
                                                            <input type="text" id="generalVal" class="form-control from-control-lg" readonly value="<?php echo $rol["general"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">($)</label>
                                                            <input type="text" id="otrosVal" class="form-control from-control-lg" readonly value="<?php echo $rol["otros"]; ?>">
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>

                                            <div class="form-row mb-3">

                                                <div class="col-12">
                                                    <label for="">Comentarios</label>
                                                    <input type="text" id="comentarios" class="form-control from-control-lg" readonly value="<?php echo $rol["comentarios"]; ?>">
                                                </div>
                                            </div>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>



        <!-- MODAL NOTES -->
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