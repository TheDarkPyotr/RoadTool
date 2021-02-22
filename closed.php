<?php

$is_maintenance = true;
$title = "Comune di Alcamo | Servizio Segnalazioni - Manutenzione in corso";
$metadesc = "Servizio Segnalazioni del Comune di Alcamo";
$metakey = "segnalazioni, comune, alcamo, sicilia, trapani, problemi, problematiche, buche, strada, comune di alcamo, comune alcamo";
$metaauthor = "Comune di Alcamo - URP";
include('core.php');

$row = mysql_fetch_assoc(mysql_query("SELECT * FROM cms_system"));

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title><?php echo $title;  ?></title>
    <meta name="description" content="<?php $metadesc; ?>">
    <meta name="keywords" content="<?php $metakey; ?>">
    <meta name="author" content="<?php $metaauthor; ?>">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo PATH; ?>assets/css/preload.min.css" />
    <link rel="stylesheet" href="<?php echo PATH; ?>assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?php echo PATH; ?>assets/css/style.green-500.min.css" />

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <?php if($row['redirect_status'] == 1 && $row['redirect_link'] != "") echo '<meta http-equiv="refresh" content="0; url='.$row['redirect_link'].'" />'; ?>
    <?php if($row['site_closed'] == 0) echo '<meta http-equiv="refresh" content="0; url='.PATH.'" />'; ?>

</head>
<body>
<div id="ms-preload" class="ms-preload">
    <div id="status">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<div class="bg-full-page ms-hero-img-city2 ms-hero-bg-primary back-fixed">
    <div class="mw-500 absolute-center">
        <header class="text-center mb-2">
            <img src="./admin/dist/img/logo-city.png">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Servizio segnalazioni
            </h1>
        </header>
        <div class="card animated zoomInUp animation-delay-7 color-primary withripple">
            <div class="card-block">
                <div class="text-center color-dark">
                    <h1 class="color-primary text-big">Manutenzione in corso</h1>
                    <p class="lead lead-sm">Il servizio è attualmente in manutenzione, ritenta tra un po'!</p>
                    <?php if($row['message'] != ""){?>

                        <h3 class="color-primary text-big">Comunicazione dall'amministrazione</h3>

                        <p class="lead lead-sm"><?php echo $row['message']; ?></p>

                    <?php } ?>
                    <form>

                        <a href="http://www.comune.alcamo.tp.it/" class="btn btn-raised btn-primary btn-block" type="button">Comune di Alcamo</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/coming.js"></script>
</body>
</html>