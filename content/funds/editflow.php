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
    <title>Edit Flujo</title>
    <?php require_once "scripts.php"; ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <h2 class="h4">Editar Flujo</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button class="btn btn-md btn-outline-info mr-2" onclick="datos()"><i class="bi bi-arrow-clockwise"></i> Guardar Cambios</button>
                            <a href="flow.php" class="btn btn-md btn-outline-secondary" role="button">
                                <span data-feather="arrow-left"></span>
                                Descartar
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
                                            
                                                <div class="form-row">
                                                    <div class="col-2">
                                                        <label for="" class="form-control-label"></label>
                                                        <input type="text" id="idOperacion" class="form-control from-control-lg input-number" value="<?php echo $rol["dia"] . $rol["mes"] . $rol["year"]  ?>" readonly>
                                                    </div>
                                                    <div class="col-1">
                                                        <label for="" class="form-control-label"> </label>
                                                        <input type="text" id="id1" class="form-control from-control-lg input-number" value="<?php echo $rol["id"]; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">N° Cartola:</label>
                                                    <input type="text" id="cartola" class="form-control from-control-lg input-number" value="<?php echo $rol["cartola"]; ?> " readonly>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">N° Operación:</label>
                                                    <input type="text" id="operacion" class="form-control from-control-lg " value="<?php echo $rol["operacion"]; ?> " readonly>
                                                </div>
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">N° Cuenta:</label>
                                                    <input type="text" id="cuenta" class="form-control from-control-lg " value="<?php echo $rol["cuenta"]; ?> " readonly>
                                                </div>

                                                <div class="col-4">
                                                    <label for="" class="form-control-label">Sucursal:</label>
                                                    <input type="text" id="sucursal" class="form-control from-control-lg " value="<?php echo $rol["sucursal"]; ?> " readonly>

                                                </div>
                                                <div class="col-4">
                                                    <label for="" class="form-control-label">Alias:</label>
                                                    <input type="text" id="alias" class="form-control from-control-lg " value="<?php echo $rol["alias"]; ?> " readonly>
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Concepto</label>
                                                    <select name="" id="concepto" class="form-control from-control-lg">
                                                        <option value="<?php echo $rol["concepto"]; ?>"><?php echo $rol["concepto"]; ?></option>
                                                        <?php
                                                        include '../../models/conection.php';
                                                        $sqlBuscar = "SELECT * FROM `concepto_flujos`";
                                                        $query_rol = mysqli_query($conection, $sqlBuscar);
                                                        $result_rol = mysqli_num_rows($query_rol);
                                                        if ($result_rol > 0) {
                                                            while ($rol1 = mysqli_fetch_array($query_rol)) {
                                                        ?>
                                                                <option value="<?php echo $rol1['concepto'] ?>"><?php echo $rol1['concepto'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Detalle</label>
                                                    <select name="" id="detalle" class="form-control from-control-lg">
                                                        <option value="<?php echo $rol['detalle'] ?>"><?php echo $rol['detalle'] ?></option>
                                                        <?php
                                                        include '../../models/conection.php';
                                                        $sqlBuscar = "SELECT * FROM `detalle_flujos`";
                                                        $query_rol = mysqli_query($conection, $sqlBuscar);
                                                        $result_rol = mysqli_num_rows($query_rol);
                                                        if ($result_rol > 0) {
                                                            while ($rol2 = mysqli_fetch_array($query_rol)) {
                                                        ?>
                                                                <option value="<?php echo $rol2['detalle'] ?>"><?php echo $rol2['detalle'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Descripción</label>
                                                    <input type="text" id="descripcion" class="form-control from-control-lg " value="<?php echo $rol["descripcion"]; ?> " readonly>
                                                </div>
                                                <!--
                                                <div class="col-3">
                                                    <label for="" class="form-control-label">Total ($)</label>
                                                    <input type="text" id="total" class="form-control from-control-lg input-number">
                                                </div>
                                                -->
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="" class="form-control-label">Cheques / Cargos ($):</label>
                                                    <input type="text" id="cargo" class="form-control from-control-lg" nkeypress="return filterFloat(event, this);" value="<?php echo $rol["cheque"]; ?>" readonly>
                                                </div>

                                                <div class="col">
                                                    <label for="" class="form-control-label">Abono / Depósito ($):</label>
                                                    <input type="text" id="abono" class="form-control from-control-lg" nkeypress="return filterFloat(event, this);" value="<?php echo $rol["deposito"]; ?>" readonly>
                                                </div>

                                                <!--
                                                <div class="col-2">
                                                    <label for="" class="form-control-label">Saldo ($):</label>
                                                    <input type="text" id="saldo" class="form-control from-control-lg input-number" readonly value="<?php echo $rol["saldo"]; ?>">
                                                </div>
                                                -->
                                            </div>

                                            <br>

                                            <div class="d-flex">
                                                <hr class="my-auto flex-grow-1">
                                                <h4 class="card-subtitle mb-2 text-muted font-weight-bold">SPLIT</h4>
                                                <hr class="my-auto flex-grow-1">
                                            </div>


                                            <div class="form-row mb-3">
                                                <div class="col-5">
                                                    <div class="form-row mb-6">
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Languages(%)</label>
                                                            <input type="text" id="language" class="form-control from-control-lg input-number" nkeypress="return filterFloat(event, this);" onkeyup="sumarPorcentaje();" value="<?php echo $rol["percent_lang"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Hey(%)</label>
                                                            <input type="text" id="hey" class="form-control from-control-lg" nkeypress="return filterFloat(event, this);" onkeyup="sumarPorcentaje();" value="<?php echo $rol["percent_hey"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Upper(%)</label>
                                                            <input type="text" id="upper" class="form-control from-control-lg" nkeypress="return filterFloat(event, this);" onkeyup="sumarPorcentaje();" value="<?php echo $rol["percent_upper"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-row mb-3">
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Let's Talk(%)</label>
                                                            <input type="text" id="letsTalk" class="form-control from-control-lg" nkeypress="return filterFloat(event, this);" onkeyup="sumarPorcentaje();" value="<?php echo $rol["percent_letstalk"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">General(%)</label>
                                                            <input type="text" id="general" class="form-control from-control-lg" nkeypress="return filterFloat(event, this);" onkeyup="sumarPorcentaje();" value="<?php echo $rol["percent_general"]; ?>">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="" class="form-control-label">Otros(%)</label>
                                                            <input type="text" id="otros" class="form-control from-control-lg" nkeypress="return filterFloat(event, this);" onkeyup="sumarPorcentaje();" value="<?php echo $rol["percent_otros"]; ?>">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col col-2">
                                                    <label for="" class="form-control-label">Total(%)</label>
                                                    <input type="text" id="totalPorcentaje" class="form-control from-control-lg" readonly value="<?php echo $rol["totalporcentaje"]; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col-5">
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
                                                <div class="col-5">
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
                                                <div class="col col-2">
                                                    <label for="" class="form-control-label">($)</label>
                                                    <input type="text" id="totalVal" class="form-control from-control-lg" readonly>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="card-footer">
                                    <label class="form-label" for="customFile"><i class="bi bi-plus"></i>Añadir Comprobante</label>
                                    <div class="file-input text center pl-5" style="position: relative; top:20px">
                                        <input type="file" name="file" id="comprobante" class="file" />
                                        <label class="file-input__label" for="file-input">
                                    </div>
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