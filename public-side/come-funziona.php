<?php
						function isMobile(){
							$array_mobile = array(
										'iphone',
										'ipod',
										'ipad',
										'android',
										'blackberry',
										'opera mobi',
										'windows ce',
										'windows phone os',
										'symbian'
										);
							$UA = isset($_SERVER['HTTP_USER_AGENT']) ? (string) $_SERVER['HTTP_USER_AGENT'] : '';
							$regex = "/(" . implode("|", $array_mobile) . ")/i";
							return preg_match($regex, $UA);
						}
						
						if(!isMobile()){
							
						}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Segnalazioni | Comune di Alcamo</title>
    <meta name="description" content="Segnala gli inteventi di piccola manutenzione">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/preload.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.green-500.min.css" />
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
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
                <h3 class="no-m ms-site-title">Comune di 
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
                  <form autocomplete="off">
                    <fieldset>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-account"></i>
                          </span>
                          <label class="control-label" for="ms-form-user">Username</label>
                          <input type="text" id="ms-form-user" class="form-control"> </div>
                      </div>
                      <div class="form-group label-floating">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-lock"></i>
                          </span>
                          <label class="control-label" for="ms-form-pass">Password</label>
                          <input type="password" id="ms-form-pass" class="form-control"> </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <div class="form-group no-mt">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> Ricordami </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <button class="btn btn-raised btn-primary pull-right">Accedi</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
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
                  <a href="javascript:void(0)" class="btn-circle btn-google">
                    <i class="zmdi zmdi-google"></i>
                  </a>
                </li>
                <li class="animated fadeInRight animation-delay-2">
                  <a href="javascript:void(0)" class="btn-circle btn-facebook">
                    <i class="zmdi zmdi-facebook"></i>
                  </a>
                </li>
                <li class="animated fadeInRight animation-delay-1">
                  <a href="javascript:void(0)" class="btn-circle btn-twitter">
                    <i class="zmdi zmdi-twitter"></i>
                  </a>
                </li>
              </ul>
              <a href="javascript:void(0)" class="btn-circle btn-circle-primary animated zoomInDown animation-delay-7">
                <i class="zmdi zmdi-share"></i>
              </a>
            </div>
            <a href="javascript:void(0)" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal" data-target="#ms-account-modal">
              <i class="zmdi zmdi-account"></i>
            </a>
            <form class="search-form animated zoomInDown animation-delay-9">
              <input id="search-box" type="text" class="search-input" placeholder="Cerca segnalazione..." name="q" />
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
                <li>
                    <a href="index.php">Invia Segnalazione</a>
                </li>
                <li>
                    <a href="segnalazioni.php">Segnalazioni</a>
                </li>
                <li class="active">
                    <a href="come-funziona.php">Come funziona?</a>
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
      </nav>
      
        <div class="ms-hero-page-override ms-hero-img-city ms-hero-bg-dark-light">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Come funziona</h1>
            <p class="lead lead-lg color-white text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Leggi le istruzioni della
              <span class="color-success">piattaforma segnalazioni</span>.</p>
          </div>
        </div>
      </div>
        
        
        
        <div class="container">
        <h1 class="right-line">Istruzioni</h1>
        <div class="row">
          <div class="col-sm-6">
            <ol class="service-list list-unstyled">
              <li>Compila la richiesta inserendo i tuoi dati anagrafici e quelli relativi alla segnalazione. I campi che possiedono l'asterisco (*) sono obbligatori. Dopo aver cliccato su "Invia segnalazione" verrà chiesto di verificare la correttezza dei dati inseriti.</li>
              <li>La segnalazione che hai effettuato verrà presa in carico dagli uffici comunali addetti alla specifica problematica. Gli uffici si occuperanno di seguire lo stato della richiesta e di aggiornarne pubblicamente il suo stato in modo da comunicarne il processo di risoluzione al segnalatore e a tutti i cittadini.</li>
              <li>Attraverso l'elenco delle segnalazioni i cittadini potranno essere informati riguardo a quelle che sono le richieste che il Comune sta attualmente prendendo in carico e quante richieste sono ancora da effettuare prima della risoluzione di  una specifica problematica in modo da garantire la massima trasparenza e il rispetto cronologico delle priorità.</li>
            </ol>
          </div>
          <div class="col-md-6">
            <div class="card wow zoomInUp animation-delay-2">
              <div class="ms-hero-bg-success ms-hero-img-coffee">
                <h3 class="color-white index-1 text-center pb-4 pt-4 no-mb">Domande frequenti</h3>
              </div>
              <div class="panel-group ms-collapse no-margin" id="accordion3" role="tablist" aria-multiselectable="true">
                <div class="panel panel-success">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title ms-rotate-icon">
                      <a class="withripple" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                        <i class="zmdi zmdi-attachment-alt"></i> Ordine di risoluzione </a>
                    </h4>
                  </div>
                  <div id="collapseOne3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne3">
                    <div class="panel-body">
                      <p>Questa piattaforma garantisce il pieno rispetto della risoluzione per ordine di tempo delle problematiche affrontate dai cittadini, senza interferenze di alcun tipo sulla tempistica di risoluzione. Se la richiesta verrà riconosciuta come <strong>prioritaria</strong> (per ragioni di sicurezza o di tempi di risoluzione ristretti tali da non poter seguire l'iter cronologico delle altre segnalazioni) questa verrà messa in coda alle richieste prioritarie che avranno massima esigenza di risoluzione e verranno affrontate e risolte nel più breve tempo possibile.</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-success">
                  <div class="panel-heading" role="tab" id="headingTwo3">
                    <h4 class="panel-title ms-rotate-icon">
                      <a class="collapsed withripple" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                        <i class="zmdi zmdi-attachment-alt"></i> Visibilità segnalatore </a>
                    </h4>
                  </div>
                  <div id="collapseTwo3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo3">
                    <div class="panel-body">
                      <p>È possibile rendere non visibile il nome del segnalatore nell'elenco pubblico delle segnalazioni commutando, in fase di invio della segnalazione, il campo "Nome segnalatore pubblico".</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <footer class="ms-footer">
        <div class="container">
          <p>&copy; Piattaforma segnalazioni 2017 | Comune di Alcamo | <a href="#">Credits</a></p>
        </div>
      </footer>
      <div class="btn-back-top">
        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
          <i class="zmdi zmdi-long-arrow-up"></i>
        </a>
      </div>
    </div>
    <!-- sb-site-container -->
    <div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
      <div class="sb-slidebar-container">
        <header class="ms-slidebar-header">
          <div class="ms-slidebar-login">
            <a href="javascript:void(0)" class="withripple">
              <i class="zmdi zmdi-account"></i> Accedi</a>
          </div>
          <div class="ms-slidebar-title">
            <form class="search-form">
              <input id="search-box-slidebar" type="text" class="search-input" placeholder="Cerca segnalazioni..." name="q" />
              <label for="search-box-slidebar">
                <i class="zmdi zmdi-search"></i>
              </label>
            </form>
            <div class="ms-slidebar-t">
              <span class="ms-logo ms-logo-sm"><i class="glyphicon glyphicon-cog fa-spin"></i></span>
              <h3>Comune di 
                <span>Alcamo</span>
              </h3>
            </div>
          </div>
        </header>
        <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
          <li>
            <a href="index.php">Invia segnalazione</a>
          </li>
          <li>
            <a href="segnalazioni.php">Segnalazioni</a>
          </li>
          <li>
            <a href="come-funziona.php">Come funziona?</a>
          </li>
        </ul>
        <div class="ms-slidebar-social ms-slidebar-block">
          <h4 class="ms-slidebar-block-title">Link del Comune</h4>
          <div class="ms-slidebar-social">
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-facebook">
              <i class="zmdi zmdi-facebook"></i>
              <span class="badge badge-pink"></span>
              <div class="ripple-container"></div>
            </a>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-twitter">
              <i class="zmdi zmdi-twitter"></i>
              <span class="badge badge-pink"></span>
              <div class="ripple-container"></div>
            </a>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-google">
              <i class="zmdi zmdi-google"></i>
              <div class="ripple-container"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/index.js"></script>
  </body>
</html>