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

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--plugins-->
    <link href="/gled/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="/gled/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/gled/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/gled/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="/gled/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/gled/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="/gled/assets/css/style.css" rel="stylesheet" />
    <link href="/gled/assets/css/icons.css" rel="stylesheet">

    <!-- ICONS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- loader-->
    <link href="/gled/assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="/gled/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="/gled/assets/css/light-theme.css" rel="stylesheet" />
    <link href="/gled/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="/gled/assets/css/header-colors.css" rel="stylesheet" />

    <!--Notificaciones-->
    <link rel="stylesheet" href="/gled/assets/plugins/notifications/css/lobibox.min.css" />



    <title>Estadisticas</title>

    <?php require_once "scripts.php"; ?>

    <script src="js/report.js" type="text/javascript"></script>

</head>

<body>
    <div id='ajaxBusy'></div>
    <div class="wrapper">
        <div class="viewlead">
            <main class="page-content">
                <?php require_once $path_so; ?>
                <!-- pagination -->


                <div class="d-flex justify-content-center">
                    <iframe id="frame" title="gledReporte2" width="1200" height="560" src="https://www.360grupoconsultor.com/gledchile/content/funds/reportframe.php" frameborder="0" allowFullScreen="true"></iframe>
                </div>
                

                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-secondary" id="btn-print">Download PDF</button>
                </div>


            </main>
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