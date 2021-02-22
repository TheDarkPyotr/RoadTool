<?php

$metadesc = "Servizio Segnalazioni del Comune di Alcamo";
$metakey = "segnalazioni, comune, alcamo, sicilia, trapani, problemi, problematiche, buche, strada, comune di alcamo, comune alcamo";
$metaauthor = "Comune di Alcamo - URP";

switch($guiset){
	
	case 1:
		$title = "Comune di Alcamo | Servizio Segnalazioni - Inoltra Segnalazione";
	break;
	
	case 2:
		$title = "Comune di Alcamo | Servizio Segnalazioni - Elenco Segnalazioni";
	break;
	
	default:
		$title = "Comune di Alcamo | Servizio Segnalazioni";
	break;
	

}

//if(isset($user->row) && isset($_SESSION['adm_log']))
//    header("Location: admin/home");

if(isset($_POST['email'])){
    $email = isset($_POST['email']) ? $input->EscapeString($_POST['email']) : '';
    $pass = isset($_POST['password']) ? $input->EscapeString($_POST['password']) : '';


    if($user->login($email, $input->HoloHash($pass), "off", false, 'true')){

        $input->logSession($email, "Tentativo accesso area riservata", "Tentativo di accesso", date('d/m/Y H:i:s'), "Accesso Area Riservata", 0, 0);

        if($user->login_error == ''){
            $_SESSION['adm_log'] = PANEL_KEY;
            $input->logSession($email, "Accesso area riservata", "Accesso eseguito", date('d/m/Y H:i:s'), "Accesso Area Riservata", 0, 0);
            header("location: admin/home");
        }
    }
}
	
/*
<!DOCTYPE html>
<html lang="it">
<head>
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
  
  <title><?php echo $title;  ?></title>
  
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,900' rel='stylesheet' type='text/css'>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <meta name="description" content="<?php $metadesc; ?>">
  <meta name="keywords" content="<?php $metakey; ?>">
  <meta name="author" content="<?php $metaauthor; ?>">
  
  <!-- Bootstrap css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.techie.css" rel="stylesheet">

  	<!-- Social Buttons CSS -->
    <link href="./admin/vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex3-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo PATH; ?>"><img src="./assets/img/logo-city.png" alt="Città di Alcamo" style="height: 60px"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex3-collapse">
                  <ul class="nav navbar-nav">
				  <?php if($guiset == 1){ ?><li class="active"><?php }else { ?><li><?php } ?><a href="./report.php">Segnala</a></li>
                  <?php if($guiset == 2){ ?><li class="active"><?php }else { ?><li><?php } ?><a href="./list.php">Elenco</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Iter burocratico <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                      </ul>
                    </li>
					 <li><a href="./admin/">Area riservata</a></li>
                  </ul>
               <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                       <a class="btn btn-social-icon btn-bitbucket"><i class="fa fa-globe"></i></a>
                                <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                              
                                <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
					
                    </div>
                  </form>
                    
						
                  
					
				
								
                   
                  
                </div><!-- /.navbar-collapse -->
              </nav> 

			  <div id="map_canvas"></div>
<style>
#map_canvas {
    width: 500px;
    height: 500px;
}
</style>


			 
			  
<script>
$(document).ready(function () {
    var map;
    var elevator;
    var myOptions = {
        zoom: 14,
        center: new google.maps.LatLng(37.978395, 12.968626),
        mapTypeId: 'satellite'
    };
    map = new google.maps.Map($('#map_canvas')[0], myOptions);
		var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
    
    
        
    var addresses = ['Alcamo, Viale Europa', 'Alcamo, via roma','Alcamo,Via balatelle,19','Alcamo,Corso VI Aprile, 21','Alcamo,via emilia, 1','Alcamo,via ruggero,23','Alcamo,via arancio, 4', 'Alcamo,via verga, 80','Alcamo,via caprera, 18','Alcamo,via olive,1','Alcamo,via galati, 11','Alcamo,via palermo, 21','Alcamo, via spica 3'];
    

    for (var x = 0; x < addresses.length; x++) {
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            new google.maps.Marker({
         				
                position: latlng,
                map: map,
                icon: image
            });

        });
        
        
    }


});
</script>
   */?>

	
    <!-- Header Carousel 
	Google API Console Key: AIzaSyBmD-764fCf5JczBvwPma1InRjaVT63sCI
	Account: lucapinta@live.it
	API Type: Google Maps Javascript API
	<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Alcamo&key=AIzaSyAQXt8aeCYIFpKwqa8qwcX17jLOBXN0Zqc" allowfullscreen></iframe>

	https://maps.googleapis.com/maps/api/staticmap?center=40.714728,-73.998672&zoom=12&size=400x400&key=YOUR_API_KEY
	<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Alcamo&key=AIzaSyAQXt8aeCYIFpKwqa8qwcX17jLOBXN0Zqc" allowfullscreen></iframe>

	-->


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
    <script src="<?php echo PATH; ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo PATH; ?>assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--
