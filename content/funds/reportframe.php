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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



    <title>Reportes</title>
</head>

<body>
    <div >
        <main>
                <iframe title="reportFlujoChile" width="1140" height="541.25" src="https://app.powerbi.com/reportEmbed?reportId=b2beb4a0-07b5-40db-8f12-17261ae98787&autoAuth=true&ctid=24f8ed35-89c9-4bb7-a785-e0eedbbb543a" frameborder="0" allowFullScreen="true"></iframe>
                
        </main>
    </div>
</body>

</html>