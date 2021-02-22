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
                <li class="active">
                    <a href="index.php">Invia Segnalazione</a>
                </li>
                <li>
                    <a href="segnalazioni.php">Segnalazioni</a>
                </li>
                <li>
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
      <div class="ms-hero ms-hero-material">
        <span class="ms-hero-bg"></span>
        <div class="container">
          <div class="col-lg-6 col-md-7">
            <div id="carousel-hero" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <div class="carousel-caption">
                    <div class="ms-hero-material-text-container">
                      <header class="ms-hero-material-title animated slideInLeft animation-delay-5">
                        <h1 class="animated fadeInLeft animation-delay-15 font-smoothing">Piattaforma
                          <strong>segnalazioni</strong></h1>
                        <h2 class="animated fadeInLeft animation-delay-18">Inviaci la tua segnalazione di disservizio.</h2>
                      </header>
                      <ul class="ms-hero-material-list">
                        <li class="">
                          <div class="ms-list-icon animated zoomInUp animation-delay-18">
                            <span class="ms-icon ms-icon-circle ms-icon-xlg color-warning shadow-3dp">
                              <i class="zmdi zmdi-flash"></i>
                            </span>
                          </div>
                          <div class="ms-list-text animated fadeInRight animation-delay-19">Velocizza gli interventi di manutenzione inviandoci prontamente la segnalazione di disservizio.</div>
                        </li>
                        <li class="">
                          <div class="ms-list-icon animated zoomInUp animation-delay-20">
                            <span class="ms-icon ms-icon-circle ms-icon-xlg color-success shadow-3dp">
                              <i class="zmdi zmdi-bike"></i>
                            </span>
                          </div>
                          <div class="ms-list-text animated fadeInRight animation-delay-21">Contribuisci ad abbassare gli sprechi del Comune segnalandoci i punti critici.</div>
                        </li>
                        <li class="">
                          <div class="ms-list-icon animated zoomInUp animation-delay-22">
                            <span class="ms-icon ms-icon-circle ms-icon-xlg color-danger shadow-3dp">
                              <i class="zmdi zmdi-album"></i>
                            </span>
                          </div>
                          <div class="ms-list-text animated fadeInRight animation-delay-23">Segui il processo di risoluzione degli interventi in tempo reale.</div>
                        </li>
                      </ul>
                      <div class="ms-hero-material-buttons text-right">
                        <div class="ms-hero-material-buttons text-right">
                          <a href="#segnala" class="btn btn-warning btn-raised animated fadeInLeft animation-delay-24 mr-2">
                            <i class="zmdi zmdi-settings"></i> Segnala</a>
                          <a href="#" class="btn btn-success btn-raised animated fadeInRight animation-delay-24">
                            <i class="zmdi zmdi-download"></i> Segnalazioni</a>
                        </div>
                      </div>
                        
                        
                        
                    </div>
                    <!-- ms-hero-material-text-container -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="ms-hero-img animated zoomInUp animation-delay-30">
              <img src="assets/img/demo/mock-imac-material2.png" alt="" class="img-responsive">
              <div id="carousel-hero-img" class="carousel carousel-fade slide" data-ride="carousel" data-interval="5000">
                <!-- Indicators -->
                <ol class="carousel-indicators carousel-indicators-hero-img">
                  <li data-target="#carousel-hero-img" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-hero-img" data-slide-to="1"></li>
                  <li data-target="#carousel-hero-img" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="ms-hero-img-slider item active">
                    <img src="assets/img/demo/hero1.png" alt="" class="img-responsive"> </div>
                  <div class="ms-hero-img-slider item">
                    <img src="assets/img/demo/hero3.png" alt="" class="img-responsive"> </div>
                  <div class="ms-hero-img-slider item">
                    <img src="assets/img/demo/hero2.png" alt="" class="img-responsive"> </div>
                </div>
              </div>
            </div>
          </div>            
        </div>
        <!-- container -->
      </div>
        <div id="segnala"></div>
        <br><br><br><br>
        
        <div class="container">
        <div class="row">
          
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="ms-hero-bg-primary ms-hero-img-mountain">
                <h2 class="text-center no-m pt-4 pb-4 color-white index-1">Compila segnalazione</h2>
              </div>
   
              <div class="card-block">
                <form class="form-horizontal">
                  <fieldset>
                      
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Nome*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" placeholder="Scrivi il tuo nome..."> </div>
                    </div>
                      
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Cognome*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" placeholder="Scrivi il tuo cognome..."> </div>
                    </div>  
                      
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">N. Telefono</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" placeholder="Scrivi il tuo numero di telefono..."> </div>
                    </div>  
                    
                    <div class="form-group">
                      <label for="inputEmail" class="col-md-2 control-label">Email</label>
                      <div class="col-md-9">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Scrivi il tuo indirizzo email"> </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Residenza</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" placeholder="Scrivi il tuo indirizzo di residenza..."> </div>
                    </div>
                      
                    <div class="form-group">
                      <label for="inputName" class="col-md-2 control-label">Indirizzo segnalazione*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputName" placeholder="Scrivi l'indirizzo della segnalazione..."> </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="select111" class="col-md-2 control-label">Tipologia di problema*</label>
                        <div class="col-md-10">
                          <select id="select111" class="form-control selectpicker">
                            <option></option>
                            <option>Affissioni selvagge</option>
                            <option>Animali molesti</option>
                            <option>Barriere architettoniche</option>
                            <option>Canali, rii, fossi</option>
                            <option>Deiezioni animali (cani, piccioni, ecc)</option>
                            <option>Disinfestazioni</option>
                            <option>Graffiti</option>
                            <option>Illiminazione pubblica</option>
                            <option>Rifiuti e cassonetti</option>
                            <option>Segnaletica stradale</option>
                            <option>Strade (buche, dissesti)</option>
                            <option>Veicoli abbandonati</option>
                            <option>Verde pubblico (arredi)</option>
                            <option>Verde pubblico (taglio erba)</option>
                            <option>Edifici comunali (idraulico)</option>
                            <option>Edifici comunali (elettricista)</option>
                            <option>Edifici comunali (falegname)</option>
                            <option>Edifici comunali (muratore)</option>
                            <option>Edifici comunali (imbianchino)</option>
                            <option>Edifici comunali (altro)</option>
                            <option>Richiesta supporto manifestazioni</option>
                          </select>
                        </div>
                      </div>  
                      
                    <div class="form-group">
                      <label for="inputSubject" class="col-md-2 control-label">Titolo segnalazione*</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="inputSubject" placeholder="Scrivi il titolo della segnalazione..."> </div>
                    </div>
                      
                    <div class="form-group">
                      <label for="textArea" class="col-md-2 control-label">Descrizione</label>
                      <div class="col-md-9">
                        <textarea class="form-control" rows="5" id="textArea" placeholder="Scrivi una descrizione per la segnalazione..."></textarea>
                      </div>
                    </div>
                      
                  
                    <br><p class="well well-lg">Le informazioni fornite verranno utilizzati esclusivamente ai fini di evasione della richiesta, rispettando il trattamento dei dati personali decretato dal titolo III della parte I del D.Lgs. 196/03 ("Codice della privacy").</p> 
                      
                      
                    <div class="form-group">
                      <div class="col-md-9">
                        
                          <div class="togglebutton">
                            <label>
                                <input type="checkbox" checked=""> Nome segnalatore pubblico </label>
                          </div>
                          
                      </div>
                    </div>      
                      
                <br>
                      
                  <div class="form-group">
                      <div class="col-md-9 col-md-offset-2">
                        <button type="submit" class="btn btn-raised btn-primary">Invia segnalazione</button>
                      </div>
                  </div>
                  </fieldset>
                </form>
              </div>
            </div>
        </div>
      </div>
        