<div id="ms-preload" class="ms-preload">
    <div id="status">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>-->
<div class="sb-site-container">
    <!-- Modal -->
    <div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog animated zoomIn animated-3x" role="document">
            <div class="modal-content">
                <div class="modal-header shadow-2dp no-pb">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close"></i>
                </span>
                    </button>
                    <div class="modal-title text-center">
                        <span class="ms-logo ms-logo-white ms-logo-sm mr-1"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
                        <h3 class="no-m ms-site-title" href="<?php echo PATH; ?>">Comune di
                            <span>Alcamo</span>
                        </h3>
                    </div>
                    <div class="modal-header-tabs">
                        <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="withoutripple">
                                    <i class="zmdi zmdi-account"></i> Accedi</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="ms-login-tab">
                            <?php if(isset($user->row) && isset($_SESSION['adm_log'])) echo '<a href="./admin/home" class="btn btn-block btn-raised btn-primary">Area riservata</a>';
                            else { ?>
                            <form method="post" action="">
                                <fieldset>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-account"></i>
                          </span>
                                            <label class="control-label" for="ms-form-user">Email</label>
                                            <input type="text" id="ms-form-user" name="email" class="form-control"> </div>
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-lock"></i>
                          </span>
                                            <label class="control-label" for="ms-form-pass">Password</label>
                                            <input type="password" id="ms-form-pass" name="password" class="form-control"> </div>
                                    </div>
                                    <div class="row mt-2">
                                        <input type="submit" name="commit" class="btn btn-block btn-raised btn-primary" value="Accedi">
                                    </div>
                                </fieldset>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="ms-header ms-header-white">
        <div class="container container-full">
            <div class="ms-title">
                <a href="index.php">
                    <!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
                    <span class="ms-logo animated zoomInDown animation-delay-5"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
                    <h1 class="animated fadeInRight animation-delay-6">Comune di
                        <span>Alcamo</span>
                    </h1>
                </a>
            </div>
            <div class="header-right">
                <div class="share-menu">
                    <ul class="share-menu-list">
                        <li class="animated fadeInRight animation-delay-3">
                            <a href="http://www.comune.alcamo.tp.it/" class="btn-circle btn-wordpress">
                                <i class="zmdi zmdi-globe-alt"></i>
                            </a>
                        </li>
                        <li class="animated fadeInRight animation-delay-2">
                            <a href="https://www.facebook.com/comunedialcamo/" class="btn-circle btn-facebook">
                                <i class="zmdi zmdi-facebook"></i>
                            </a>
                        </li>
                        <li class="animated fadeInRight animation-delay-1">
                            <a href="https://twitter.com/comunedialcamo" class="btn-circle btn-twitter">
                                <i class="zmdi zmdi-twitter"></i>
                            </a>
                        </li>
                    </ul>
                    <a href="javascript:void(0)" class="btn-circle btn-circle-primary animated zoomInDown animation-delay-7">
                        <i class="zmdi zmdi-link"></i>
                    </a>
                </div>
                <a href="javascript:void(0)" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal" data-target="#ms-account-modal">
                    <i class="zmdi zmdi-account"></i>
                </a>
                <form class="search-form animated zoomInDown animation-delay-9" method="get" action="./segnalazioni.php?via=">
                    <input id="search-box" type="text" class="search-input" placeholder="Cerca segnalazione" name="info" />
                    <label for="search-box">
                        <i class="zmdi zmdi-search"></i>
                    </label>
                </form>
                <a href="javascript:void(0)" class="btn-ms-menu btn-circle btn-circle-primary sb-toggle-left animated zoomInDown animation-delay-10">
                    <i class="zmdi zmdi-menu"></i>
                </a>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-static-top yamm ms-navbar ms-navbar-white">
        <div class="container container-full">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <!-- <img src="assets/img/demo/logo-navbar.png" alt=""> -->
                    <span class="ms-logo ms-logo-sm"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
              <span class="ms-title">Comune di
                <strong>Alcamo</strong>
              </span>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if($guiset == 1){ ?><li class="active"><?php }else { ?><li><?php } ?>
                        <a href="./index.php">Invia Segnalazione</a>
                    </li>
                    <?php if($guiset == 2){ ?><li class="active"><?php }else { ?><li><?php } ?>
                        <a href="./segnalazioni.php">Segnalazioni</a>
                    </li>
                    <?php if($guiset == 3){ ?><li class="active"><?php }else { ?><li><?php } ?>
                        <a href="./come-funziona.php">Come funziona?</a>
                    </li>
                    <!-- <li class="btn-navbar-menu"><a href="javascript:void(0)" class="sb-toggle-left"><i class="zmdi zmdi-menu"></i></a></li> -->
                </ul>
            </div>
            <!-- navbar-collapse collapse -->
            <a href="javascript:void(0)" class="sb-toggle-left btn-navbar-menu">
                <i class="zmdi zmdi-menu"></i>
            </a>
        </div>
        <!-- container -->