<!--    <div class="material-background"></div>-->
      <div class="container">
        <div class="card card-block card-block-big">
          <h3 class="text-center fw-500 mb-6">Segnalazioni recenti</h3>
          <ul class="ms-timeline-left">
            <li class="ms-timeline-left-item wow fadeInUp">
              <h4>Paolo Monteleone</h4>
              <div class="ms-timeline-left-left">
                <h4 class="color-primary">Perdita acqua</h4>
                <time class="ms-timeline-left-time">21/04/2017 ore 12:42</time>
              </div>
              <span class="ms-timeline-left-city">Via Santissimo Salvatore</span>
              <p>Vi è una grossa perdita di acqua all'altezza della concessionaria di automobili. La perdita sta allagando parte della strada ed esce moltissima acqua.</p>
            </li>
            <li class="ms-timeline-left-item wow fadeInUp">
              <h4>Leonardo Di Giovanni</h4>
              <div class="ms-timeline-left-left">
                <h4 class="color-primary">Grossa buca in mezzo la strada</h4>
                <time class="ms-timeline-left-time">20/04/2017 ore 15:42</time>
              </div>
              <span class="ms-timeline-left-city">Via Ugo Foscolo</span>
              <p>In Via Ugo Foscolo c'è una buca profonda circa 20 cm che rischia di provocare incidenti o danni alle automobili.</p>
            </li>
            <li class="ms-timeline-left-item wow fadeInUp">
              <h4>(nome nascosto)</h4>
              <div class="ms-timeline-left-left">
                <h4 class="color-primary">Rifiuti vicino il ponte</h4>
                <time class="ms-timeline-left-time">18/04/2017 ore 08:24</time>
              </div>
              <span class="ms-timeline-left-city">C.da Ponte dei Ricchi</span>
              <p>Lungo la strada delle Pigna di Don Fabrizio ci sono più di un sacchetto di rifiuti in sacchi neri. Si trovano all'altezza del Ponte dei Ricchi.</p>
            </li>
          </ul>
        </div>
      </div>
        
    <a href="segnalazioni.php" class="btn btn-block btn-raised btn-primary"><i class="fa fa-flag"></i>Visualizza tutte le segnalazioni</a>
        
        <br>
        
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